<html>
@if ($courses)
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
            aria-describedby="example1_info">
            <thead>
                <tr>

                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending"
                        style="">
                        ID</th>
                    <th style="width: 20%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                        colspan="1" aria-label="Browser: activate to sort column ascending">Tên khóa học</th>
                    <th style="width: 15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                        colspan="1" aria-label="Browser: activate to sort column ascending">Hình ảnh</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Danh mục</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Giáo viên</th>

                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Số học viên</th>

                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">
                        Giá</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Giá khuyến mãi</th>

                    @hasanyrole('admin|teacher')
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="">Hành động</th>
                    @else
                    @endhasanyrole


                </tr>
            </thead>
            <tbody>



                @foreach ($courses as $course)
                    <tr class=''>


                        <td class="sorting_1 dtr-control" tabindex="0" style="">

                            <span class="badge badge-success">

                                {{ $course->id }}
                            </span>
                        </td>
                        <td class="">{{ $course->name }}</td>

                        <td style="">
                            <img style="width: 100%" src='{{ asset('storage/' . $course->image_path) }}' alt="">

                        </td>
                        <td>{{ $course->category->name }}</td>

                        <td style="">{{ $course->teacher->name }}</td>
                        <td style="">
                            60
                            <span style="margin-left: 10px;border-radius: 2px" title="Link" type='button'
                                class="btn btn-flat btn-sm btn-info">
                                <i class="fas fa-external-link-alt    "></i>
                            </span>
                        </td>

                        <td style="">{{ $course->price }}</td>
                        <td style="">{{ $course->sale_price }}</td>


                        @hasanyrole('admin|teacher')
                            <td style="width: 15%">
                                <a style="margin: 0 4px" href='{{ route('courses.courseDetail', ['id' => $course->id]) }}'>
                                    <span style="border-radius: 2px" title="Link" type='button'
                                        class="btn btn-flat btn-sm btn-info">
                                        <i class="fas fa-external-link-alt    "></i>
                                    </span>
                                </a>

                                <a style="margin: 0 4px" href='{{ route('admin.course.manage', ['course' => $course]) }}'>
                                    <span style="border-radius: 2px" title="Edit" type='button'
                                        class="btn btn-flat btn-sm btn-primary">
                                        <i class="fas fa-edit    "></i>
                                    </span>
                                </a>
                                <a style="margin: 0 4px; border-radius: 4px"
                                    href='{{ route('admin.course.delete', ['course' => $course]) }}'>
                                    <span style="border-radius: 2px" title="Delete" type='button'
                                        onclick="return confirmDelete() " class="btn btn-flat btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span></a>
                                </a>
                            </td>
                        @else
                        @endhasanyrole








                    </tr>
                @endforeach



            </tbody>

        </table>


        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị
                        {{ $courses->firstItem() }} - {{ $courses->lastItem() }} / {{ $courses->total() }} khóa
                        học.
                    </div>
                </div>
                {!! $courses->links() !!}
            </div>
        </div>


    </div>
@else
    <h4 style="text-align: center"> Bạn chưa có khóa học nào.</h4>
@endif

</html>

<script>
    function confirmDelete() {

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        return result;
    }

    function confirmRestore() {

        var result = confirm("Bạn có chắc chắn muốn khôi phục không?");
        return result;
    }
</script>
