@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-black "><i class="fa fa-map-marker"></i>&nbsp; Countries</h1>

                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admins.index')}}" class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item active">Country</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li><a href="{{route('countries.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>
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
                                    <th>Country Name</th>
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
        $(document).ready(function(){
            $('#example1').DataTable(
                {
                    processing: true,
                    serverSide:true,
                    autoWidth:false,
                    responsive:true,
                    ajax:
                        {
                            url:"{{route('countries.index')}}"
                        },
                    columns:[
                        {data:'id',name:'id'},
                        {data:'name',name:'name'},
                        {data:'action',name:'action'}
                    ],
                });
        });
    </script>
@endpush