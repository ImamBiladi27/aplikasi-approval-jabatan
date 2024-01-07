@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Log Harian</div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('store') }}">
                    @csrf


                        <div class="form-group">
                        <label class="control-label">ID Atasan</label>
                                <input type="text" name="atasan_id" class="form-control" value="{{ $todos->manage_id }}"readonly>
                        </select>
                        </div>
                    <div class="form-group">


                    <label class="control-label">ID User</label>
                            <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}"readonly>
                    </select>
                    </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" name="description" class="form-control" placeholder="Masukkan Log Harian">
                        </div>
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
                        </div>
                            <div class="form-group">
                                <label for="tgl_akhir">Tanggal Selesai:</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
