@extends('Layout/main')
@section('content')
    <section class="content-header">
        <h1>
            Rack Information
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
                        <h3 class="box-title">Rack Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rack Name</th>
                                    <th>Total Items in A Rack</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($total as $list)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('rack.items',['id'=>$list->id])}}" class="btn btn-primary"> {{$list->rack_name}}  </a></td>
                                        <td>{{$list->total}}</td>
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

