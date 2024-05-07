@extends('layouts.clients.client')
@section('title')
    Thanh toán khóa học online
@endsection

<style>
    .Btn1 {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(15, 15, 15);
  border: none;
  color: white;
  font-weight: 600;
  gap: 8px;
  cursor: pointer;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  padding: 16px 25px;
  border: 1px solid lightgray;
  letter-spacing: 1px;
}

.svgIcon {
  width: 16px;
}

.svgIcon path {
  fill: white;
}

.Btn1::before {
   
  width: calc(100% + 40px);
  aspect-ratio: 1/1;
  position: absolute;
  content: "";
  background-color: white;
  border-radius: 50%;
  left: -20px;
  top: 50%;
  transform: translate(-150%, -50%);
  transition-duration: .5s;
  mix-blend-mode: difference;
}

.Btn1:hover::before {
  transform: translate(0, -50%);
}

.Btn1:active {
  transform: translateY(4px);
  transition-duration: .3s;
}
</style>

@section('content')
    <div style="height: 100%;
display: flex;
align-items: center;" class="container mt-4 p-0">

        <div class="row col-12">
            <div class="col-lg-9">
                <h2 class="mb-5" style="color: green;">Thanh toán</h2>
                <div class="card p-4 mb-4" style="border-radius: 30px;">

                    <div>
                        <div class="table-responsive px-md-4 px-2 pt-3" >
                            <table class="table table-borderless" >
                                <tbody>
                                    <tr class="border-bottom">
                                        <div class="row">


                                            <div class="col-12">
                                                <div class="mt-30">
                                                    <div class="row ">
                                                        <div class="col-7">
                                                            <div class="thum">
                                                                <div class="image mr-3">
                                                                    <img src="{{asset('storage/'. $course->image_path )}}" alt="Course"
                                                                        style="height: 165px; width: 320px; border-radius: 30px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="cont p-0" style="width: 100%;">
                                                                <a href="#" style="width: 100%;">
                                                                    <h4 style="width: 100%;" class="pt-0 pb-3">{{ $course->name }} </h4>
                                                                </a> <br>

                                                                <div class="price">
                                                                    @if ($course->sale_price == 0)
                                                                        <span>Free</span>
                                                                    @else
                                                                        <span style="font-weight: 600; color: red; font-size: 18px;"><del style="color: gray; margin-bottom: 18px;">{{ number_format($course->price, 0, '', '.') }}
                                                                                đ</del><br>
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
                                    </tr>
                                    <tr class="border-bottom">

                                    </tr>
                                    <tr class="">

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 payment-summary">
                <h5 class="fw-bold pt-lg-0 pt-4 pb-2">Tổng số tiền </h5>
                <div class="card px-md-3 px-2 pt-4 " style="border: 1px solid blue; border-radius: 20px; ">



                    <div class="d-flex flex-column b-bottom p-3" >

                        <div class="d-flex justify-content-between"> <small class="text-muted" style="color: black; letter-spacing: 2px; font-weight: 600 ;">Tổng tiền:</small>
                            <p style="font-size: 18px; font-weight: 700; color: blue;"> {{ number_format($course->sale_price, 0, '', '.') }} đ</p>
                        </div>
                    </div>

                </div>
            </div>
            <form style="display: block;margin: 0 auto;margin-top: 30px;"  action="{{ route('post-cart-payment', ['course'=> $course]) }}" method="POST">
                @csrf
                <button class="Btn1" type="submit">
                    Thanh toán 
                    <svg viewBox="0 0 576 512" class="svgIcon"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
                </button>
            </form>

        </div>
    </div>
@endsection

