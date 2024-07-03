@extends('layouts.admin')

@section('title')

<title>Slider</title>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/slider/add/add.css')}}">
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header' , ['name' => 'Slider' , 'key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" 
                            value="{{$slider->name}}">
                        </div>

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Mô tả slider</label>
                            <textarea name="description"  rows="4" class="form-control @error('description') is-invalid @enderror">{{$slider->description}}</textarea>
                        </div>



                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input name="image_path" type="file" class="form-control-file @error('image_path') is-invalid @enderror ">
                        </div>

                        <div class="col-md-">
                            <div class="row">
                                    <img src="{{$slider->image_path}}" alt="">
                            </div>
                        </div>

                        @error('image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>

                <!-- <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->





            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection