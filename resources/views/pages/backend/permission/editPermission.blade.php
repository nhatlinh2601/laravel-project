@extends('layouts.backend.backend')
@section('page_title')
    Edit permission
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="card">
        @if (session('success'))
            <div style="margin: 0 20px" class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="margin: 0 20px" class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center card-header">
            <h3 class="card-title">Edit permission</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.permission.post-edit', $permission) }} " method="POST">
                @csrf
                <div style="padding: 0 40px " class="control-group">

                    <div class="container">
                        <div class="row">
                            <div class="form-group col-12 ">
                                <label for="">Tên</label>

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    <input type="text" name="name" id="" class="form-control"
                                        value='{{ old('name') ?? $permission->name }} '>

                                </div>

                                @error('name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>

                    </div>
                    <div class="d-flex justify-content-center ">
                        <button type="submit" style="float: right; margin-top: 16px;" class="btn btn-primary">Cập nhật</button>
                    </div>


                </div>
            </form>
        </div>

    </div>
    <!-- /.card-body -->
    </div>
@endsection
<!-- Bạn có thể sử dụng CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script></script>
