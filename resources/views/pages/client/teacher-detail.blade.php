@extends('layouts.clients.client')
@section('title')
    Chi tiết giáo viên
@endsection

@section('content')
    <section id="teachers-singel" class="pt-40 pb-120 gray-bg">
        <div class="container container-edit">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="/{{ $teacher->image_path }}" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6 class="pb-1">{{$teacher->name}}</h6>
                            <span>Phần mềm máy tính</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>Là một kỹ sư phần mềm với kiến thức và kỹ năng chuyên sâu, có khả năng truyền đạt thông tin một cách rõ ràng và hỗ trợ sinh viên hiểu rõ về các vấn đề phức tạp của công nghệ.</p>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8 pt-2">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                    aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses"
                                    aria-selected="false">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="singel-dashboard pt-40">
                                        <h5>Giới thiệu tổng quan</h5>
                                        <p>
                                            Chào các bạn! Mình tên là {{$teacher->name}}  và là một lập trình viên full-stack với đam mê mãnh liệt đối với việc lập trình, 
                                            mình đã cống hiến cho sự nghiệp của bản thân bằng cách nắm vững các công nghệ và khung làm việc khác nhau để xây dựng các ứng dụng mạnh mẽ 
                                            và có thể mở rộng.
                                        </p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Thành tựu đạt được</h5>
                                        <div class="instructor-description pt-25">
                                            <?php $sentences = explode('<br><br>', $teacher->description); ?>
                                            @foreach($sentences as $sentence)
                                            <p class="mb-3"><span class="tick">&#10004;</span> {{ $sentence }}</p>
                                            @endforeach
                                        </div>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Mục tiêu trong tương lai </h5>
                                        <p><span class="tick">&#10004;</span>Liên tục cập nhật kiến thức và kỹ năng chuyên môn.</p>
                                        <p><span class="tick">&#10004;</span>Phát triển kỹ năng mềm và tư duy sáng tạo cho học viên.</p>
                                        <p><span class="tick">&#10004;</span>Tạo môi trường học tập động lực và sáng tạo.</p>
                                        <p><span class="tick">&#10004;</span>Phát triển kỹ năng mềm và tư duy sáng tạo cho học viên.</p>
                                    </div> <!-- singel dashboard -->
                                </div> <!-- dashboard cont -->
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="courses-cont pt-20">
                                    <div class="row">
                                        @foreach($coursesByTeacher as $course)
                                        <div class="col-md-6">
                                            <div class="singel-course mt-30">
                                                <div class="thum">
                                                    <div class="image">
                                                        <img src="/{{ $course->image_path }}"
                                                            alt="Course">
                                                    </div>
                                                    <div class="price">
                                                        @if($course->sale_price == 0)
                                                            <span>Free</span>
                                                        @else
                                                            <span><del>{{ number_format($course->price, 0, '', '.') }} đ</del> {{ number_format($course->sale_price, 0, '', '.') }} đ</span>
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
                                                    <span>(20 Reviws)</span>
                                                    <a href="#">
                                                        <h4>{{$course->name}}</h4>
                                                    </a>
                                                    <div class="course-teacher">
                                                        <div class="thum">
                                                            <a href="#"><img
                                                                    src="/{{ $course->teacher_img }}"
                                                                    alt="teacher"></a>
                                                        </div>
                                                        <div class="name">
                                                            <a href="#">
                                                                <h6>{{$course->teacher_name}}</h6>
                                                            </a>
                                                            <div class="admin">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fa fa-user"></i><span>31</span></a>
                                                                    </li>
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
                                </div> <!-- courses cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{ asset('client/images/review/r-1.jpg') }}"
                                                            alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Bobby Aktar</h6>
                                                        <span>April 03, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
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
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{ asset('client/images/review/r-2.jpg') }}"
                                                            alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Humayun Ahmed</h6>
                                                        <span>April 13, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
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
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="{{ asset('client/images/review/r-3.jpg') }}"
                                                            alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Tania Aktar</h6>
                                                        <span>April 20, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
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
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Leave A Comment</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Fast name">
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
                    </div> <!-- teachers right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
@endsection
