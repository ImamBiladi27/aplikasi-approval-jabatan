<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Suharyo',
            'email' => 'suharyo@gmail.com',
            'jabatan'=>'Kepala Dinas',
            'password' => Hash::make('ataasan123'),
            'role' => '1',
            // 'name' => 'atasan',
            // 'email' => 'atasan@gmail.com',
            // 'password' => Hash::make('atasan123'),
            // 'role' => '2',

        ]);
    }
}
