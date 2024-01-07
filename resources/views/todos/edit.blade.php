@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('update') }}">
                        @csrf


                        <div class="form-group">
                            <label class="control-label">Id </label>
                            <input type="number" name="id" class="form-control" value="{{ $todo->id }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Id Atasan</label>
                            <input type="number" name="atasan_id" class="form-control" value="{{ $todo->atasan_id }}" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea  name="description" class="form-control" placeholder="{{ $todo->description }}">{{ $todo->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" value="{{ $todo->tgl_mulai }}" >
                        </div>
                        <div class="form-group">
                                <label for="tgl_akhir">Tanggal Selesai:</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="{{ $todo->tgl_akhir }}" >
                            </div>
                            <div class="form-group">
                        <label for="pilihan">Pilih Status</label>
                        <select name="status">
                            @if( $todo->status == 'Pending')
                            <option value="{{ $todo->status }}">{{ $todo->status }}</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                            @endif
                            @if( $todo->status == 'Ditolak')
                            <option value="{{ $todo->status }}">{{ $todo->status }}</option>
                            <option value="Pending">Pending</option>
                            <option value="Disetujui">Disetujui</option>
                            @endif
                            @if( $todo->status == 'Disetujui')
                            <option value="{{ $todo->status }}">{{ $todo->status }}</option>
                            <option value="Pending">Pending</option>
                            <option value="Ditolak">Ditolak</option>
                            @endif
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="control-label">User Id</label>
                        <input type="number" name="user_id" class="form-control" value="{{ $todo->user_id }}">
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Todo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
