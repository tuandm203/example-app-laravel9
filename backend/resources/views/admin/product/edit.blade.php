@extends('layouts.admin')

@section('title')
<title>Product</title>
@endsection

@section('css')
<link href=" {{asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href=" {{asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])

    <form action="{{ route('product.update',['id' => $product->id])}}" action="" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input value="{{ $product->name }}" type="text" class="form-control" name="name"
                                placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input value="{{ $product->price }}" type="text" class="form-control" name="price"
                                placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                    @foreach ($product->productImages as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}"
                                            alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục </label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach ($product->tags as $tagItem)
                                <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                @endforeach
                            </select>
                        </div>




                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea name="content" class="form-control my-editor"
                                rows="3">{{ $product->content }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection

@section('js')
<script src="{{ asset ('vendors/select2/select2.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset ('admins/product/add/add.js')}}"></script>
@endsection