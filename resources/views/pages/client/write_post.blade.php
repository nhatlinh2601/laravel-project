@extends('layouts.clients.client')
@section('title')
    Viết bài post
@endsection

@section('content')
        <form method="POST" action="{{ route('posts.postAdd') }}" enctype="multipart/form-data" >
            @csrf

            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}
                @endif
                <div class="row mt-100">
                    <div class="col-lg-12">
                        <div class="mb-2">Chọn thể loại <span style="color: red;">(*) </span>:</div>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option selected>Chọn thể loại phù hợp với bài viết</option>
                            @foreach($categories as $cate)
                            <option name="category_id" value="{{$cate->id}} {{ old('category') == $cate->id ? 'selected' : '' }}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="mb-2">Title <span style="color: red;">(*) </span>:</div>
                        <input name="title" value="{{ old('title') }}" class="form-title" type="text" placeholder="Nhập title" aria-label="default input example">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="mb-2">Hình ảnh: <span style="color: red;">(*) </span>:</div>
                        <input name="image" class="form-title" type="file" >
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="mb-2">Nội dung <span style="color: red;">(*) </span>:</div>
                        <textarea id="editor" name="content" wire:model="content">
                            Viết bài post ở đây 
                        </textarea>

                        <div style="float: right;"><button type="submit" class="btn-phu mt-5" style=" border: 1px solod">Đăng bài</button></div>
                                
                    </div>
                </div>
            </div>
       </form>


        <script>
            var editor = CKEDITOR.replace( 'editor' );
         </script>

@endsection