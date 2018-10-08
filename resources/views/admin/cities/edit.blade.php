@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-black fa fa-map-marker">&nbsp; Cities</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admins.index')}}"  class="fa fa-home text-black-50"></a></li>
                            <li class="breadcrumb-item"><a href="{{route('cities.index')}}" class="text-black-50" >City</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline">
                            {{--<div class="card-body">--}}
                            {{--<h3 class="card-header">Create a new Advertisement</h3>--}}
                            <div class="card-header bg-dark">
                                <h5>Edit City here</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <form action="{{route('cities.update',$city->id)}}" method="post">
                                            @csrf
                                            {{ method_field('PUT') }}

                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" value="{{$city->name}}" id="city" name="name">
                                                @if ($errors->has('name'))
                                                    <small class="error text-danger">{{ $errors->first('name') }}</small>
                                                @endif
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </form>
                                        <!-- /.form -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection