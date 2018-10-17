@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-black"><i class="fa fa-buysellads"></i>&nbsp; Advertisements</h1>
                        @if ($message=Session::get('error'))
                            {{--<div class="alert alert-danger align-content-center">--}}
                            <div class="align-content-left alert-danger" >{{$message}}</div>
                            {{--</div>--}}
                        @endif
                        @if ($message=Session::get('success'))
                            <div class="align-content-left alert-success" >{{$message}}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admins.index')}}" class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item active">Advertisement</li>
                        </ol>
                    </div>
                    <div class="col-sm ">
                        <ol class="breadcrumb float-sm-right">
                            <li><a href="{{route('advertisements.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>User</th>
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
        $(document).ready(function() {
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,

                ajax:
                    {
                     url:"   {{ route('advertisements.index') }}"
                    },

                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'desc', name: 'desc'},
                    {data: 'city_id', name: 'city_id'},
                    {data: 'price', name: 'price'},
                    {data: 'category', name: 'category'},
                    {data: 'subcategory_id', name: 'subcategory_id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'action', name: 'action'},
                        ],

            });
        });
    </script>
@endpush