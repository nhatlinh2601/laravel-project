@extends('layouts.backend.backend')
@section('page_title')
    Danh sách bài giảng
@endsection

{{-- <html>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</html> --}}

@section('content')
    <div class="card">
        @if (session('success'))
            <div style="margin: 0 20px" class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="margin: 0 20px" class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center card-header">
            <h3 class="card-title">Danh sách bài giảng</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <h2 style="text-align: center;margin-bottom: 12px;font-weight: 500">Khóa học {{ $course->name }}</h2>
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class=" dataTables_filter">
                            <form action="{{ route('admin.course.lesson.find-lesson') }}" method="POST"
                                class="d-flex align-items-center">
                                @csrf
                                <label class="d-flex justify-content-center align-items-center">

                                    <input name="search_key" style="margin: 0 4px" type="search"
                                        class="form-control form-control-sm" placeholder="Key word" aria-controls="example1"
                                        value="{{ old('search_key') }}">



                                </label>
                                <button title="Search" type="submit" class="btn btn-flat btn-info"
                                    style="border-radius: 4px;margin: 0 4px">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href={{ route('admin.course.lesson.add',$course) }}> <button
                                style="border: none;float: right;margin-bottom: 16px" class="btn-flat btn-lg btn-success"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button></a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <div id="lesson_table" data-course="{{ $course->id }}">
                            @include('pages.backend.lesson.data')
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- @foreach ($lessons as $lesson)
            {{ $lesson->name }}
        @endforeach
        {!! $lessons->links() !!} --}}
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var course = $('#lesson_table').data('course');
            fetch_user_data(page, course);
        });

        function fetch_user_data(page,course) {
            $.ajax({
                url: "/admin/course/lesson/" + course + "/list/ajax?page=" + page,
                success: function(data) {
                    $('#lesson_table').html(data);
                }
            });
        }
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


<script>
    $(document).ready(function() {
        $('.lesson-name-cell').click(function() {
            const listVideo = $(this).find('.list-video');
            if (listVideo.is(':hidden')) {
                listVideo.css('display', 'block').animate({
                    maxHeight: '300px'
                }, 300);
            } else {
                listVideo.animate({
                    maxHeight: '0'
                }, 300, function() {
                    $(this).css('display', 'none');
                });
            }
        });
    });
</script>
