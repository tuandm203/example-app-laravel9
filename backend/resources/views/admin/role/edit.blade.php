@extends('layouts.admin')

@section('title')

<title>Slider</title>

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/role/add/add.css')}}">
@endsection

@section('js')
    <script src="{{asset('admins/role/add/add.js')}}"></script>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header' , ['name' => 'Roles' , 'key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('roles.update',['id'=>$role->id])}}" method="post" enctype="multipart/form-data" style="width:100% ">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input name="name" type="text" class="form-control " placeholder="Nhập tên vai trò"
                                value="{{$role->name}}">
                        </div>

                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea name="display_name" rows="4"
                                class="form-control ">{{$role->display_name}}</textarea>
                        </div>

                    </div>

                    <div class="col-md-12">
                    
                        <div class="col-md-12">
                            <label >
                                <input type="checkbox" class="checkall">
                                checkall
                            </label>
                            </div>  
                        @foreach ($permissionsParent as $permissionsParentItem)
                            <div class="card border-info mb-3 col-md-12"   >
                                <div class="card-header"  >
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrapper"  >
                                    </label>
                                    Module {{$permissionsParentItem->name}}
                                </div>
                                <div class="row">
                                    @foreach ($permissionsParentItem->permissionChildrent as $permissionChildrentItem)
                                    <div class="card-body text-info col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" name="permission_id[]" 
                                                {{$permissionsChecked->contains('id',$permissionChildrentItem->id) ? 'checked' : ''}}
                                                class="checkbox_childrent"
                                                value="{{$permissionChildrentItem->id}}">
                                            </label>
                                            {{$permissionChildrentItem->name}}
                                        </h5>
                                     </div>
                                     @endforeach
                                 </div>
                             </div>
                        @endforeach
                   
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection