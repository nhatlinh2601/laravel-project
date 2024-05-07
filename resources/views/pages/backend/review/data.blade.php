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
                        colspan="1" aria-label="Browser: activate to sort column ascending">Đánh giá</th>
    
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Người đăng</th>
                   
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Sao</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Date</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="">Status</th>
    
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending" style="">Hành động</th>
    
    
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr class=''>
    
    
                        <td class="sorting_1 dtr-control" tabindex="0" style="">
                            <span class="badge badge-success">
    
                                {{ $review->id }}
                            </span>
                        </td>
                        <td class="">{{ $review->comment }}</td>
    
                        <td style="">
                            <a href="">
                                <p>{{ $review->student->name }}</p>
                            </a>
                        </td>
                        
    
                        <td style="">
                            {{ $review->stars }}
    
                        </td>
                        <td style="">
                            {{ $review->created_at }}
    
                        </td>
                        <td>
                            <span class="badge badge-success">ON</span>
                        </td>
    
                        <td style="width: 15%">
    
                            <a style="margin: 0 4px" href='{{ route('admin.review.detail', ['review' => $review]) }}'>
                                <span style="border-radius: 2px" title="Link" type='button'
                                    class="btn btn-flat btn-sm btn-info">
                                    <i class="fas fa-external-link-alt    "></i>
                                </span>
                            </a>
    
    
    
                            <a style="margin: 0 4px; border-radius: 4px"
                                href='{{ route('admin.review.delete', ['review' => $review]) }}'>
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
                        {{ $reviews->firstItem() }} - {{ $reviews->lastItem() }} / {{ $reviews->total() }} đánh giá.
                    </div>
                </div>
                {!! $reviews->links() !!}
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
