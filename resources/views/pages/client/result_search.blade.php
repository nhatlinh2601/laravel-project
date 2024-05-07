@extends('layouts.clients.client')
@section('title')
    Search Result
@endsection

@section('content')

<section id="course-part" class="pt-120 pb-20">
        <div class="container container-edit">
            <div class="row mb-4" >
                <div class="col-lg-12">
                    <div class="section-title pb-10">
                        <h3>Khóa học</h3> 
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
                <div class="row mt-30">
                    @foreach ($courses as $course)
                        <div class="col-lg-3 col-md-6">
                            <div class="singel-course">

                                <div class="thum">
                                    <div class="image">
                                        <img src="/{{ ($course->image_path) }}" alt="Course">
                                      
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
                                        <h4 class="course-content col-10"> {{ $course->name }}</h4>
                                    </a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{ $course->teacher_img}}"
                                                    alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#">
                                                <h6>{{$course->teacher_name}}</h6>
                                            </a>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
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
            <div class="row mb-4" >
                <div class="col-lg-12">
                    <div class="section-title pb-10">
                        <h3>Bài viết</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
                <div class="row mt-30">
                    @foreach ($posts as $post)
                        <div class="col-lg-3 col-md-6">
                            <div class="singel-course">
                                <div class="thum">
                                    <div class="image">
                                        <img src="/{{ ($post->image_path) }}" alt="Course">
                                      
                                    </div>
                                </div>
                                <div class="cont">
                                    <span>(20 Reviews)</span>
                                    <a href="{{ route('posts.postDetail', ['id' => $post->id]) }}">
                                        <h4 class="course-content col-9"> {{ $post->title }}</h4>
                                    </a>
                                    <div class="course-teacher" style="padding: 5px;">
                                        <div class="name" >
                                            <div class="admin mt-1">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
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










@endsection