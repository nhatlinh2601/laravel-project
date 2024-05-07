@extends('layouts.backend.backend')
@section('page_title')
    Thông tin người dùng
@endsection

<head>
    <link rel="stylesheet" href="'plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="'dist/css/adminlte.min.css')}}">
</head>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div style="margin-top: 12px; margin-left: 6px" class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $user->image_path) }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nhóm</b> <a class="float-right">{{ $user->group->name }}</a>
                            </li>

                        </ul>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div style="margin-top: 12px" class="col-md-9">
                <div class="card">

                    <ul style="padding: 8px" class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bài viết</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Khóa học</a></li>

                    </ul>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->

                                @foreach ($posts as $item)
                                    <div style="margin: 10px 0;" class="singel-blog mt-80 row">
                                        <div class="blog-cont col-md-9">
                                            <a href="http://127.0.0.1:8000/posts/posts-detail/2">
                                                <h3>{{ $item->title }}</h3>
                                            </a>
                                            <ul>
                                                <li><a href="#"><i
                                                            class="fa fa-calendar"></i>{{ $item->created_at }}</a></li>
                                                <li><a href="#"><i class="fa fa-user"></i>{{ $user->name }}</a></li>

                                            </ul>
                                            <p
                                                style="display: -webkit-box;
                                          -webkit-box-orient: vertical;
                                          overflow: hidden;
                                          -webkit-line-clamp: 2;margin-bottom: 30px;">
                                                {{ $item->content }}</p>
                                            <span
                                                style="padding: 10px 20px;
                                            background-color: rgb(237, 237, 237);
                                            border-radius: 30px;"
                                                class="categories-post-tag mt-3">{{ $item->category->name }}</span>

                                                @if ($item->user_id==Auth::user()->id)
                                                    <div style="margin-top: 30px" class="d-flex align-items-center">
                                                        <a style="margin: 0 4px" href='{{ route('admin.post.edit', $item) }}'>
                                                            <span style="border-radius: 2px" title="Edit" type='button'
                                                                class="btn btn-flat btn-sm btn-primary">
                                                                <i class="fas fa-edit    "></i>
                                                            </span>
                                                        </a>
                        
                                                        <a style="margin: 0 4px; border-radius: 4px"
                                                            href='{{ route('admin.post.delete', $item) }}'>
                                                            <span style="border-radius: 2px" title="Delete" type='button'
                                                                onclick="return confirmDelete() " class="btn btn-flat btn-sm btn-danger">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </span></a>
                                                        </a>
                                                    </div>
                                                @endif
                                        </div>
                                        <div class="blog-thum col-md-3 d-flex align-items-center justify-content-center">
                                            <img src="/client/images/news/ns-2.jpg" alt="Blog">
                                        </div>
                                    </div>
                                @endforeach



                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">

                                @foreach ($courses as $item)
                                    <div class="singel-course mt-30">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <div class="thum">
                                                    <div class="image">
                                                        <img src="/client/images/course/cu-2.jpg" alt="Course">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="cont p-0">
                                                    <a href="#">
                                                        <h4 class="pt-0 pb-3">{{ $item->name }}</h4>
                                                    </a> <br>
                                                    <ul class="mb-3">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <span>(20 Reviews)</span>
                                                    <div class="price"> <span><del>{{ $item->price }} đ</del>
                                                            {{ $item->sale_price }} đ</span></div>
                                                    <div class="course-teacher">
                                                        <div class="thum">
                                                            <a href="#"><img src="/" alt="teacher"></a>
                                                        </div>
                                                        <div class="name pr-3 pt-2">
                                                            <a href="#">
                                                                <h6>{{ $item->teacher->name }}</h6>
                                                            </a>
                                                        </div>
                                                        <div class="admin">
                                                            <ul>
                                                                <li><a href="#"><i
                                                                            class="fa fa-user"></i><span>31</span></a></li>
                                                                <li><a href="#"><i
                                                                            class="fa fa-heart"></i><span>10</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--  row  -->
                                    </div>
                                @endforeach


                            </div>
                            <!-- /.tab-pane -->


                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
@endsection
