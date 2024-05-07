@extends('layouts.backend.backend')

@section('page_title')
    Cập nhật bài giảng
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h4 style="text-align: center;margin-bottom: 20px">Thông tin bài giảng</h4>

        <div class="row">
            <div class="col-12 col-md-6">
                <form action="{{ route('admin.course.lesson.post-edit', $lesson) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-12 ">
                        <label for="">Tên bài giảng</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" name="name" id="" class="form-control"
                                value='{{ $lesson->name ?? old('name') }}'>
                        </div>
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="">Mô tả</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <textarea rows="8" type="text" name="detail" class="form-control">{{ $lesson->description ?? old('detail') }}</textarea>
                        </div>
                        @error('detail')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>




                    <div class="form-group col-12 ">
                        <label for="">Tài liệu</label>
                        <br>

                        <input type="file" name="file">
                        @error('file')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>



                    <div class="form-row form-add">
                        <button class="btn btn-primary " type="submit">Cập
                            nhật bài giảng</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">

                <div class="form-group col-12 ">
                    <label for="">Video bài giảng</label>

                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card collapsed-card">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover box-body text-wrap table-bordered">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tiêu đề</th>
                                                <th>Đường dẫn</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lesson->videos as $video)
                                                <tr class=''>

                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">

                                                        <span class="badge badge-success">

                                                            {{ $video->id }}
                                                        </span>
                                                    </td>
                                                    <td class="">{{ $video->name }}</td>
                                                    <td class="">{{ $video->url }}</td>
                                                    <td class="">
                                                        <a style="margin: 0 4px; border-radius: 4px"
                                                            href='{{ route('admin.course.lesson.video.delete', ['video' => $video]) }}'>
                                                            <span style="border-radius: 2px" title="Delete" type='button'
                                                                onclick="return confirmDelete() "
                                                                class="btn btn-flat btn-sm btn-danger">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </span></a>
                                                        </a>
                                                    </td>


                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="container">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example1_info" role="status"
                                                aria-live="polite">
                                                Hiển thị
                                                {{ $videos->firstItem() }} - {{ $videos->lastItem() }} /
                                                {{ $videos->total() }} videos.
                                            </div>
                                        </div>
                                        {!! $videos->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card collapsed-card">



                                {{-- <div class="form-group col-12 ">
                                        <label for="">Tiêu đề video</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            <input name="title" class="form-control" value={{ old('title') }}>
                                        </div>
                                        @error('title')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 ">
                                        <label for="">Đường dẫn URL</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            <input name="url_video" class="form-control" value={{ old('url_video') }}>
                                        </div>
                                        @error('url_video')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                <div class="d-flex justify-content-">
                                    <div class="form-group col-12 ">
                                        <a href="{{ route('admin.course.lesson.video.post-add', $lesson) }}">
                                            <button type="submit"
                                                style="display: inline-block;
                                                        position: relative;
                                                        left: 50%;
                                                        transform: translateX(-50%);"
                                                type="button" class="btn btn-flat btn-success" title="Add new"><i
                                                    class="fa fa-plus"></i>
                                                Thêm mới video</button>
                                        </a>
                                    </div>

                                </div>




                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>














    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function confirmDelete(elementId) {
        if (confirm("Bạn muốn xóa khóa học khỏi đơn hàng này?")) {
            var row = document.getElementById(elementId).parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
        return false;
    }

    $(document).ready(function() {
        var i = 1;

        $('#add_video').on('click', function() {
            var title_video = $('#title_video').val();
            var url_video = $('#url_video').val();
            var error_title = document.getElementById('error_title');
            var error_url = document.getElementById('error_url');

            if (title_video === '') {
                error_title.style.display = 'block';
            } else {
                error_title.style.display = 'none';
            }

            if (url_video === '') {
                error_url.style.display = 'block';
            } else {
                error_url.style.display = 'none';
            }

            if (title_video !== '' && url_video !== '') {
                var newRow = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");

                cell1.textContent = i;
                cell2.textContent = title_video;
                cell3.textContent = url_video;
                cell4.innerHTML = `<span id="delete${i}" style="border-radius: 2px" title="Delete" type='button'
                onclick="return confirmDelete('delete${i}')" class="btn btn-flat btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>`;

                newRow.appendChild(cell1);
                newRow.appendChild(cell2);
                newRow.appendChild(cell3);
                newRow.appendChild(cell4);

                document.querySelector("#myTable tbody").appendChild(newRow);

                $('#title_video').val('');
                $('#url_video').val('');
                i++;
            }
        });
    });






    ClassicEditor
        .create(document.querySelector('#lesson-decripsion'))
        .catch(error => {
            console.error(error);
        });
</script>
