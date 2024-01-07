<?php

namespace App\Http\Controllers;

use App\Exports\TodoExport;
use App\Models\Biodata;
use App\Models\LogHarian;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
class TodoController extends Controller
{
    public function index(): View
    {

        $userId = Auth::id();

        $logHarianData = LogHarian::where('user_id', $userId)->get();
        // dd($logHarianData);
        return view('todos.index',compact('logHarianData'));
        // return redirect()->routes('home')->with('logHarianData',$logHarianData);
    }
    public function biodata(){
        $userId = Auth::id();
        $result = Biodata::join('users', 'biodata.user_id', '=', 'users.id')
        ->join('regencies', 'biodata.kabupaten', '=', 'regencies.id')
        ->join('districts', 'biodata.kecamatan', '=', 'districts.id')
        ->join('villages', 'biodata.kelurahan', '=', 'villages.id')
        ->select('biodata.*', 'users.id','regencies.name as nama_kabupaten','districts.name as nama_kecamatan','villages.name as nama_kelurahan')
        ->where('biodata.user_id', $userId)
        ->get();
        return view('todos.biodata',compact('result'));
    }
    public function approval(): View
    {
        $userId = Auth::id();


        $todos = LogHarian::join('users', 'log_harian.atasan_id', '=', 'users.id')
        ->where('log_harian.atasan_id', $userId)
        ->select('log_harian.*','users.name','users.email as email')
        ->get();
        // dd($todos);
        return view('todos.approval',compact('todos'));
    }
    public function dashboard(): View
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];

        // Mengambil data pengguna yang sedang login
        return view('dashboard', $data);
    }
    public function exportexcel()
    {
        return Excel::download(new TodoExport, 'todo.xlsx');
    }
    public function create(): View
    {

        $auth=Auth::id();
        // Fetch users based on 'manage_id'
        $todos = User::find($auth);

        // dd($todos);
        return view('todos.tambah-data',compact('todos'));
    }

    public function store(Request $request)
    {

        LogHarian::create([
            'atasan_id' => $request->input('atasan_id'),
            'description' => $request->input('description'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_akhir' => $request->input('tgl_akhir'),
            'status' => 'Pending',
            'user_id'=> $request->input('user_id')
        ]);

        return redirect('home');
    }

    public function edit(string $id): View
    {
        $todo = LogHarian::findOrFail($id);

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $todo = LogHarian::find($id);


        // Save the changes
        $todo->atasan_id = $request->input('atasan_id');
        $todo->description = $request->input('description');
        $todo->tgl_mulai = $request->input('tgl_mulai');
        $todo->tgl_akhir = $request->input('tgl_akhir');
        $todo->status = $request->input('status');
        $todo->user_id = $request->input('user_id');
        $todo->update();

                return redirect('/home');
    }
    public function delete($id)
    {

        $todo = LogHarian::find($id);

        $todo->delete();

        return redirect('home');
    }
    public function getTodo()
    {
        return response()->json(Todo::all(), 200);
    }
    public function addTodo(Request $request)
    {
        $todo = Todo::create($request->all());
        return response($todo, 201);
    }
    public function form(){
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('todos.form',compact('regencies'));
    }
    public function tambahBiodata(Request $request){
        // dd('a');
        Biodata::create([
            'nama' => $request->input('nama'),
            'kabupaten' => $request->input('kabupaten'),
            'kecamatan' => $request->input('kecamatan'),
            'kelurahan' => $request->input('kelurahan'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect('home');
    }
    public function getkecamatan(Request $request){


        $id_kabupaten=$request->id_kabupaten;
        $kecamatans = District::where('regency_id',$id_kabupaten)->get();
        // dd($kecamatans);
        foreach($kecamatans as $kecamatan){
            echo "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
    }
    public function getkelurahan(Request $request){


        $id_kecamatan=$request->id_kecamatan;
        $kelurahans = Village::where('district_id',$id_kecamatan)->get();
        // dd($kecamatans);
        foreach($kelurahans as $kelurahan){
            echo "<option value='$kelurahan->id'>$kelurahan->name</option>";
        }
    }
}
