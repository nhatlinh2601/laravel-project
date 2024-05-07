@php
    use Carbon\Carbon;
@endphp

@extends('layouts.clients.client')
@section('title')
Bài viết
@endsection
@section('content')

<section id="blog-singel" class="pt-80 pb-120">
    <div class="container container-edit">
       <div class="row d-flex align-items-center justify-content-center">
          <div class="col-lg-10 ">
              <div class="blog-details mt-30">
                  <div class="thum">
                      <img src="{{asset('storage/'. $post->image_path)}}" alt="Blog Details">
                  </div>
                  <div class="cont">
                      <h3>{{$post->title}}</h3>
                      <ul style="margin: 30px 0; ">
                           <li><a href="#" style="font-size: 20px;"><i class="fa fa-calendar"></i>{{ Carbon::parse($post->created_at)->format('F d, Y') }}</a></li>
                           <li><a href="#" style="font-size: 20px;"><i class="fa fa-user"></i>{{$post->user_name}}</a></li>
                           <li><a href="#" style="font-size: 20px;"><i class="fa fa-tags"></i>Education</a></li>
                       </ul>
                       <p style="line-height: 30px; font-size: 18px; margin-bottom: 40px;">{!! nl2br($post->content) !!} </p>
                       <ul class="share">
                           <li class="title">Share :</li>
                           <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                       </ul>
                  </div> <!-- cont -->
              </div> <!-- blog details -->
              <div class="row " >
                    <div class="col-lg-12">
                        <div class="releted-courses pt-95">
                            <div class="title">
                                <h3>Các bài viết cùng tác giả </h3>
                            </div>
                            <div class="row">

                                 @foreach ($postSameUser as $post)
                                <div class="col-md-4">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="{{asset('storage/'. $post->image_path)}}" alt="Course">
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <a href="{{ route('posts.postDetail', ['id' => $post->id]) }}"><h4>{{$post->title}}</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="{{asset('storage/'. $post->user_img)}}" alt="user"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">
                                                        <h6>{{$post->user_name}}</h6>
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
                            </div> <!-- row -->
                        </div> <!-- releted courses -->
                    </div>
            </div> <!-- row -->

            <div class="row " >
                    <div class="col-lg-12">
                        <div class="releted-courses pt-95">
                            <div class="title">
                                <h3>Bài viết phổ biến</h3>
                            </div>
                            <div class="row">

                                 @foreach ($postRand as $post)
                                <div class="col-md-4">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="{{asset('storage/'. $post->image_path)}}" alt="Course">
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <a href="{{ route('posts.postDetail', ['id' => $post->id]) }}"><h4>{{$post->title}}</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img src="{{asset('storage/'. $post->user_img)}}" alt="user"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">
                                                        <h6>{{$post->user_name}}</h6>
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
                            </div> <!-- row -->
                        </div> <!-- releted courses -->
                    </div>
            </div> <!-- row -->
          </div>
       </div> <!-- row -->
    </div> <!-- container -->
</section>
@endsection