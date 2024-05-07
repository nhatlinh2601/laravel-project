@extends('layouts.backend.backend')
@section('page_title')
    Phân quyền
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
            <h3 class="card-title">Bạn đang phân quyền cho nhóm vai trò {{ $role->name }}</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.role.post-set-permission', $role) }} " method="POST">
                @csrf
                <div style="padding: 40px " class="control-group">

                    <div class="container">
                        <div class="row">

                            @foreach ($permissions as $item)
                                <div class="col-3">
                                    <label
                                        style="    padding: 16px;
                                   
                                    border-radius: 5px;">
                                        <input name="permissions[]" type="checkbox" value="{{ $item->name }}"
                                        {{ in_array($item->name, $rolePermissions) ? 'checked' : '' }}
                                            id="{{ $item->id }}">
                                        {{ $item->name }}

                                    </label>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="d-flex justify-content-center ">
                        <button type="submit" style="float: right" class="btn btn-primary">Phân quyền</button>
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
