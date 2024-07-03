@extends('layouts.admin')

 
@section('title')
<title>Product</title>
@endsection  

@section('css') 
<link rel="stylesheet" href="{{asset('admins/setting/index/index.css') }}"> 
@endsection  

@section('js')
  <script src="{{asset('vendors/sweetAlert2/sweetalert2.js')}}"></script>
  <script src="{{asset('admins/product/index/list.js') }}"></script>
@endsection  
 




 @section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  
   
  @include('partials.content-header' , ['name' => 'product' , 'key' =>'List'])

  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href=" {{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>

         <div class="col-md-12">

        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
          <tbody>   

            @foreach ($products as $productItem)
                            
            <tr>
              <th scope="row"> {{$productItem->id}}</th>
              <td>{{$productItem->name}}</td>
              <td>{{number_format($productItem->price)}}</td>
              <td>
                <img class="product_image_150_100" src="{{$productItem->feature_image_path}}" alt="">
              </td>
              <td>  {{ optional($productItem->category)->name }}  </td>
              </td>
              <td>
                <a href="{{ route('product.edit', ['id' => $productItem->id])}}" class ="btn btn-default">edit</a>
                <a href="" data-url="{{route('product.delete',['id'=>$productItem->id])}}" class ="btn btn-danger action_delete">delete</a>
              </td>
              </td>
            </tr>

            @endforeach

          </tbody>
      </table>

      </div> 

      {{$products->links("pagination::bootstrap-4")}}

      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  
