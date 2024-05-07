<html>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="">
                        ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending">Tên
                        danh
                        mục
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending">Tạo
                        bởi
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">
                        Public</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Khóa học</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Hành động</th>
        
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class=''>
        
                        <td class="sorting_1 dtr-control" tabindex="0" style="">
                            <span class="badge badge-success">
                                {{ $category->id }}
                            </span>
        
        
                        </td>
                        <td class="">{{ $category->name }}</td>
                        <td>
                            <a style="color: #666666;font-weight: 600;cursor: pointer;"
                                href="{{ route('admin.user.profile', $category->user->id) }}">
                                <p>{{ $category->user->name }}</p>
                            </a>
        
                        </td>
                        <td style="">
        
                            @if ($category->public == 1)
                                <span class="badge badge-success">
                                    ON
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    OFF
                                </span>
                            @endif
        
        
        
                        </td>
                        <td style="">
        
                            @if ($category->status == 1)
                                <span class="badge badge-success">
                                    ON
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    OFF
                                </span>
                            @endif
                        </td>
                        <td style="width: 10%">{{ $category->courses->count() }}</td>
        
                        <td style="width: 15%">
        
                            <a style="margin: 0 4px" href='{{ route('admin.category.view', ['category' => $category]) }}'>
                                <span style="border-radius: 2px" title="Link" type='button'
                                    class="btn btn-flat btn-sm btn-info">
                                    <i class="fas fa-external-link-alt    "></i>
                                </span>
                            </a>
        
                            <a style="margin: 0 4px" href='{{ route('admin.category.edit', ['category' => $category]) }}'>
                                <span style="border-radius: 2px" title="Edit" type='button'
                                    class="btn btn-flat btn-sm btn-primary">
                                    <i class="fas fa-edit    "></i>
                                </span>
                            </a>
        
        
        
                            <a style="margin: 0 4px; border-radius: 4px"
                                href='{{ route('admin.category.delete', ['category' => $category]) }}'>
                                <span style="border-radius: 2px" title="Delete" type='button' onclick="return confirmDelete() "
                                    class="btn btn-flat btn-sm btn-danger">
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển
                        thị
                        {{ $categories->firstItem() }} - {{ $categories->lastItem() }} /
                        {{ $categories->total() }}
                        danh mục.
                    </div>
                </div>
                {!! $categories->links() !!}
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