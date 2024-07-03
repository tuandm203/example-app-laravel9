@extends('layouts.admin')
 
 @section('title')
  
  <title>Permission</title>
 
 @endsection  


 @section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

   @include('partials.content-header' , ['name' => 'Permission' , 'key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-12">
        <form action=" {{route('permissions.store')}}"   method="post">
            @csrf 
            

              <div class="form-group">
                <label > Chọn tên modul </label>
                <select  class="form-control" name="module_parent">
                    <option value="">Chọn tên modul</option>
                 @foreach (config('permissions.table_modul') as $modulItem)
                     <option value="{{$modulItem}}" >{{ $modulItem }} </option>
                 @endforeach
                </select>
              </div>
             

              <div class="form-group">
                <div class="row">
                    @foreach (config('permissions.modul_childrent') as $modulItemChildrent)
                    <div class="col-md-3">
                        <label >
                            <input type="checkbox" value="{{$modulItemChildrent}}" name="module_chilrent[]">
                            {{$modulItemChildrent}}
                        </label>
                    </div>
                    @endforeach
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

  
  </div>


  




        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  
