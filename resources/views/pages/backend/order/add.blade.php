@extends('layouts.backend.backend')

@section('page_title')
    Tạo đơn hàng mới
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div style="overflow: auto;background: white;" class="add_order">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin.order.post-add') }}" method="POST">


            @csrf
            <h4 style="text-align: center;margin-bottom: 20px"> Tạo đơn hàng mới</h4>
            <div class="form-row form-add ">

                <div class=" form-group col-12 ">
                    <label for="">Học viên</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>

                        <select id="student" class="form-select form-control" name="student"
                            aria-label="Default select example">
                            <option value=0 {{ old('student') == 0 ? 'selected' : '' }}>Vui lòng chọn học viên</option>
                            @if ($students)
                                @foreach ($students as $item)
                                    <option value={{ $item->id }} {{ old('student') == $item->id ? 'selected' : '' }}>
                                        {{ $item->email }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('student')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>

                <div style="margin-top: 30px" class="form-group col-12 mt-30">
                    <div class="row ">

                        @foreach ($courses as $course)
                            <div class="col-12 col-xl-6">
                                <div class="row">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <div class=""> <input name="courses[]" id="{{ $course->id }}"
                                                value="{{ $course->id }}" style="width: 20px;height: 20px;"
                                                type="checkbox"></div>

                                    </div>
                                    <div class="col-11">
                                        <div class="singel-course mt-20">
                                            <div class="row no-gutters">
                                                <div class="col-md-3 mr-5 d-flex align-items-center">
                                                    <div class="thum">
                                                        <div class="image">
                                                            <img src="{{ asset('storage/' . $course->image_path) }}" alt="Course">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="cont p-0">
                                                        <a href="#">
                                                            <h4 class="pt-0 ">{{ $course->name }} </h4>
                                                        </a>
                                                        <ul style="padding: 0" class="mb-3">
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
                                                                <span><del>{{ number_format($course->price, 0, '', '.') }}
                                                                        đ</del>
                                                                    {{ number_format($course->sale_price, 0, '', '.') }}
                                                                    đ</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!--  row  -->
                                        </div> <!-- singel course -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" style="margin: 30px 6px;text-align: center" class="btn btn-primary ">Thêm đơn
                    hàng</button>
            </div>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script></script>
