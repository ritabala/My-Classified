@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-black"><i class="fa fa-shopping-cart"></i>&nbsp; Orders</h1>
                    @if ($message=Session::get('error'))
                        {{--<div class="alert alert-danger align-content-center">--}}
                        <div class="align-content-left alert-danger" >{{$message}}</div>
                        {{--</div>--}}
                    @endif
                    @if ($message=Session::get('success'))
                        <div class="align-content-left alert-success" >{{$message}}</div>
                    @endif
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admins.index')}}" class="fa fa-home text-black-50"></a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                {{--<div class="col-sm">--}}
                    {{--<ol class="breadcrumb float-sm-right">--}}
                        {{--<li><a href="{{route('advertisements.create')}}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle "></i> Create New</a></li>--}}
                    {{--</ol>--}}
                {{--</div>--}}
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-gradient">
                    <div class="card-header no-border">
                        <h3 class="card-title">
                            <i class="fa fa-th mr-1"></i>
                            Sales Graph
                        </h3>

                        {{--<div class="card-tools">--}}
                            {{--<button type="button" class="btn bg-info btn-sm" data-widget="collapse">--}}
                                {{--<i class="fa fa-minus"></i>--}}
                            {{--</button>--}}
                            {{--<button type="button" class="btn bg-info btn-sm" data-widget="remove">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    </div>
                    <div class="card-body">
                        <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-transparent">
                        <div class="row">
                            <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">

                                <div class="text-white">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">

                                <div class="text-white">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">

                                <div class="text-white">In-Store</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
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

{{--@push('footer-js')--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('.datatable').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--ajax: '{{ route('datatable/getdata') }}',--}}
                {{--columns: [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'email', name: 'email'},--}}
                {{--]--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}
