@extends('layouts.admin')

 



@section('title')
  <title>Settings</title>
@endsection

@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2.js')}}"></script>
<script  src="{{asset('admins/main.js')}}"></script>


@endsection

 @section('css')
 <link rel="stylesheet" href="{{asset('admins/setting/index/index.css')}}">
@endsection  

 @section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  
   
  @include('partials.content-header' , ['name' => 'settings ' , 'key' =>'List'])

  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            <div class="btn-group float-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  Add Settings
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                    <li><a href="{{route('settings.create').'?type=Textarea'}}">Textarea</a></li>
                </ul>
              </div>

            {{-- <a href="{{route('settings.create')}}" class="btn btn-success float-right m-2">Add</a> --}}
          </div>

         <div class="col-md-12">

        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Config key</th>
            <th scope="col">Config value</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
          <tbody>   
            @foreach ($settings as $setting)
    
            <tr>
              <th scope="row"> {{$setting->id}}</th>
              <td>{{$setting->config_key}}</td>
              <td>{{$setting->config_value}}</td>
              <td>
                <a href=" {{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}} " class ="btn btn-default">edit</a>
                <a href=" "
                data-url="{{route('settings.delete',['id'=> $setting->id])}}" 
                class ="btn btn-danger action_delete">delete</a>

              </td>
            </tr>

            @endforeach
          </tbody>
      </table>

      </div> 

      {{$settings->links("pagination::bootstrap-4")}}

      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  
