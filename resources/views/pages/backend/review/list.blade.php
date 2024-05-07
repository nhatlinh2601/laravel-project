@extends('layouts.backend.backend')
@section('page_title')
    Danh sách đánh giá
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
            <h3 class="card-title">Danh sách đánh giá</h3>
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
                                        <option value=0>Danh mục</option>
                                        <option value=1>Khóa học</option>
                                        <option value=2>Giảng viên</option>
                                        <option value=3>Tin tức</option>
                                        <option value=4>Bài học</option>
                                    </select>
                                    
                                </label>

                               
                            </form>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div id="review_table" class="col-sm-12">
                        @include('pages.backend.review.data')
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
                url: "/admin/review/list/ajax?page=" + page,
                success: function(data) {
                    $('#review_table').html(data);
                }
            });
        }

       

        //////
        $('#select_category').on('change', function() {
            var category = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                // url: '/admin/user/list/group/ajax',
                url: ' {{ route('admin.review.list-category') }}',
                type: 'POST',
                data: {
                    category: category,
                    _token: csrfToken
                },
                success: function(data) {

                    //   console.log('Server response:', data);
                    $('#review_table').html(data);
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
