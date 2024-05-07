<html>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
        <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending"
                    style="">
                    ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Họ tên
                </th>
                <th style="width: 10%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1" aria-label="Browser: activate to sort column ascending">Hình ảnh</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Nhóm</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Vai trò</th>

                <th style="width: 15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Email
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending" style="">Status</th>


                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending" style="">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <div>

                @foreach ($users as $user)
                    <tr class=''>

                        <td class="sorting_1 dtr-control" tabindex="0" style="">
                            <span class="badge badge-success">

                                {{ $user->id }}
                            </span>
                        </td>
                        <td class="">{{ $user->name }}</td>
                        <td class="">
                            <img style="width: 100%" src="{{ asset('storage/' . $user->image_path) }}" alt="">
                        </td>

                        <td>{{ $user->group->name }}</td>
                        <td style="">
                            @foreach ($user->getRoleNames() as $item)
                                <span class="badge badge-success">{{ $item }}</span>
                            @endforeach

                        </td>


                        <td>{{ $user->email }}</td>

                        <td style=""></td>

                        <td>
                            @if ($user->trashed())
                                <a href=>


                                    <a style="margin: 0 4px" href='{{ route('admin.user.restore', $user->id) }}'>
                                        <span style="border-radius: 2px" title="Restore" type='button'
                                            class="btn btn-flat btn-sm btn-success">
                                            <i class="fa fa-window-restore" aria-hidden="true"></i>
                                        </span>
                                    </a>

                                    <a style="margin: 0 4px" href='{{ route('admin.user.force-delete', $user->id) }}'>
                                        <span style="border-radius: 2px" title="Force Delete" type='button'
                                            class="btn btn-flat btn-sm btn-warning">
                                            <i class="fas fa-trash-alt    "></i>
                                        </span>
                                    </a>

                                </a>
                            @else
                                <a style="margin: 0 4px" href='{{ route('admin.user.profile', ['user' => $user]) }}'>
                                    <span style="border-radius: 2px" title="Link" type='button'
                                        class="btn btn-flat btn-sm btn-info">
                                        <i class="fas fa-external-link-alt    "></i>
                                    </span>
                                </a>

                                <a style="margin: 0 4px" href='{{ route('admin.user.edit', ['user' => $user]) }}'>
                                    <span style="border-radius: 2px" title="Edit" type='button'
                                        class="btn btn-flat btn-sm btn-primary">
                                        <i class="fas fa-edit    "></i>
                                    </span>
                                </a>

                                @if (Auth::user())
                                    @if ($user->id != Auth::user()->id)
                                        <a style="margin: 0 4px; border-radius: 4px"
                                            href='{{ route('admin.user.delete', ['user' => $user]) }}'>
                                            <span style="border-radius: 2px" title="Delete" type='button'
                                                onclick="return confirmDelete() "
                                                class="btn btn-flat btn-sm btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span></a>
                                        </a>
                                    @endif
                                @endif
                            @endif
                        </td>



                    </tr>
                @endforeach
            </div>

        </tbody>

    </table>

    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị
                    {{ $users->firstItem() }} - {{ $users->lastItem() }} / {{ $users->total() }} người dùng.
                </div>
            </div>
            {!! $users->links() !!}
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
