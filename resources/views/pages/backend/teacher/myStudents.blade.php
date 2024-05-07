@extends('layouts.backend.backend')
@section('page_title')
    Danh sách học viên
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="card">
        @if (session('success'))
            <div style="margin: 0 20px" class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="margin: 0 20px" class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center card-header">
            <h3 class="card-title">Danh sách học viên</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <div id="user_table">
                            <html>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                aria-sort="ascending" style="">
                                                STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">Học viên
                                            </th>
                                            <th style="width: 15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">Hình ảnh</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">Khóa học
                                            </th>
                                            <th style="width: 15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">Hình ảnh</th>

                                            <th  class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending" style="">
                                               Date
                                            </th>
                                          


                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div>

                                            @foreach ($result as $user)
                                                <tr class=''>

                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">
                                                        <span class="badge badge-success">
                                                            {{ $loop->iteration }}
                                                        </span>
                                                    </td>
                                                    <td class="">{{ $user->student }}</td>
                                                    <td class="">
                                                        <img style="width: 100%"
                                                            src="{{ asset('storage/' . $user->image_student) }}"
                                                            alt="">
                                                    </td>

                                                    <td>{{ $user->course }}</td>




                                                    <td class="">
                                                        <img style="width: 100%"
                                                            src="{{ asset('storage/' . $user->image_course) }}"
                                                            alt="">
                                                    </td>
                                                    <td> {{$user->time}}</td>


                                                    



                                                </tr>
                                            @endforeach
                                        </div>

                                    </tbody>

                                </table>


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

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
<!-- Bạn có thể sử dụng CDN -->
<script src="https:code.jquery.com/jquery-3.6.4.min.js"></script>
