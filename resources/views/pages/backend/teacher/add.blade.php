@extends('layouts.backend.backend')

@section('page_title')
    Thêm giáo viên
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action={{ route('admin.teacher.post-add') }} method="post" enctype="multipart/form-data">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px">Thông tin giáo viên</h4>
            <div class="form-row form-add">
                <div class="form-group col-12 ">
                    <label for="">Họ tên</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control"
                            value='{{ old('name') }}'>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 ">
                    <label for="">Email</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="email" id="" class="form-control"
                            value='{{ old('email') }}'>
                    </div>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 ">
                    <label for="">Mật khẩu</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="password" name="password" id="" class="form-control"
                            value='{{ old('password') }}'>
                    </div>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 ">
                    <label for="">Mô tả</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <textarea type="text" name="description" id="editor" class="form-control" rows="8">{{ old('description') }}</textarea>
                    </div>

                    @error('description')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 ">
                    <label for="">Hình ảnh</label>
                    <br>

                    <input type="file" name="image" accept="image/*">
                    @error('image')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 ">
                    <label for="">Kinh nghiệm</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="exp" id="" class="form-control"
                            value='{{ old('exp') }}'>
                    </div>

                    @error('exp')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>
                <button style="margin: 30px 6px" class="btn btn-primary " type="submit">Thêm giáo viên</button>
            </div>
        </form>
    </div>
@endsection
