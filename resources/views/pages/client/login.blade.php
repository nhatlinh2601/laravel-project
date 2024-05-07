<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container-login forms">
        <div class="form login">
            <div class="form-content">
                <header>Chào mừng đến với LiViCode</header>
                @if (session('msg'))
                    <div style="text-align: center;font-weight: 600px;margin-top: 10px;color: red">{{ session('msg') }}</div>

          
            @endif
            <form method="POST" action="{{ route('post-login') }}">
                @csrf
                <div class="field input-field">
                    <input id="email" type="text" placeholder="Email" style="padding: 8px 20px; border-radius: 35px; background: transparent; border: 1px solid black; color: black;"
                        class="input @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Create password" style="padding: 8px 20px; border-radius: 35px; background: transparent; border: 1px solid black; color: black;"
                        class="password @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                

                <div class="field button-field" >
                    <button  type="submit" class="">Đăng nhập</button>
                </div>
            </form>

            <div class="form-link" style="margin-top: 30px;">
                <div class="form-link">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-pass">Quên mật khẩu?</a>
                    @endif
                </div>
                <span>Bạn chưa có tài khoản ? <a href={{ route('register') }} class="link signup-link">Đăng
                        ký</a></span>
            </div>
        </div>

        <div class="line"></div>

        <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Đăng nhập với Facebook</span>
            </a>
        </div>

        <div class="media-options">
            <a href="#" class="field google" >
                <img src="/client/images/about/google.png" alt="" class="google-img">
                <span>Đăng nhập với Google</span>
            </a>
        </div>

        </div>



    </section>

    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>

</html>
