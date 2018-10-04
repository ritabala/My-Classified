@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create a new City</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item">City</li>
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
                    <form action="{{route('cities.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" placeholder="City name" id="city" name="name">
                            @if ($errors->has('name'))
                                <small class="error text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cat">Country</label>
                            <select class="form-control" placeholder="country name" id="cat" name="country">
                                @foreach($country as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
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