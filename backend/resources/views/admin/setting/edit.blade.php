@extends('layouts.admin')

@section('title')
<title>Setting</title>
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'settings ', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('settings.update',['id'=>$setting->id])}}" method="post">
                        @csrf
                        <div class="form-group @error('config_key') is-invalid @enderror">
                            <label>Config key</label>
                            <input type="text" class="form-control" name="config_key" placeholder="config_key"
                            value="{{$setting->config_key}}">
                        </div>

                        @error('config_key')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @if (request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value" placeholder="config_value"  value="{{$setting->config_value}}">
                        </div>
                        @elseif (request()->type === 'Textarea')
                        <div class="form-group">
                            <label>Config value</label>
                            <textarea type="text" class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value" placeholder="config_value" rows="4"
                                value="{{$setting->config_value}}"></textarea>
                        </div>

                        @endif

                        @error('config_value')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection