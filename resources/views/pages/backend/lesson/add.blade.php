@extends('layouts.backend.backend')

@section('page_title')
    Thêm bài giảng
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action={{ route('admin.course.lesson.post-add',$course) }} method="post" enctype="multipart/form-data">
            @csrf
            <h4 style="text-align: center;margin-bottom: 20px">Thông tin bài giảng</h4>
            <div class="form-row form-add">
                <div class="form-group col-12 ">
                    <label for="">Tên bài giảng</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <input type="text" name="name" id="" class="form-control" value='{{ old('name') }}'>
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 ">
                    <label for="">Mô tả</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        <textarea rows="8" type="text" name="detail" class="form-control">{{ old('detail') }}</textarea>
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

                <button style="margin: 40px 0; " class="btn btn-primary " type="submit">Thêm bài giảng</button>
            </div>
        </form>

     

        

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






  
</script>
