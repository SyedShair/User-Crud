@extends('Layout/main')

@section('content')
    <section class="content-header">
        <h1>
            Book Information

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index.admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="container-fluid">
            <div class="row">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Users</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Book List</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($all as $list)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->email}}</td>
                                        <td>{{$list->role_id == 1 ? "Admin":"User"}}</td>
                                        <td><a class="btn btn-danger" href="{{route('user.delete',['id'=>$list->id])}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div><!-- /.row -->
            <!-- Main row -->
        </div>
    </section><!-- /.content -->


@endsection

