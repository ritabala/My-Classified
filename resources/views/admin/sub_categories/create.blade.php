@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create a new Subcategory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item">Subcategory</li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content align-content-between">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('subcategories.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="subcatname">Subcategory</label>
                            <input type="text" class="form-control" placeholder="subcategory name" id="subcatname" name="sub_category_name">
                            @if ($errors->has('sub_category_name'))
                                <small class="error text-danger">{{ $errors->first('sub_category_name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cat">Category</label>
                            <select class="form-control" placeholder="category name" id="cat" name="catname">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                @endforeach
                            </select>
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