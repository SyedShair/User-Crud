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
                    <h3 class="box-title">{{(isset($edit)) ?  'Edit Rack' : 'Add Rack'}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form"  action="{{(isset($edit)) ?  route('rack.update',['id'=>$edit->id]) : route('rack.add') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="rack_name" value="{{old('rack_name',$edit->rack_name ??  "")}}" id="exampleInputEmail1" placeholder="Enter Rack">
                        </div>
                            @error('rack_name')
                            <div class="alert alert-warning">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{(isset($edit)) ?  'Update' : 'Save'}}">
                            </div>
                        </div>
                    </div><!-- /.box-body -->


                </form>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Rack List</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                      <div class="col-md-12">
                     <table class="table table-responsive">
                         <thead>
                         <tr>
                             <th>ID</th>
                             <th>Rack Name</th>
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
                         @php $i=1; @endphp
                         @foreach($racks as $list)
                            <tr>
                                <td>{{$i++}}</td>
                              <td>{{$list->rack_name}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('rack.edit',['id'=>$list->id])}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" href="{{route('rack.delete',['id'=>$list->id])}}"><i class="fa fa-trash"></i></a>
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

