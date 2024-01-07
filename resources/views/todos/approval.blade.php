@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Approval</div>
                <div class="panel-body">



                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>User ID</th>
                                <th>Description</th>

                                <th>Status</th>
                                <th>Action</th>
                                </th>

                                @if(! count($todos))
                            <tr>
                                <td colspan="3">No todo</td>
                            </tr>
                            @endif
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ $todo->user_id }}</td>

                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ url('todo/'.$todo->id.'/edit') }}">Edit</a>

                                    <a class="btn btn-danger" href="{{ route('todo.delete', ['id' => $todo->id]) }}" onclick="return confirm('Are you sure you want to delete this {{ $todo->description }}')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->email}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{Auth::user()->jabatan}}</a></li>
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
