@extends('layouts.backend.backend')
@section('page_title')
    Danh sách nhóm quyền
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
            <h3 class="card-title">Danh sách Nhóm quyền</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    <div class="col-sm-12 col-md-6">

                    </div>
                    <div class="col-12 col-md-6">
                        {{--  --}}
                        <a href={{ route('admin.role.add') }}> <button style="border: none;float: right;margin-bottom: 16px"
                                class="btn-flat btn-lg btn-success"><i class="fa fa-plus"
                                    aria-hidden="true"></i></button></a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="role_table">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%" class="sorting sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                aria-sort="ascending" style="">
                                                STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">Role
                                            </th>
                                            <th style="width: 50%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">Permission</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div>
                                            <p></p>
                                            @foreach ($roles as $role)
                                                <tr class=''>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        @foreach ($role->permissions->pluck('name') as $item)
                                                            <span class="badge badge-success">{{ $item }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td><a style="margin: 0 4px"
                                                            href='{{ route('admin.role.set-permission', $role) }}'>
                                                            <span style="border-radius: 2px" title="Phân quyền"
                                                                type='button' class="btn btn-flat btn-sm btn-primary">
                                                                <i class="fas fa-edit    "></i>
                                                            </span>
                                                        </a>

                                                        <a style="margin: 0 4px; border-radius: 4px" href='{{ route('admin.role.delete',$role) }}'>
                                                            <span style="border-radius: 2px" title="Delete" type='button'
                                                                onclick="return confirmDelete() "
                                                                class="btn btn-flat btn-sm btn-danger">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </span></a>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                    </tbody>


                                </table>

                                <div class="container">
                                    {{-- <div class="row">

                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example1_info" role="status"
                                                aria-live="polite">Hiển thị
                                                {{ $users->firstItem() }} - {{ $users->lastItem() }} /
                                                {{ $users->total() }} người dùng.
                                            </div>
                                        </div>
                                        {!! $users->links() !!}
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
<!-- Bạn có thể sử dụng CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function confirmDelete() {

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        return result;
    }
</script>
