@extends('layouts.backend.backend')

@section('page_title')
    Thêm mới danh mục
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form class="form-add" action={{ route('admin.category.post-add') }} method="post">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px">Thông tin danh mục </h4>
            <div class="form-row ">
                <div class="form-group col-12 ">
                    <label for="">Tên danh mục</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control"
                            value='{{ old('name') ? old('name') : '' }}'>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
              
                <div class="form-group col-12 col-md-3">
                    <label for="">Public</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                       <input style="width: 30px" type="checkbox" name="public" id="public">
                    </div>
                    @error('public')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="">Trạng thái</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input style="width: 30px" type="checkbox" name="status" id="status">
                    </div>
                    @error('status')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>


            </div>
            <button style="margin: 30px 6px" class="btn btn-primary form-add " type="submit">Thêm mới danh mục</button>
        </form>
    </div>
@endsection
