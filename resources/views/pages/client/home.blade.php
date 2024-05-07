@extends('layouts.clients.client')
@section('title')
    LiViCode - Học lập trình trực tuyến
@endsection
@section('content')

    <body>

        <section id="slider-part" class="slider-active">
            <div class="single-slider bg_cover pt-150" style="background-image: url(client/images/slider/s-1.jpg)"
                data-overlay="4">
                <div class="container container-edit">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="slider-cont">
                                <h1 data-animation="bounceInLeft" data-delay="1s">LiViCode - Học lập trình trực tuyến</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">Mới ghé thăm LiViCode? Bạn thật may mắn!
                                    Các khóa học có giá từ ₫ 279.000. Nhận ưu đãi học viên mới trước khi ưu đãi hết hạn.</p>
                                <ul>
                                    <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Học
                                            thử</a></li>
                                    <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2"
                                            href="#">Đăng ký</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container container-edit -->
            </div> <!-- single slider -->

            <div class="single-slider bg_cover pt-150" style="background-image: url(client/images/slider/s-2.jpg)"
                data-overlay="4">
                <div class="container container-edit">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            <div class="slider-cont">
                                <h1 data-animation="bounceInLeft" data-delay="1s">LiViCode - Học lập trình trực tuyến</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">Tuyển tập khóa học rộng lớn -
                                    Lựa chọn trong số hơn 210000 khóa học video online với nhiều nội dung bổ sung mới được
                                    xuất bản hàng tháng</p>
                                <ul>
                                    <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Học
                                            thử</a></li>
                                    <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2"
                                            href="#">Đăng ký</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container container-edit -->
            </div> <!-- single slider -->
        </section>

        <!--====== SLIDER PART ENDS ======-->

        @if (!Auth::guard('student')->user())
        @else
            @if ($coursesOfStudent)
                <section id="course-part" class="pt-60 pb-20">
                    <div class="container container-edit">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="section-title pb-10">
                                    <h3>Khóa học của bạn</h3>
                                    <a href="">Xem tất cả</a>

                                </div> <!-- section title -->
                            </div>
                        </div> <!-- row -->
                        <div class="row mt-30">
                            @foreach ($coursesOfStudent as $course)
                                <div class="col-lg-3 col-md-6">
                                    <div class="singel-course">

                                        <div class="thum">
                                            <div class="image mr-4">
                                                <img src="{{asset('storage/'. $course->image_path )}}" alt="Course">

                                            </div>
                                            <div class="price">
                                                <span>Free</span>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviews)</span>
                                            <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                                <h4 class="course-content col-9"> {{ $course->name }}</h4>
                                            </a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="{{asset('storage/'. $course->teacher_img) }}"
                                                            alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">
                                                        <h6>{{ $course->teacher_name }}</h6>
                                                    </a>
                                                    <div class="admin">
                                                        <ul>
                                                            <li><a href="#"><i
                                                                        class="fa fa-user"></i><span>31</span></a></li>
                                                            <li><a href="#"><i
                                                                        class="fa fa-heart"></i><span>10</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- singel course -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
            @endif
        @endif




        <!--====== COURSE PART START ======-->

        <section id="course-part" class="pt-60 pb-20">
            <div class="container container-edit">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="section-title pb-10">
                            <h3>Khóa học miễn phí</h3>
                            <a href="">Xem tất cả</a>

                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row mt-30">
                    @foreach ($coursesFree as $course)
                        <div class="col-lg-3 col-md-6">
                            <div class="singel-course">

                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('storage/'.$course->image_path )}}" alt="Course">

                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviews)</span>
                                    <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                        <h4 class="course-content col-9"> {{ $course->name }}</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{asset('storage/'. $course->teacher_img) }}" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>{{ $course->teacher_name }}</h6>
                                            </a>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <section id="course-part" class="pt-60 pb-20">
            <div class="container container-edit">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title pb-10">
                            <h3>Khóa học Pro</h3>
                            <a href="">Xem tất cả</a>

                        </div> <!-- section title -->
                    </div>
                </div>
                <!-- row -->

                <div class="row mt-30">
                    @foreach ($coursePaid as $course)
                        <div class="col-lg-3 col-md-6">
                            <div class="singel-course">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('storage/'.$course->image_path )}}" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span><del>{{ number_format($course->price, 0, '', '.') }} đ </del>
                                            {{ number_format($course->sale_price, 0, '', '.') }} đ</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviews)</span>
                                    <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                        <h4 class="course-content col">{{ $course->name }}</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{asset('storage/'. $course->teacher_img )}}" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>{{ $course->teacher_name }}</h6>
                                            </a>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    @endforeach
                </div> <!-- course slied -->
            </div> <!-- container container-edit -->
        </section>


        <!--====== COURSE PART ENDS ======-->


        <!--====== TEACHERS PART START ======-->

        <section id="teachers-part" class="pt-70 pb-100">
            <div class="container container-edit">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mt-50 pb-10">
                            <h3>Giảng viên</h3>
                        </div> <!-- section title -->
                        <div class="teachers-cont">
                            <p>LiviCode có đội giảng viên chất lượng, kiến thức sâu rộng và kinh nghiệm thực tế trong công
                                nghệ, cung cấp sự hỗ trợ và động viên mạnh mẽ cho học viên trong hành trình khám phá lập
                                trình. <br> <br> Chúng
                                tôi tự hào có đội ngũ giảng viên xuất sắc, luôn cống hiến hết mình để hỗ trợ sự phát triển
                                của cộng đồng học viên thế giới lập trình.</p>
                            <br>
                            <br>
                            <h4>Bạn muốn trở thành giảng viên tại LiViCode?</h4>
                            <a style="margin-top: 60px; font-size: 15px;" href="#"
                                class="main-btn mt-55 pt-2 pb-2">Bắt đầu dạy học ngay hôm
                                nay</a>
                        </div> <!-- teachers cont -->
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="teachers mt-20">
                            <div class="row">
                                @foreach ($teachers as $teacher)
                                    <div class="col-sm-6 ">
                                        <div class="singel-teachers mt-30 text-center">
                                            <div class="image  card-teacher">
                                                <img src="{{asset('storage/'. $teacher->image_path )}}" alt="Teachers">
                                            </div>
                                            <div class="cont">
                                                <a href="{{ route('teachers.teacherDetail', ['id' => $teacher->id]) }}">
                                                    <h6>{{ $teacher->name }}</h6>
                                                </a>
                                                <span>Vice chencelor</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> <!-- row -->
                        </div> <!-- teachers -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container container-edit -->
        </section>

        <!--====== TEACHERS PART ENDS ======-->




        <!--====== NEWS PART START ======-->

        <section id="course-part" class="pt-60 pb-20">
            <div class="container container-edit">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="section-title pb-10">
                            <h3>Bài viết nổi bật </h3>
                            <a href="">Xem tất cả</a>

                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row mt-30">
                    @foreach ($posts as $post)
                        <div class="col-lg-3 col-md-6">
                            <div class="singel-course">

                                <div class="thum">
                                    <div class="image">
                                        <img src="{{asset('storage/'. $post->image_path )}}" alt="Course">

                                    </div>
                                </div>
                                <div class="cont">
                                    <span>(20 Reviews)</span>
                                    <a href="{{ route('posts.postDetail', ['id' => $post->id]) }}">
                                        <h4 class="course-content col-9"> {{ $post->title }}</h4>
                                    </a>
                                    <div class="course-teacher" style="padding: 5px;">
                                        <div class="name">
                                            <div class="admin mt-1">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>







    </body>
@endsection
