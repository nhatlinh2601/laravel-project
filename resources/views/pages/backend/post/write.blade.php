@extends('layouts.backend.backend')

@section('page_title')
    Viết bài
@endsection



@section('content')
    <form action="{{ route('admin.user.post.post-write') }}" method="POST">
        @csrf
        <div class="form-add form-group col-16 col-md-3">
            <select class="form-select form-control" name="category" aria-label="Default select example">
                <option value=0 {{ old('category') == 0 ? 'selected' : '' }}>Danh mục bài viết</option>
                @if ($categories)
                    @foreach ($categories as $item)
                        <option value={{ $item->id }} {{ old('category') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('category')
                <span style="color: red">{{ $message }}</span>
            @enderror

        </div>
        <div class="wrapper">
            <div class="form-add form-group col-12 ">
                <input
                    style=" 
            width: 100%;
            border: none;
            outline: none;
            padding: 16px;
            font-size: 24px;
            font-weight: 500;"
                    type="text" name="post_title" id="post-title" placeholder="Tiêu đề ở đây">
                @error('post_title')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 ">
                <textarea name="post_content" id="post-content"></textarea>
                @error('post_content')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" style="margin: 30px" class="btn btn-primary  ">Xuất bản</button>

        </div>
    </form>



@endsection
