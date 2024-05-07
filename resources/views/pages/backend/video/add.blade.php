@extends('layouts.backend.backend')

@section('page_title')
    Thêm videos
@endsection



@section('content')
    <div class="form-wrapper">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <form action="{{ route('admin.course.lesson.video.post-add', $lesson) }}" method="POST">
            @csrf
            <div class="form-row form-add">
                <h4 style="text-align: center;margin-bottom: 20px">Thêm video để hoàn thành cập nhật bài giảng</h4>
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
                                            @foreach ($videos as $video)
                                                <tr class=''>

                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">

                                                        <span class="badge badge-success">

                                                            {{ $video->id }}
                                                        </span>
                                                    </td>
                                                    <td class="">{{ $video->name }}</td>
                                                    <td class="">{{ $video->url }}</td>
                                                    <td class="">{{ $video->url }}</td>

                                                   
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="container">
                                    <div class="row">
                            
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị
                                                {{ $videos->firstItem() }} - {{ $videos->lastItem() }} / {{ $videos->total() }} videos.
                                            </div>
                                        </div>
                                        {!! $videos->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card collapsed-card">



                                <div class="form-group col-12 ">
                                    <label for="">Tiêu đề video</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        <input  name="title" class="form-control"
                                            value={{ old('title') }}>
                                    </div>
                                    @error('title')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-12 ">
                                    <label for="">Đường dẫn URL</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        <input  name="url_video" class="form-control"
                                            value={{ old('url_video') }}>
                                    </div>
                                    @error('url_video')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-">
                                    <div class="form-group col-6 ">
                                        <button type="submit"
                                            style="display: inline-block;
                                            position: relative;
                                            left: 50%;
                                            transform: translateX(-50%);"
                                            type="button" class="btn btn-flat btn-success" title="Add new"><i
                                                class="fa fa-plus"></i>
                                            Thêm mới video</button>
                                    </div>
                                    <div class="form-group col-6 ">
                                        <a href="{{ route('admin.course.lesson.list', $lesson->course) }}">
                                            <button
                                                style="display: inline-block;
                                                position: relative;
                                                left: 50%;
                                                transform: translateX(-50%);"
                                                type="button" class="btn btn-flat btn-info" title="Skip"> <i class="fa fa-check" aria-hidden="true"></i>
                                                Hoàn thành</button>
                                        </a>
                                    </div>
                                </div>




                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </form>



    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script></script>
