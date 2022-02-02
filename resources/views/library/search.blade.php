@extends('Layout/main')

@section('content')
    <section class="content-header">
        <h1>
            Search Books

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
                        <h3 class="box-title">Search Books</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"  action="{{route('books.search')}}" method="get">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control" placeholder="Search Books......">
                                        <span class="input-group-btn">
                                      <button class="btn btn-info btn-flat" type="submit">Go!</button>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
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
                                        <td>{{$list->rack_name}}</td>
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

