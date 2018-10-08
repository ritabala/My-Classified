@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-black fa fa-buysellads">&nbsp; Advertisements</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admins.index')}}"  class="fa fa-home text-black-50"></a></li>
                                <li class="breadcrumb-item"><a href="{{route('advertisements.index')}}" class="text-black-50" >Advertisement</a></li>
                                <li class="breadcrumb-item active">Image</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            <!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline">
                            <div class="card-header bg-dark">
                                <h5>Upload images for Advertisement here</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">

                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="title">Advertisement Title</label>
                                                <input  type="text" name="title" class="form-control"  value="{{$adv->title}}">
                                                <input  type="hidden" name="advertisement_id" class="form-control"  value="{{$adv->id}}">
                                            </div>

                                            <label for="Image">Advertisement photos (can attach more than one):</label>
                                            <br />
                                            <input type="file" class="form-control" name="image_path[]" multiple />
                                            <br />

                                            <input type="submit" class="btn btn-primary" value="Upload" />

                                        </form>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection