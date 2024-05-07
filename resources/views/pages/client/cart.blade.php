@php
    use Carbon\Carbon;
@endphp

@extends('layouts.clients.client')
@section('title')
    Giỏ hàng
@endsection

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@section('content')
    <section>
        <form action="{{ route('post-cart-payment') }}" method="POST">
            @csrf
            <div class="container px-4 py-5 mx-auto mt-100">
                        <div class="row d-flex justify-content-center">
                            <div class="col-5">
                                <h3 class="heading">Giỏ hàng</h3>
                            </div>
                            <div class="col-7">
                                <div class="row text-right">
                                    <div class="col-4">
                                        <h6 class="mt-2">Thể loại</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6 class="mt-2">Số lượng</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6 class="mt-2">Giá</h6>
                                    </div>
                                    <div class="col-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($courses as $course)
                        <div class="row d-flex justify-content-center border-top">
                            <div class="col-1">
                                <div class="checkbox-wrapper-31">
                                    <!-- Thêm data-price vào checkbox để lưu giá của khóa học -->
                                    <input type="checkbox" class="course-checkbox" id="course_{{ $course->id }}" data-price="{{ $course->sale_price }}" value="{{ $course->id }}">

                                    <svg viewBox="0 0 35.6 35.6">
                                        <circle class="background" cx="17.8" cy="17.8" r="17.8"></circle>
                                        <circle class="stroke" cx="17.8" cy="17.8" r="14.37"></circle>
                                        <polyline class="check" points="11.78 18.12 15.55 22.23 25.17 12.87"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-5"> 
                                <div class="row d-flex">
                                    <div class="my-auto flex-column d-flex pad-left pl-3 pt-5" style="width: 100%;">
                                        <h5 class="mob-text">{{ $course->name }}</h5>
                                    </div>
                                    <div class="book">
                                        <img src="{{asset('storage/'. $course->image_path )}}" class="book-img">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="my-auto col-6">
                                <div class="row text-right">
                                    <div class="col-4">
                                        <p class="mob-text">Giáo dục</p>
                                    </div>
                                    <div class="col-2">
                                        <div class="row d-flex justify-content-end px-3">
                                            <p class="mb-0" id="cnt1">1</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="price">
                                            <span><del style="color: gray;">{{ number_format($course->price, 0, '', '.') }} đ
                                                </del><br>
                                                {{ number_format($course->sale_price, 0, '', '.') }} đ</span>
                                        </div>
                                    </div>
                                
                                        <a href="{{ route('removeCart', ['courseId' => $course->id]) }}" class="col-3 actions">
                                            <button class="btn" type="button">
                                                <p class="paragraph"> Xóa </p>
                                                <span class="icon-wrapper">
                                                    <svg class="icon" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </a>

                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="row justify-content-center mt-5 pt-5">
                            <div class="col-lg-12">
                                <div class="card" style="border: none;">
                                    <div class="row" >
                                        <div class="col-lg-3 radio-group mb-3">
                                            <div class="row d-flex px-3 radio">
                                                <img class="pay" src="/client/images/MASTERCARD.jpg">
                                                <p class="my-auto">Credit Card</p>
                                            </div>
                                            <div class="row d-flex px-3 radio gray">
                                                <img class="pay" src="/client/images/VISA.jpg">
                                                <p class="my-auto">Debit Card</p>
                                            </div>
                                            <div class="row d-flex px-3 radio gray mb-3">
                                                <img class="pay" src="/client/images/cMk1MtK.jpg">
                                                <p class="my-auto">PayPal</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="row px-2">
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label">Name on Card</label>
                                                    <input type="text" id="cname" name="cname" placeholder="Johnny Doe">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label">Card Number</label>
                                                    <input type="text" id="cnum" name="cnum" placeholder="1111 2222 3333 4444">
                                                </div>
                                            </div>
                                            <div class="row px-2">
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label">Expiration Date</label>
                                                    <input type="text" id="exp" name="exp" placeholder="MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label">CVV</label>
                                                    <input type="text" id="cvv" name="cvv" placeholder="***">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <div class="row d-flex justify-content-between px-4">
                                                <p class="mb-1 text-left">Tổng </p>
                                                <h6 class="mb-1 text-right" id="totalAmount">{{ number_format($total, 0, '', '.') }} đ</h6>
                                            </div>
                                            <div class="row d-flex justify-content-between px-4">
                                                <p class="mb-1 text-left">Thuế</p>
                                                <h6 class="mb-1 text-right">{{ number_format(20000, 0, '', '.') }} đ</h6>
                                            </div>
                                            <div class="row d-flex justify-content-between px-4" id="tax">
                                                <p class="mb-1 text-left">Tổng tiền (bao gồm thuế)</p>
                                                <h6 class="mb-1 text-right">{{ number_format($total+20000, 0, '', '.') }} đ</h6>
                                            </div>
                                            <button class="btn-block btn-blue">
                                                <span style="font-weight: 700; padding: 10px 0;">
                                                    <span  onclick="return confirmPayment()" type="submit"  id="checkout">Thanh toán </span>
                                                    <span style="margin-left: 30px" id="check-amt">{{ number_format($total+20000, 0, '', '.') }} đ</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        </form>
    </section>
@endsection
<script>
    function confirmPayment() {

        var result = confirm("Bạn có chắc chắn muốn thanh toán không?");
        return result;
    }

    function confirmRestore() {

        var result = confirm("Bạn có chắc chắn muốn khôi phục không?");
        return result;
    }

    $(document).ready(function(){

        $('.radio-group .radio').click(function(){
            $('.radio').addClass('gray');
            $(this).removeClass('gray');
        });

        $('.plus-minus .plus').click(function(){
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) + 1);
        });

        $('.plus-minus .minus').click(function(){
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) - 1);
        });

    });
</script>