@extends('layouts.backend.backend')

@section('page_title')
    Thêm khóa học
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action={{ route('admin.course.post-add') }} method="post" enctype="multipart/form-data">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px">Thông tin khóa học</h4>
            <div class="form-row form-add">
                <div class="form-group col-12">
                    <label for="">Tên khóa học</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control" value={{ old('name') }}>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Danh mục</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>

                        <select class="form-select form-control" name="category" aria-label="Default select example">
                            <option value=0 {{ old('category') == 0 ? 'selected' : '' }}>Vui lòng chọn danh mục</option>
                            @if ($categories)
                                @foreach ($categories as $item)
                                    <option value={{ $item->id }} {{ old('category') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('category')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>
                @hasrole('admin')
                <div class="form-group col-16 col-md-6">
                    <label for="">Giáo viên</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>

                        <select class="form-select form-control" name="teacher" aria-label="Default select example">
                            <option value=0 {{ old('teacher') == 0 ? 'selected' : '' }}>Vui lòng chọn giáo viên</option>
                            @if ($teachers)
                                @foreach ($teachers as $item)
                                    <option value={{ $item->id }} {{ old('teacher') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('teacher')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>
                @endhasrole
                <div class="form-group col-12 col-md-12">
                    <label for="">Hình ảnh</label>
                    <br>

                    <input type="file" name="image" accept="image/*">
                    @error('image')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-12">
                    <label for="">Mô tả</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>

                        <textarea rows="8" type="text" name="detail" id="" class="form-control">{{ old('detail') }}</textarea>
                    </div>
                    @error('detail')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Giá gốc</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="price" id="" class="form-control" value={{ old('price') }}>
                    </div>
                    @error('price')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Giá khuyến mãi</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="sale_price" id="" class="form-control"
                            value={{ old('sale_price') }}>
                    </div>
                    @error('sale_price')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
              


                <button style="margin: 30px 6px" class="btn btn-primary " type="submit">Thêm khóa học</button>
            </div>
        </form>
    </div>
@endsection
