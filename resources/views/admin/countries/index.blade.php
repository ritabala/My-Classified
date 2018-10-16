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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Country Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($country as $row)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$row->id}}</td>--}}
                                        {{--<td>{{$row->name}}</td>--}}
                                        {{--<td>--}}
                                            {{--<div>--}}
                                                {{--<a href="{{route('countries.edit',$row->id)}}" class="btn btn-primary fa fa-pencil"></a>--}}
                                                {{--<button type="button" class=" delete btn btn-danger fa fa-trash-o" data-url="{{route('countries.destroy',$row->id )}}"  data-token="{{ csrf_token()}}" data-val="{{ $row->name }}" ></button>--}}
                                           {{--</div>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
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