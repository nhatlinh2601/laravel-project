@extends('layouts.backend.backend')
@section('page_title')
    Danh sách bài viết
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</html>

@section('content')
    <div class="card">
        @if (session('success'))
            <div style="margin: 0 20px" class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="margin: 0 20px" class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center card-header">
            <h3 class="card-title">Danh sách bài viết</h3>
            <div class="action-header">

            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class=" dataTables_filter">
                            <form class="d-flex align-items-center">
                                @csrf
                                <label class="d-flex justify-content-center align-items-center">


                                    
                                    <select id="select_category" name="category" style="margin: 0 4px"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value=0 {{ old('category') == 0 ? 'selected' : '' }}>Danh mục</option>
                                        @if ($categories)
                                            @foreach ($categories as $item)
                                                <option value={{ $item->id }}
                                                    {{ old('category') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input id="search_key" style="margin: 0 4px" name="search_key" type="search"
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
                        <a href={{ route('admin.user.post.write') }}> <button
                                style="border: none;float: right;margin-bottom: 16px" class="btn-flat btn-lg btn-success"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                        </a>

                    </div>



                </div>
                <div class="row">
                    <div id="post_table" class="col-sm-12">
                        @include('pages.backend.post.data')
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_user_data(page);
        });

        function fetch_user_data(page) {
            $.ajax({
                url: "/admin/post/list/ajax?page=" + page,
                success: function(data) {
                    $('#post_table').html(data);
                }
            });
        }

        $('#btn_search').on('click', function() {
            event.preventDefault();
            var search_key = $('#search_key').val();
            var category = $('#select_category').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                // url: '/admin/user/list/group/ajax',
                url: ' {{ route('admin.post.find-post') }}',
                type: 'POST',
                data: {
                    search_key: search_key,
                    category: category,
                    _token: csrfToken
                },
                success: function(data) {

                    console.log('Server response:', data);
                    $('#post_table').html(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

        })

        //////
        $('#select_category').on('change', function() {
            var category = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                // url: '/admin/user/list/group/ajax',
                url: ' {{ route('admin.post.list-category') }}',
                type: 'POST',
                data: {
                    category: category,
                    _token: csrfToken
                },
                success: function(data) {

                    //   console.log('Server response:', data);
                    $('#post_table').html(data);
                },
                error: function(error) {
                    console.log('Error:', error);
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
