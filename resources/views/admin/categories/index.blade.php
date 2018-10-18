@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-black"><i class="fa fa-th"></i>&nbsp; Categories</h1>

                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admins.index')}}" class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                           <li><a href="{{route('categories.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message=Session::get('error'))
                                {{--<div class="alert alert-danger align-content-center">--}}
                                <div class="align-content-left alert alert-danger" >{{$message}}</div>
                                {{--</div>--}}
                            @endif
                            @if ($message=Session::get('success'))
                                <div class="align-content-left alert alert-success" >{{$message}}</div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection

@push('footer-js')
   <script>
       $(document).ready(function()
           {
               $('#example1').DataTable({
                   processing:true,
                   autoWidth:false,
                   serverSide:true,
                   responsive:true,

                   ajax:
                       {
                           url:"{{route("categories.index")}}"
                       },
                    columns:
                    [
                        {data:'id',name:'id'},
                        {data:'cat_name',name:'category name'},
                        {data:'action',name:'action'}
                    ]
                    {{--columnDefs:--}}
                        {{--{--}}
                            {{--"targets": -1,--}}
                            {{--"searchable": false,--}}
                            {{--"defaultContent": "<button>Click!</button>"--}}
                            {{--<div>--}}
                            {{--<a href="{{route('categories.edit',$row->id)}}" class="btn btn-primary fa fa-pencil"></a>--}}

                            {{--<button type="button" class=" delete btn btn-danger fa fa-trash-o" data-url="{{route('categories.destroy',$row->id )}}"  data-token="{{ csrf_token()}}" data-val="{{ $row->cat_name }}" ></button>--}}
                            {{--<button class=" btn btn-danger fa fa-trash-o"  id='delete' data-id="{{ $row->id }}" data-token="{{ csrf_token() }}></button>--}}
                            {{--<input type="submit" onsubmit="{{route('Categories.destroy',$row->id)}}" class="btn btn-danger  fa fa-trash-o" id="delete" data-id="{{ $row->id }}" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" ></input>--}}

                            {{--</div>--}}
                        {{--}--}}


               })
           }
       )

   </script>



@endpush