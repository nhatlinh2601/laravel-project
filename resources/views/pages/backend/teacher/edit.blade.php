@extends('layouts.backend.backend')

@section('page_title')
    Cập nhật thông tin giáo viên
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action={{ route('admin.teacher.post-edit', $teacher) }} method="post" enctype="multipart/form-data">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px"> Cập nhật thông tin giáo viên</h4>
            <div class="form-row form-add">
                <div class="form-group col-12 col-md-6">
                    <label for="">Họ tên</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control"
                            value='{{ $teacher->name ?? old('name') }}'>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Mô tả</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <textarea rows="8" type="textarea" name="description" id="" class="form-control" value=''>{{ $teacher->description ?? old('description') }}</textarea>
                    </div>

                    @error('description')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="">Hình ảnh</label>
                    <br>

                    <input style="margin-top: 4px" type="file" name="image" accept="image/*">
                    @error('image')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="">Kinh nghiệm</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="exp" id="" class="form-control"
                            value='{{ $teacher->exp ?? old('exp') }}'>
                    </div>

                    @error('exp')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>
                <button style="margin: 30px 6px" class="btn btn-primary " type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
