@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload image for Advertisements</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item">Advertisement</li>
                            <li class="breadcrumb-item active">Image</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content align-content-between">
            <div class="row bg-gray-light">
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection