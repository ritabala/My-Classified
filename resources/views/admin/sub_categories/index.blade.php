@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-black "><i class="fa fa-th"></i> Sub Categories</h1>
                        @if ($message=Session::get('success'))
                            <div class="align-content-left alert-success" >{{$message}}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item active">Subcategory</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li><a href="{{route('subcategories.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subcategory</th>
                                    <th>Category </th>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection

@push('footer-js')
    <script>
        $(document).ready(function () {
            $('#example1').DataTable(
                {
                    serverSide:true,
                    processing:true,
                    responsive:true,
                    autoWidth:false,

                    ajax:
                        {
                            url:"{{route('subcategories.index')}}"
                        },
                    columns:[
                        {data:'id',name:'id'},
                        {data:'sub_category_name',name:'sub_category_name'},
                        {data:'category_id',name:'category_id'},
                        {data:'action',name:'action'},
                    ],
                });
        });
    </script>
@endpush