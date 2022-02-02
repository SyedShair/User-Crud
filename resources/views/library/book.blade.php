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
                        <h3 class="box-title">{{(isset($edit)) ?  'Edit Book' : 'Add Book'}}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"  action="{{(isset($edit)) ?  route('book.update',['id'=>$edit->id]) : route('book.add') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="book_title" value="{{old('book_title',$edit->book_title ??  "")}}" id="exampleInputEmail1" placeholder="Enter Book Title">
                                    </div>
                                    @error('book_title')
                                    <div class="alert alert-warning">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="author" value="{{old('author',$edit->author ??  "")}}" id="exampleInputEmail1" placeholder="Enter Author Name">
                                    </div>
                                    @error('author')
                                    <div class="alert alert-warning">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pub_year" value="{{old('pub_year',$edit->pub_year ??  "")}}" id="exampleInputEmail1" placeholder="Enter Published Year">
                                    </div>
                                    @error('pub_year')
                                    <div class="alert alert-warning">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <select name="rack_id" class="form-control select2">
                                          <option>---Select---</option>
                                          @foreach($racks as $list)
                                          <option value="{{$list->id}}"  {{old('rack_id',$edit->rack_id ?? '') == $list->id ? "selected" : "" }}>{{$list->rack_name}}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                    @error('author')
                                    <div class="alert alert-warning">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="{{(isset($edit)) ?  'Update' : 'Save'}}">
                                </div>
                            </div>
                        </div><!-- /.box-body -->


                    </form>
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
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Published Year</th>
                                    <th>Racks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($books as $list)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$list->book_title}}</td>
                                        <td>{{$list->author}}</td>
                                        <td>{{$list->pub_year}}</td>
                                        <td>{{$list->has_rack->rack_name}}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('book.edit',['id'=>$list->id])}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" href="{{route('book.delete',['id'=>$list->id])}}"><i class="fa fa-trash"></i></a>
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

