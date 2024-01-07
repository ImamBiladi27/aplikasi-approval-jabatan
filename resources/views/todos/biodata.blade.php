@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">

                    <h2>Halaman Biodata</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>Id</th>
                                <th>Name</th>
                                <th>Kabupaten</th>
                                <th>Kabupaten</th>
                                <th>Kabupaten</th>
                                </th>


                                @foreach($result as $id)
                            <tr>
                                <td>{{ $id->user_id }}</td>
                            <td>{{ $id->nama }}</td>
                            <td>{{ $id->nama_kabupaten }}</td>
                            <td>{{ $id->nama_kecamatan }}</td>
                            <td>{{ $id->nama_kelurahan }}</td>
    <td>
    <!-- <a class="btn btn-warning" href="{{ url('todo/'.$result->id.'/edit') }}">Edit</a>

<a class="btn btn-danger" href="{{ route('todo.delete', ['id' => $todo->id]) }}" onclick="return confirm('Are you sure you want to delete this {{ $todo->description }}')">Delete</a> -->
    </td>


                        </tr>
                        @endforeach

                        </table>

                    </div>

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->email}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">

                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
