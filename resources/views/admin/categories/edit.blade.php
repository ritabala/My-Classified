@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Edit your Categories here</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item">Category</li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content align-content-between">
            <div class="row">
                <div class="col-8">
                    <form action="{{route('categories.update',$cat->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="cat">Category</label>
                            <input type="text" class="form-control" value="{{$cat->cat_name}}" id="cat" name="cat_name">
                            @if ($errors->has('cat_name'))
                                <small class="error text-danger">{{ $errors->first('cat_name') }}</small>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection