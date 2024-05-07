@extends('layouts.clients.client')
@section('title')
    Khóa học online
@endsection
<style>
    .button1 {
  padding: 17px 40px;
  border-radius: 50px;
  cursor: pointer;
  border: 1px solod lightgray;
  background-color: white;
  box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: 15px;
  transition: all 0.5s ease;
}

.button1:hover {
  letter-spacing: 3px;
  background-color: green;
  color: hsl(0, 0%, 100%);
  box-shadow: lightgreen 0px 7px 29px 0px;
  border: none;
}

.button1:active {
  letter-spacing: 3px;
  background-color: hsl(261deg 80% 48%);
  color: hsl(0, 0%, 100%);
  box-shadow: lightgreen 0px 0px 0px 0px;
  transform: translateY(10px);
  transition: 100ms;
}
</style>
@section('content')
    <div style="height: 100%" class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="border border-3 border-success"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Thanh toán thành công !</h1>
                    <p style="margin: 16px 0">Cảm ơn bạn đã tin tưởng LIVIcode. Hãy check mail để nhận thông tin về khóa học nhé.</p>
                    <a href="{{ route('home') }}"><button class="button1">Trang chủ</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
