@extends('layouts.admin')


@section('title')

<title>Slider</title>

@endsection

@section('css')

<link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">

@endsection



@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2.js')}}"></script>
<script src="{{asset('admins/slider/index/index.js') }}"></script>
@endsection




@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



  @include('partials.content-header' , ['name' => 'Slider' , 'key' =>'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>

        <div class="col-md-12">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ten slider</th>
                <th scope="col">Desciption</th>
                <th scope="col">Hinh anh</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($sliders as $slider)
              <tr>
                <th scope="row">{{$slider->id}}</th>
                <td>{{$slider->name}}</td>
                <td>{{$slider->description}}</td>
                <td>
                  <img class="image_slider_150_100" src="{{$slider->image_path}}" alt="">
                </td>
                <td>
                  <a href=" {{route('slider.edit',['id'=>$slider->id])}} " class="btn btn-default">edit</a>
                  <a href=" "
                    data-url="{{route('slider.delete',['id'=>$slider->id])}}"
                    class="btn btn-danger action_delete"
                    >delete</a>

                </td>
              </tr>

              @endforeach

            </tbody>
          </table>

        </div>

        {{$sliders->links("pagination::bootstrap-4")}}

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection