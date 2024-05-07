<html>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending"
                        style="">
                        ID</th>
                    <th style="width: 20%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                        colspan="1" aria-label="Browser: activate to sort column ascending">Tên bài giảng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Vị trí</th>
                    <th style="width: 15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                        colspan="1" aria-label="Browser: activate to sort column ascending">Chi tiết</th>
    
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Thời lượng</th>
    
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">
                        Lượt xem</th>
    
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Hành động</th>
    
    
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr class=''>
    
                        <td class="sorting_1 dtr-control" tabindex="0" style="">
                            <span class="badge badge-success">
    
                                {{ $lesson->id }}
                            </span>
                        </td>
                        <td class="lesson-cell">
                            <p class="lesson" style="font-weight: 600"> {{ $lesson->name }}
                            <div class="list-video">
                                @foreach ($lesson->videos as $item)
                                    <div>
    
                                        <a href="">{{ $item->name }}</a>
    
                                    </div>
                                @endforeach
                            </div>
                            </p>
    
                        </td>
    
                        <td style="">
    
                            <span class="badge badge-pill badge-info">
    
                                {{ $lesson->position }}
                            </span>
    
                        </td>
                        <td>{{ $lesson->description }}</td>
    
                        <td style="">
                            <span class="badge badge-pill badge-secondary">
    
                                {{ $lesson->durations }}
                            </span>
                        </td>
    
                        <td style="">
                            <span class="badge badge-pill badge-primary">
    
                                {{ $lesson->views }}
                            </span>
                        </td>
    
                        <td>
    
                            {{-- <a style="margin: 0 4px"
                                href='{{ route('admin.course.lesson.detail', ['lesson' => $lesson]) }}'>
                                <span style="border-radius: 2px" title="Link" type='button'
                                    class="btn btn-flat btn-sm btn-info">
                                    <i class="fas fa-external-link-alt    "></i>
                                </span>
                            </a> --}}
    
                            <a style="margin: 0 4px"
                                href='{{ route('admin.course.lesson.edit', ['lesson' => $lesson]) }}'>
                                <span style="border-radius: 2px" title="Manage" type='button'
                                    class="btn btn-flat btn-sm btn-primary">
                                    <i class="fas fa-edit    "></i>
                                </span>
                            </a>
    
                            <a style="margin: 0 4px; border-radius: 4px"
                                href='{{ route('admin.course.lesson.delete', ['lesson' => $lesson]) }}'>
                                <span style="border-radius: 2px" title="Delete" type='button'
                                    onclick="return confirmDelete() " class="btn btn-flat btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </span></a>
                            </a>
    
    
                        </td>
    
    
    
                    </tr>
                @endforeach
    
            </tbody>
    
        </table>
        <div class="container">
            <div class="row">
    
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị
                        {{ $lessons->firstItem() }} - {{ $lessons->lastItem() }} / {{ $lessons->total() }} bài giảng.
                    </div>
                </div>
                {!! $lessons->links() !!}
            </div>
        </div>
    </div>
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
