@extends('Layout/main')

@section('content')
    <section class="content-header">
        <h1>
            User Information

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
                        <h3 class="box-title">Edit User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <form role="form"  action="{{route('user.update',['id'=>auth()->user()->id])}}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="{{old('name',$edit->name ??  "")}}" id="exampleInputEmail1" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" value="{{old('email',$edit->email ??  "")}}" id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-success" value="Update">
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->


                            </form>

                        </div>
                    </div>

                </div>
            </div><!-- /.row -->
            <!-- Main row -->
        </div>
    </section><!-- /.content -->


@endsection

