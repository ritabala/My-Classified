@extends('layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1>Sub Categories</h1>
                        @if ($message=Session::get('success'))
                            <div class="align-content-left alert-success" >{{$message}}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item active">Subcategory</li>
                        </ol>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li><a href="{{route('subcategories.create')}}" class="fa fa-plus-circle btn btn-dark btn-sm"> Create New</a></li>
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
                                @foreach($subcategory as $subcat)
                                    <tr>
                                        <td>{{$subcat->id}}</td>
                                        <td>{{$subcat->sub_category_name}}</td>
                                        <td>{{$subcat->category->category_name}}</td>

                                        <td>
                                            <div>
                                                <a href="{{route('subcategories.edit',$subcat->id)}}" class="btn btn-primary fa fa-pencil"></a>
                                                <button type="button" class=" delete btn btn-danger fa fa-trash-o" data-url="{{route('subcategories.destroy',$subcat->id )}}"  data-token="{{ csrf_token()}}" data-val="{{ $subcat->subcat_name }}" ></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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