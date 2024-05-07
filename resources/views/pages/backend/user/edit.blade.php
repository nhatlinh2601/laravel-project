@extends('layouts.backend.backend')

@section('page_title')
    Cập nhật thông tin người dùng
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action={{ route('admin.user.post-edit', ['user' => $user]) }} method="post" enctype="multipart/form-data">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px">Thông tin người dùng</h4>
            <div class="form-row form-add">
                <div class="form-group col-12 ">
                    <label for="">Họ tên</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control"
                            value='{{ $user->name ? $user->name : old('name') }}'>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 ">
                    <label for="">Email</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input readonly type="text" name="email" id="" class="form-control"
                            value='{{ $user->email ? $user->email : old('email') }}'>
                    </div>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 ">
                    <label for="">Mật khẩu</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input readonly type="password" name="password" id="" class="form-control"
                            value='{{ $user->password }}'>
                    </div>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 ">
                    <label for="">Nhóm</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>

                        <select class="form-select form-control" name="group" aria-label="Default select example">
                            <option value=0 {{ $user->group_id == 0 ? 'selected' : '' }}>Vui lòng chọn nhóm</option>
                            @if ($groups)
                                @foreach ($groups as $item)
                                    <option value={{ $item->id }} {{ $user->group_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('group')
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
                <button style="margin: 30px 6px" class="btn btn-primary " type="submit">Cập nhật người dùng</button>
            </div>
        </form>
    </div>
@endsection