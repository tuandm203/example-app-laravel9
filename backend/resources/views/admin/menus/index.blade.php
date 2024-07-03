@extends('layouts.admin')

 
 @section('title')
  
<title>Menus</title>
 
 @endsection  


 @section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  
   
  @include('partials.content-header' , ['name' => 'menu' , 'key' =>'List'])

  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href=" {{ route ('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>

         <div class="col-md-12">

        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ten menu</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
          <tbody>   

            @foreach($menus as $menu)

            <tr>
              <th scope="row"> {{ $menu->id }}</th>
              <td>{{ $menu->name }}</td>
              <td>
                <a href=" {{ route('menus.edit', ['id'=> $menu->id])}} " class ="btn btn-default">edit</a>
                <a href=" {{route('menus.delete',['id'=> $menu->id])}}" class ="btn btn-danger">delete</a>

              </td>
            </tr>

          @endforeach

          </tbody>
      </table>

      </div> 

      {{$menus->links("pagination::bootstrap-4")}}

      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  
