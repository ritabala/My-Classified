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
                    <div class="col-sm
 ">
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
                                {{--@foreach($adv as $row)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$row->id}}</td>--}}
                                        {{--<td>{{$row->title}}</td>--}}
                                        {{--<td>{{$row->desc}}</td>--}}
                                        {{--<td>{{$row->City->name}}</td>--}}
                                        {{--<td>{{$row->price}}</td>--}}
                                        {{--<td>{{$row->subcategory->category->cat_name}}</td>--}}
                                        {{--<td>{{$row->subcategory->sub_category_name}}</td>--}}
                                        {{--<td>{{$row->user->name}}</td>--}}
                                        {{--<td>--}}
                                            {{--<div>--}}
                                                {{--<a href="{{route('images.edit',$row->id)}}" class="btn btn-dark fa fa-file-image-o"></a>--}}
                                                {{--<a href="{{route('advertisements.edit',$row->id)}}" class="btn btn-primary fa fa-pencil"></a>--}}
                                                {{--<button type="button" class=" delete btn btn-danger fa fa-trash-o" data-url="{{route('advertisements.destroy',$row->id )}}"  data-token="{{ csrf_token()}}" data-val="{{ $row->title }}" ></button>--}}
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
        $(document).ready(function() {
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,


                ajax:
                    {
                     url:"   {{ route('advertisements.index') }}"
                     // method:"Post"
                    },

                columns: [
                    // {data: 'id'},
                    // {data: 'title'},
                    // {data: 'desc'},
                    // {data: 'city_id'},
                    // {data: 'price'},
                    // {data: 'user_id'},
                    // {data: 'subcategory_id'},
                    // {data: 'category_id'},
                    // {data: 'action'},


                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'desc', name: 'desc'},
                    {data: 'city_id', name: 'city_id'},
                    {data: 'price', name: 'price'},
                    {data: 'user_id', name: 'user_id'}
                    // {data: 'subcategory_id', name: 'subcategory_id'},
                    // {data: 'action', name: 'action'},
                    // {data: 'category', name: 'category'}

                        ]
            });
        });
    </script>
@endpush