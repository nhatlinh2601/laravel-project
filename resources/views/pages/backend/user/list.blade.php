@extends('layouts.backend.backend')
@section('page_title')
    Danh sách người dùng
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
            <h3 class="card-title">Danh sách người dùng</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class=" dataTables_filter">
                            {{-- action="{{ route('admin.user.find-user') }}" --}}
                            <form class="d-flex align-items-center">
                                @csrf
                                <label class="d-flex justify-content-center align-items-center">

                                    {{-- <select name="orderBy" style="margin: 0 4px"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value=0 {{ old('orderBy') == 0 ? 'selected' : '' }}>Sắp xếp</option>
                                        <option value=1 {{ old('orderBy') == 0 ? 'selected' : '' }}>ID ASC</option>
                                        <option value=2 {{ old('orderBy') == 0 ? 'selected' : '' }}>ID DESC</option>
                                        <option value=3 {{ old('orderBy') == 0 ? 'selected' : '' }}>Name ASC</option>
                                        <option value=4 {{ old('orderBy') == 0 ? 'selected' : '' }}>Name DESC</option>

                                    </select> --}}
                                    <select id="select_group" name="group" style="margin: 0 4px"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value=0 {{ old('group') == 0 ? 'selected' : '' }}>Nhóm</option>
                                        @if ($groups)
                                            @foreach ($groups as $item)
                                                <option value={{ $item->id }}
                                                    {{ old('group') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input id="search_key" type="text" name="search_key" style="margin: 0 4px" type="search"
                                        class="form-control form-control-sm" placeholder="Search key"
                                        aria-controls="example1" value="{{ old('search_key') }}">


                                </label>

                                <button id="btn_search" title="Search" type="submit" class="btn btn-flat btn-info"
                                    style="border-radius: 4px;margin: 0 4px">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        {{--  --}}
                        <a href={{ route('admin.user.add') }}> <button style="border: none;float: right;margin-bottom: 16px"
                                class="btn-flat btn-lg btn-success"><i class="fa fa-plus"
                                    aria-hidden="true"></i></button></a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="user_table">
                            @include('pages.backend.user.data')
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
<!-- Bạn có thể sử dụng CDN -->
<script src="https:code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {

        // phan trang
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_user_data(page);
        });

        function fetch_user_data(page) {
            $.ajax({
                url: "/admin/user/list/ajax?page=" + page,
                success: function(data) {
                    console.log(data);
                    $('#user_table').html(data);
                }
            });
        }

         $('#btn_search').on('click', function() {
             event.preventDefault();
             var search_key = $('#search_key').val();
             var group = $('#select_group').val();
             var csrfToken = $('meta[name="csrf-token"]').attr('content');

             $.ajax({
                  url: '/admin/user/list/group/ajax',
                 url: ' {{ route('admin.user.find-user') }}',
                 type: 'POST',
                 data: {
                     search_key: search_key,
                     group: group,
                     _token: csrfToken
                 },
                 success: function(data) {

                      console.log('Server response:', data);
                     $('#user_table').html(data);
                 },
                 error: function(error) {
                     console.error('Error:', error);
                 }
             });
           
         })

        
         $('#select_group').on('change', function() {
             var group = $(this).val();
             var csrfToken = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                  url: '/admin/user/list/group/ajax',
                 url: ' {{ route('admin.user.list-group-ajax') }}',
                 type: 'POST',
                 data: {
                     group: group,
                     _token: csrfToken
                 },
                 success: function(data) {

                      //console.log('Server response:', data);
                     $('#user_table').html(data);
                 },
                 error: function(error) {
                     console.error('Error:', error);
                 }
             });

         })


    });


    function confirmDelete() {

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        return result;
    }

    function confirmRestore() {

        var result = confirm("Bạn có chắc chắn muốn khôi phục không?");
        return result;
    }
</script>
