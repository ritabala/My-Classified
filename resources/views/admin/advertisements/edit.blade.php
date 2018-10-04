@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Edit your Advertisement here</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="fa fa-home"></a></li>
                            <li class="breadcrumb-item">Advertisement</li>
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
                    <form action="{{route('advertisements.update',$adv->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="id">#</label>
                            <input disabled type="text" class="form-control" value="{{$adv->id}}" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{$adv->title}}" id="title" name="title">
                            @if ($errors->has('title'))
                                <small class="error text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control" value="{{$adv->desc}}" id="desc" name="desc">
                            @if ($errors->has('desc'))
                                <small class="error text-danger">{{ $errors->first('desc') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select type="text" class="form-control" value="{{$adv->city->name}}"  id="city" name="city_id">
                            @foreach($city as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" value="{{$adv->price}}"  id="price" name="price">
                            @if ($errors->has('price'))
                                <small class="error text-danger">{{ $errors->first('price') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="subcategory">Subcategory</label>
                            <select type="text" class="form-control" value="{{$adv->subcategory->sub_category_name}}" id="subcategory" name="subcategory_id">
                                @foreach($subcategory as $row)
                                    <option value="{{$row->id}}">{{$row->sub_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">User</label>
                            <select type="text" class="form-control" value="{{$adv->user->name}}"  id="user" name="user_id">
                            @foreach($user as $row)
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