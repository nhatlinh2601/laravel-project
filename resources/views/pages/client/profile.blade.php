@extends('layouts.clients.client')
@section('title')
    Thông tin cá nhân
@endsection


@section('content')
    <section style="margin-top: 90px" class="bg-light">
        <div class="container">


            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Row -->
                    @if (session('notice'))
                        <div class="notice alert alert-success alert-dismissible fade show">
                            <strong>{{ session('notice') }}</strong>
                        </div>
                    @endif
                    <div style="background: white;
                    padding: 40px;
                    margin: 40px;
                    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.09);
                    border-radius: 6px;" class="row wrapper-profile">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="dashboard_container">
                                        <div class="dashboard_container_header">
                                            <div class="dashboard_fl_1">
                                                <h4>Thông tin học viên</h4>
                                            </div>
                                        </div>
                                        <div class="dashboard_container_body p-4">

                                            <!-- Basic info -->
                                            <form action={{ route('student.edit-profile',  Auth::guard('student')->user()->id) }}
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="submit-section">
                                                    <div class="form-row">
                                                        <div class="col-12 col-md-6">
                                                            <div style="margin: 12px 0" class="form-group col-md-12 ">
                                                                <label>Họ tên</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value='{{ Auth::guard('student')->user()->name }}'>
    
                                                                @error('name')
                                                                    <span style="color: red">{{ $message }}</span>
                                                                @enderror
                                                            </div>
    
                                                            <div style="margin: 12px 0" class="form-group col-md-12 ">
                                                                <label>Email</label>
                                                                <input type="text" name="email" class="form-control"
                                                                    value='{{ Auth::guard('student')->user()->email }}' readonly>
                                                            </div>
    
                                                            <div style="margin: 12px 0" class="form-group col-md-12 ">
                                                                <label>Mật khẩu mới</label>
                                                                <input type="password" name="password" class="form-control">
                                                                @error('password')
                                                                    <span style="color: red">{{ $message }}</span>
                                                                @enderror
                                                            </div>
    
    
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            @if (Auth::guard('student')->user()->image_path != '')
                                                                <div
                                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                                    <div
                                                                        style="width: 180px; height: 180px; overflow: hidden;border-radius: 5px;margin-top: 30px">
                                                                        <img style="width: 100%;
                                                                        height: 100%;
                                                                        object-fit: cover;
                                                                        object-position: center"
                                                                            src="{{ asset('storage/' . Auth::guard('student')->user()->image_path) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <input style="margin-top: 16px; margin-left: 80px" type="file" name="image" accept="image/*">
                                                                    @error('image')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror

                                                                </div>
                                                            @else
                                                                <div class="form-group col-12 col-md-6">
                                                                    <label for="">Hình ảnh</label>
                                                                    <br>

                                                                    <input type="file" name="image" accept="image/*">
                                                                    @error('image')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            @endif


                                                        </div>
                                                        <div style="text-align: center; margin-top: 40px" class="form-group col-md-12">
                                                            <button class="btn btn-theme" type="submit">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Basic info -->



                                        </div>

                                    </div>
                                </div>

                                
                            </div>

                        </div>


                        <!-- Basic info -->



                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- Sidebar -->
        </div>
        </div>
    </section>
@endsection
