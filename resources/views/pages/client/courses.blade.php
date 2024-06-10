@extends('layouts.clients.client')
@section('title')
    Khóa học online
@endsection





@section('content')
    <section id="courses-part" class="pt-70 pb-60 pl-2 ">
        <div class="row">
            <div class="category col-lg-3 pt-2 mt-4 pl-3 " style="padding-right: 100px;">
                <div class="corses-singel-left mt-30 p-0">
                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active show" id="curriculam-tab" data-toggle="tab" href="#curriculam"
                                    role="tab" aria-controls="curriculam" aria-selected="false"
                                    style="border-top-right-radius: 20px; border-top-left-radius: 20px;"><i
                                        class="bi bi-funnel mr-2"></i>Bộ lọc tìm kiếm</a>
                            </li>
                        </ul>

                        <div class="tab-content content-edit1" id="myTabContent">
                            <div class="tab-pane fade  show active" id="curriculam" role="tabpanel"
                                aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont" style="padding-left: 40px ;">
                                    <form action="{{ url('/courses/') }}" method="GET">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="heading-2">
                                                    <a class="card-edit card-edit2" href="" data-toggle="collapse"
                                                        data-target="#collapse-2" aria-expanded="true"
                                                        aria-controls="collapse-2">
                                                        <ul>
                                                            <li>
                                                                <h5 style="color: black; padding-bottom: 20px;">Theo danh
                                                                    mục</h5>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapse-2" class="collapse show" aria-labelledby="heading-2"
                                                    data-parent="#accordionExample">
                                                    @foreach ($category as $cate)
                                                        <div class="card-body">
                                                            <p>
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $cate->id }}" id="flexCheckDefault"
                                                                    name="category[]">
                                                                <a class="cate-name-edit"
                                                                    href="">{{ $cate->name }}</a>
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>


                                            <div class="card mt-4">
                                                <h5>Khoảng giá</h5>
                                                <div class="mt-4 "
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <div>
                                                        <input class="input-price" type="number" id="min"
                                                            name="min" placeholder="đ Từ" style="width: 100%;">
                                                        <div class="mt-3">
                                                            <input class="input-price" type="number" id="max"
                                                                name="max" placeholder="đ Đến">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn-edit" id="searchButton">Áp dụng</button>
                                            </div>
                                    </form>


                                </div>
                            </div> <!-- curriculam cont -->
                        </div>
                    </div> <!-- tab content -->
                </div>
            </div> <!-- corses singel left -->
        </div>





        <div class="container col-lg-9 container-edit">
            <div class="row ">
                <div class="col-lg-12 pt-5 ">
                    <div class="courses-top-search d-flex justify-content-between align-items-center">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid"
                                    role="tab" aria-controls="courses-grid" aria-selected="true"><i
                                        class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab"
                                    aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <div class="d-flex justify-content-between align-items-center">
                                <li class="nav-item">Hiển thị {{ $count }} kết quả </li>
                            </div>
                        </ul> <!-- nav -->
                    </div> <!-- courses top search -->
                </div>
            </div>
            <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="courses-grid" role="tabpanel"
                    aria-labelledby="courses-grid-tab">
                    <div class="row">

                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-5">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}"
                                                style="width: 100%; height: 100%;"> <img
                                                    src="{{ asset('storage/' . $course->image_path) }}" alt="Course"></a>
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
                                                <a href="{{ route('courses.courseDetail', ['id' => $course->id]) }}">
                                                    <img src="{{ asset('storage/' . $course->teacher_img) }}"
                                                        alt="teacher">
                                                </a>
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
                </div>
                <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                    <div class="row">

                        @foreach ($courses as $course)
                            <div class="col-lg-12">
                                <div class="singel-course mt-30" style="width: 100%;">
                                    <div class="row" style="display: flex;">
                                        <div class=" mx-5">

                                            <div class="image" style="width: 300px;">
                                                <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course"
                                                    style="height: 195px; border-radius: 30px;">
                                            </div>

                                        </div>
                                        <div class="">
                                            <div class="cont p-0">
                                                <a href="#">
                                                    <h4 class="pt-0 pb-3">{{ $course->name }} </h4>
                                                </a> <br>
                                                <ul class="mb-3">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span>(20 Reviews)</span>
                                                <div class="price">
                                                    @if ($course->sale_price == 0)
                                                        <span>Free</span>
                                                    @else
                                                        <span><del>{{ number_format($course->price, 0, '', '.') }} đ</del>
                                                            {{ number_format($course->sale_price, 0, '', '.') }} đ</span>
                                                    @endif
                                                </div>
                                                <div class="course-teacher">
                                                    <div class="thum">
                                                        <a href="#"><img
                                                                src="{{ asset('storage/' . $course->teacher_img) }}"
                                                                alt="teacher"></a>
                                                    </div>
                                                    <div class="name pr-3 pt-2">
                                                        <a href="#">
                                                            <h6>{{ $course->teacher_name }}</h6>
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
                                </div> <!-- singel course -->
                            </div>
                        @endforeach
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="{{ $courses->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="{{ $courses->currentPage() == 1 ? 'active' : '' }}"
                                    href="{{ $courses->url(1) }}">1</a></li>

                            @for ($i = 2; $i <= $courses->lastPage(); $i++)
                                <li class="page-item">
                                    <a href="{{ $courses->url($i) }}"
                                        class="{{ $courses->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a href="{{ $courses->nextPageUrl() }}" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> <!-- courses pagination -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

        </div>

    </section>
@endsection
