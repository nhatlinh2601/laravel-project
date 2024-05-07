
<div class="sidebar" >
    <ul class="cate-list cate-item">
        <li class="write-blog" style="text-align: center;">
            <a href="{{ route('write-post') }}"><span >+</span></a>
        </li>

        <li>
            <a href="{{ route('home') }}" class="cate-item {{ request()->routeIs('home') ? 'item-background' : '' }}">
                <i class="fa fa-home icon" aria-hidden="true"></i>
                <p>Trang chủ</p>
            </a>
        </li>
        <li>
            <a href="{{ route('courses.view') }}" class="cate-item {{ request()->routeIs('courses.view') ? 'item-background' : '' }}">
                <i class="fa fa-codepen icon" aria-hidden="true"></i>
                <p>Khóa học</p>
            </a>
        </li>
        <li>
            <a href="{{ route('teachers.view') }}" class="cate-item {{ request()->routeIs('teachers.view') ? 'item-background' : '' }}">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                <p>Giảng viên</p>
            </a>
        </li>
        <li>
            <a href="{{ route('posts.view') }}" class="cate-item {{ request()->routeIs('posts.view') ? 'item-background' : '' }}">
                <i class="fa fa-pencil icon" aria-hidden="true"></i>
                <p >Bài viết</p>
            </a>
        </li>
    </ul>
</div>  

