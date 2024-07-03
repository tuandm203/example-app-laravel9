@extends('layouts.admin')
 
 @section('title')
  
  <title>Menus</title>
 
 @endsection  


 @section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

   @include('partials.content-header' , ['name' => 'menus' , 'key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-6">
        <form action=" {{ route ('menus.update', ['id'=> $menuFollowIdEdit -> id])}}"   method="post">
            @csrf 
              <div class="form-group">
                <label>Tên menu</label>
                <input name="name" 
                        type = "text"
                       class="form-control" 
                       placeholder="Nhập tên menu"
                       value="{{$menuFollowIdEdit -> name}}"
                       >
                        
              </div>

              <div class="form-group">
                <label > Chọn danh mục </label>
                <select  
                class="form-control" name="parent_id"
                 >
                  <option selected value="0"> Chon menu cha</option>
                 {!! $optionSelect !!}
                </select>
              </div>
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
  
