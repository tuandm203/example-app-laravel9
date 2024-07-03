@extends('layouts.admin')

@section('title')

<title>User</title>

@endsection

@section('css')
<link href=" {{asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<style>
    .select2-selection__choice{
        background-color: #4e5a6a !important;
    }
</style>
@endsection

@section('js')
<script src="{{ asset ('vendors/select2/select2.min.js')}}"></script>
<script>
    $('.select2_init').select2({
        'placeholder' : 'Chọn vai trò'
    })
</script>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header' , ['name' => 'User' , 'key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action=" {{route('users.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên user</label>
                            <input name="name" type="text" class="form-control" 
                            placeholder="Nhập tên" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" 
                            placeholder="Nhập email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" 
                            placeholder="Nhập password" >
                        </div>

                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role_id[]" id="" class="form-control select2_init" multiple>
                                <option value="">Admin</option>
                                @foreach ($roles as $role)
                                <option
                                 {{$rolesOfUser->contains('id',$role->id) ? 'selected' : ''}} 
                                value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                
                            </select>
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