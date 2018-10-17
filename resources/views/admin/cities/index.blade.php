@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-black"><i class="fa fa-map-marker"></i>&nbsp; Cities</h1>
                        @if ($message=Session::get('success'))
                            <div class="align-content-left alert-success" >{{$message}}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item active">City</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li><a href="{{route('cities.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>
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
                                    <th>City</th>
                                    <th>Country </th>
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
        $(document).ready(function(){
            $('#example1').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    autoWidth: true,
                    responsive:true,

                    ajax:
                        {
                            url:"{{route('cities.index')}}"
                        },
                    columns:[
                        {data:'id',name:'id'},
                        {data:'name',name:'name'},
                        {data:'country_id',name:'country_id'},
                        {data:'action',name:'action'},
                        ],
                });
        });
    </script>
@endpush