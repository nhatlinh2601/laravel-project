@php
    use Carbon\Carbon;
@endphp

@extends('layouts.clients.client')
@section('title')
    Chi tiết khóa học
@endsection


@section('content')
    <section id="corses-singel" class="pt-40 pb-120">
        <div class="container container-edit">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30" >
                        <div class="title">
                            <h3>{{ $course->name }}</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name" style="line-height: 40px;">
                                        <div class="thum">
                                            <img src="{{asset('storage/'. $course->teacher_img )}}" alt="Teacher">
                                        </div>
                                        <div class="name ml-3">
                                            <span>Teacher</span>
                                            <h6>{{ $course->teacher_name }}</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category" style="line-height: 40px;">
                                        <span>Category</span>
                                        <h6>{{ $course->cate_name }} </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="review" style="line-height: 40px;">
                                        <span>Review</span> 
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="rating">(20 Reviews)</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- course terms -->

                        <div class="corses-singel-image pt-50">
                            <img src="{{asset('storage/'.  $course->image_path) }}" alt="Courses">
                        </div> <!-- corses singel image -->

                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                                        aria-controls="overview" aria-selected="true"
                                        style="border-top-left-radius: 20px;">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab"
                                        aria-controls="curriculam" aria-selected="false">Chương trình học</a>
                                </li>
                                <li class="nav-item">
                                    <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                        aria-controls="instructor" aria-selected="false">Người hướng dẫn</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                        aria-controls="reviews" aria-selected="false"
                                        style="border-top-right-radius: 20px;">Đánh giá</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>Tóm tắt khoá học</h6>
                                            <p>{{ $course->detail }}</p>
                                        </div>
                                        <div class="singel-description pt-40">
                                            <h6>Bạn sẽ học được gì? </h6>
                                            <p><span> &#10004;</span>Hiểu chi tiết về các khái niệm cơ bản trong
                                                "{{ $course->name }}"</p>
                                            <p><span> &#10004;</span>Tự tin khi phỏng vấn với kiến thức vững chắc</p>
                                            <p><span> &#10004;</span>Xây dựng được website đầu tiên</p>
                                            <p><span> &#10004;</span>Nhận chứng chỉ khóa học do LiViCode cấp</p>
                                            <p><span> &#10004;</span>Xây dựng được website đầu tiên kết hợp với
                                                {{ $course->name }}</p>
                                        </div>
                                    </div> <!-- overview description -->
                                </div>
                                <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                    <div class="curriculam-cont">
                                        <div class="accordion" id="accordionExample">

                                            @foreach ($lessons as $item)
                                                <div class="card">
                                                    <div class="card-header" id="heading-{{ $item->id }}">
                                                        <a href="#" class="collapsed" data-toggle="collapse"
                                                            data-target="#collapse-{{ $item->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse-{{ $item->id }}">
                                                            <ul>
                                                                <li><i class="fa fa-file-o"></i></li>
                                                                <li><span class="lecture">Lecture
                                                                        .</span>{{$item->id}}</li>
                                                                <li><span class="head">{{ $item->name }}</span>
                                                                </li>
                                                                <li><span class="time d-none d-md-block "><i
                                                                            class="fa fa-clock-o" style="color: lightcoral; font-size: 25px;"></i>
                                                                        <span>{{ number_format($item->durations, 2, '.', '') }}</span></span>
                                                                </li>
                                                            </ul>
                                                        </a>
                                                    </div>

                                                    <div id="collapse-{{ $item->id }}" class="collapse"
                                                        aria-labelledby="heading-{{ $item->id }}"
                                                        data-parent="#accordionExample">
                                                        <div style="border: 1px solid #ccc;
                                                        border-radius: 5px;
                                                        padding:  0;"
                                                            class="card-body ">
                                                            <ul class="lectures_lists">
                                                                @foreach ($item->videos as $video)
                                                                    <div class="lectures_lists_title">

                                                                        @if (!Auth::guard('student')->user())
                                                                            <a href="{{ route('login') }}" style="margin: 15px; color: black;">
                                                                                <i style="margin: 0 8px"
                                                                                    class="fa fa-play"
                                                                                    aria-hidden="true"></i style=" color: lightskyblue;">
                                                                                {{ $video->name }}</a>
                                                                        @else
                                                                            @if ($coursesOfStudent->contains('id', $course->id))
                                                                                <a 
                                                                                    href="{{ route('lesson', ['id_video' => $video->id]) }}">
                                                                                    <i style="margin: 0 8px"
                                                                                        class="fa fa-play"
                                                                                        aria-hidden="true"></i>
                                                                                    {{ $video->name }}</a>
                                                                            @else
                                                                                <P style="margin-bottom: 20px;"> <i style="margin: 0 20px; color: lightskyblue;"
                                                                                        class="fa fa-play"
                                                                                        aria-hidden="true"></i>{{ $video->name }}</a>
                                                                                </p>
                                                                            @endif
                                                                        @endif


                                                                    </div>
                                                                @endforeach
                                                            </ul>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div> <!-- curriculam cont -->
                                </div>
                                <div class="tab-pane fade" id="instructor" role="tabpanel"
                                    aria-labelledby="instructor-tab">
                                    <div class="instructor-cont">
                                        <div class="instructor-author">
                                            <div class="author-thum">
                                                <img src="{{asset('storage/'. $course->teacher_img )}}" alt="Instructor">
                                            </div>
                                            <div class="author-name">
                                                <a href="#">
                                                    <h5>{{ $course->teacher_name }}</h5>
                                                </a>
                                                <span>Senior WordPress Developer</span>
                                                <ul class="social">
                                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="instructor-description pt-25">
                                            <?php $sentences = explode('<br><br>', $course->teacher_des); ?>
                                            @foreach ($sentences as $sentence)
                                                <p class="mb-3"><span class="tick">&#10004;</span>
                                                    {{ $sentence }}</p>
                                            @endforeach
                                        </div>
                                    </div> <!-- instructor cont -->
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-cont">
                                        <div class="title">
                                            <h6>Đánh giá</h6>
                                        </div>
                                        <ul>

                                            @foreach ($reviews as $review)
                                                <li>
                                                    <div class="singel-reviews">
                                                        <div class="reviews-author">
                                                            <div class="author-thum">
                                                                <img src="{{asset('storage/'. $review->user_img) }}" alt="Reviews">
                                                            </div>
                                                            <div class="author-name">
                                                                <h6>{{ $review->user_name }}</h6>
                                                                <span>{{ Carbon::parse($review->created_at)->format('F d, Y') }}</span>

                                                            </div>
                                                        </div>
                                                        <div class="reviews-description pt-20">
                                                            <p>{{ $review->comment }}</p>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <span>/ 5 Star</span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- singel reviews -->
                                                </li>
                                            @endforeach

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <nav class="courses-pagination mt-50">
                                                        <ul class="pagination justify-content-center">
                                                            <li class="page-item">
                                                                <a href="{{ $reviews->previousPageUrl() }}"
                                                                    aria-label="Previous">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a
                                                                    class="{{ $reviews->currentPage() == 1 ? 'active' : '' }}"
                                                                    href="{{ $reviews->url(1) }}">1</a></li>

                                                            @for ($i = 2; $i <= $reviews->lastPage(); $i++)
                                                                <li class="page-item">
                                                                    <a href="{{ $reviews->url($i) }}"
                                                                        class="{{ $reviews->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item">
                                                                <a href="{{ $reviews->nextPageUrl() }}"
                                                                    aria-label="Next">
                                                                    <i class="fa fa-angle-right"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav> <!-- courses pagination -->
                                                </div>
                                            </div> <!-- row -->
                                        </ul>
                                        <div class="title pt-15">
                                            <h6>Hãy để lại comment</h6>
                                        </div>
                                        <div class="reviews-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Frist name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <div class="rate-wrapper">
                                                                <div class="rate-label">Your Rating:</div>
                                                                <div class="rate">
                                                                    <div class="rate-item"><i class="fa fa-star"
                                                                            aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star"
                                                                            aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star"
                                                                            aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star"
                                                                            aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star"
                                                                            aria-hidden="true"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <textarea placeholder="Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <button type="button" class="main-btn">Post Comment</button>
                                                        </div>
                                                    </div>
                                                </div> <!-- row -->
                                            </form>
                                        </div>
                                    </div> <!-- reviews cont -->
                                </div>
                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                                <h4>Course Features </h4>
                                <ul class="mb-3">
                                    <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li>
                                    <li><i class="fa fa-clone"></i>Leactures : <span>09</span></li>
                                    <li><i class="fa fa-beer"></i>Quizzes : <span>05</span></li>
                                    <li><i class="fa fa-user-o"></i>Students : <span>100</span></li>
                                </ul>
                                <div class="price-button pt-10 pb-3 d-flex justify-content-center align-items-center">
                                    <span>Price : <b><del>
                                                {{ number_format($course->price, 0, '', '.') }} đ </del>
                                            {{ number_format($course->sale_price, 0, '', '.') }} đ
                                        </b></span>

                                </div>
                                <div class="d-flex justify-content-center">

                                    @if ($coursesOfStudent->contains('id', $course->id))
                                        <a href="{{ route('lesson', $firstLesson->id) }}" class="main-btn pr-4">Vào học
                                            ngay</a>
                                    @else
                                        <a href="{{ route('addToCart', $course->id) }}"
                                            class="main-btn p-2">Thêm vào giỏ hàng</a>
                                        <a href="{{ route('payment', $course->id) }}" class="main-btn pr-4">Mua khóa
                                            học</a>
                                    @endif


                                </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>Có thể bạn thích </h4>

                                @foreach ($courseLatest as $course)
                                    <div class="singel-makelike mt-20">
                                        <div class="image">
                                            <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                                <img src="{{asset('storage/'. $course->image_path) }}" alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-5 mt-3">
                                        <div class="cont">
                                            <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                                <h4 class="youMakeLike-course-name">{{ $course->name }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="releted-courses pt-95">
                        <div class="title">
                            <h3 style="color: #4D2DB7;">Khóa học liên quan </h3>
                        </div>
                        <div class="row">

                            @foreach ($coursesCate as $course)
                                <div class="col-md-6">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="{{asset('storage/'. $course->image_path )}}" alt="Course">
                                            </div>
                                            <div class="price">
                                                @if ($course->sale_price == 0)
                                                    <span>Free</span>
                                                @else
                                                    <span><del>{{ number_format($course->price, 0, '', '.') }} đ</del>
                                                        {{ number_format($course->sale_price, 0, '', '.') }} đ</span>
                                                @endif
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
                                                <h4>{{ $course->name }}</h4>
                                            </a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="{{asset('storage/'.$course->teacher_img )}}"
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
                        </div> <!-- row -->
                    </div> <!-- releted courses -->
                </div>
            </div> <!-- row -->
        </div> <!-- container container-edit -->
    </section>
@endsection
