<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.css">


</html>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Website LiViCode</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> --}}


        @php
            use App\Models\Notification;
            $notifications = Notification::orderBy('created_at', 'desc')->get();
            $count = Notification::count();
        @endphp

        <li style="position: relative" class="nav-item dropdown dropdown-notifications">
            <div id="notification-container"></div>
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span id="count" class="badge badge-warning navbar-badge">{{ $count }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span id="count2" class="dropdown-item dropdown-header">{{ $count }} Notifications</span>
                <div class="dropdown-divider"></div>

                <div id="noti-body">


                    @foreach ($notifications->take(4) as $item)
                        <a style="color: #232323;" href="{{ route('admin.order.index') }}">
                            <div class="notification-list notification-list--unread">
                                <div class="notification-list_detail">
                                    <p>{{ $item->content }}</p>
                                    <p><small>10 mins ago</small></p>
                                </div>
                                <div class="notification-list_feature-img">
                                    <img src="{{asset('storage/'.$item->image_path)}}" alt="Feature image">
                                </div>
                            </div>
                        </a>
                    @endforeach


                </div>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user" aria-hidden="true"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="{{ route('admin.view-profile', Auth::user()) }}" class="dropdown-item">
                    Thông tin cá nhân
                </a>
                <a href="{{ route('admin.user.profile', Auth::user()) }}" class="dropdown-item">
                    Xem hồ sơ
                </a>
                <a href="{{ route('admin.user.post.write') }}" class="dropdown-item">
                    Viết blog
                </a>


                <div class="dropdown-divider"></div>
                <a href={{ route('admin.logout') }} class="dropdown-item"
                    onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">

                    Đăng xuất
                </a>
                <div class="dropdown-divider"></div>

            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>







    </ul>
</nav>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script type="text/javascript">
    var pusher = new Pusher('0aef58ddf643ab532717', {
        encrypted: true,
        cluster: "ap1"
    });

    var channel = pusher.subscribe('order-channel');

    channel.bind('App\\Events\\NewOrderReceived', function(data) {
        console.log(data);
        var notificationMessage = data.student.name + ' vừa mua khóa học ' + data.course.name;


        console.log(notificationMessage);
        var notiBody = document.getElementById('noti-body');
        var count = document.getElementById('count');
        var count2 = document.getElementById('count2');
        var newNoti = ` <a style="color: #232323;" href="{{ route('admin.order.index') }}"><div class="notification-list notification-list--unread">
                            <div class="notification-list_detail">
                                <p>${data.student.name} vừa mua khóa học ${data.course.name}</p>
                                <p><small>10 mins ago</small></p>
                            </div>
                            <div class="notification-list_feature-img">
                                

                            </div>
                        </div></a>`;

        // Chèn vào đầu danh sách
        notiBody.insertAdjacentHTML('afterbegin', newNoti);
        count.innerHTML = parseInt(count.innerHTML) + 1;
        count2.innerHTML = parseInt(count2.innerHTML) + 1 + ' Notifications';
        showNotification(notificationMessage);

    });

    function showNotification(message) {
        var notificationContainer = document.getElementById('notification-container');
        notificationContainer.innerHTML = message;
        notificationContainer.style.display = 'block';

        setTimeout(function() {
            notificationContainer.style.display = 'none';
        }, 4500); // 3 seconds, adjust as needed
    }

    // Example usage
</script>
<!-- Sử dụng CDN -->





</body>

</html>
