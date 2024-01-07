@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/todo') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label class="control-label">Name Driver</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name Merek Mobil</label>
                            <input type="text" name="name_mobil" class="form-control">
                        </div>

                        <label for="pilihan">Pilih Status</label>
                        <select name="is_done">
                            <option value="Belum Diproses">Belum Diproses</option>
                            <option value="Sedang Diproses">Sedang Diproses</option>

                        </select>

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