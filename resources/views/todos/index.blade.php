@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">
                @if(auth()->user()->role==1)
                    <h2>Halaman Kepala Dinas</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>ID Atasan</th>
                                <th>Description</th>
                                <th>Status</th>
                                </th>


                                @foreach($logHarianData as $id)
                            <tr>
                            <td>{{ $id->atasan_id }}</td>
                            <td>{{ $id->description }}</td>
                            <td>{{ $id->status }}</td>

                        </tr>
                        @endforeach

                        </table>
                        @endif
                    </div>
                    @if(auth()->user()->role==2)
                    <h2>Halaman Kepala Bidang</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>ID Atasan</th>
                                <th>Description</th>
                                <th>Status</th>
                                </th>


                                @foreach($logHarianData as $id)
                            <tr>
                            <td>{{ $id->atasan_id }}</td>
                            <td>{{ $id->description }}</td>
                            <td>{{ $id->status }}</td>

                        </tr>
                        @endforeach

                        </table>
                        @endif
                    </div>
                    @if(auth()->user()->role==3)
                    <h2>Halaman Kepala Bidang</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>ID Atasan</th>
                                <th>Description</th>
                                <th>Status</th>
                                </th>


                                @foreach($logHarianData as $id)
                            <tr>
                            <td>{{ $id->atasan_id }}</td>
                            <td>{{ $id->description }}</td>
                            <td>{{ $id->status }}</td>

                        </tr>
                        @endforeach

                        </table>
                        @endif
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
