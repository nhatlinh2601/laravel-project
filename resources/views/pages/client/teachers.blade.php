 @extends('layouts.clients.client')
@section('title')
    Giáo viên
@endsection

@section('content')
<section id="teachers-page" class="pt-100 pb-120">
    <div class="container container-edit">
       <div class="row">

<!-- ===========noi thay doi ================= -->
            @foreach($teachers as $teacher)
           <div class="col-lg-3 col-sm-6">
               <div class="singel-teachers mt-30 text-center">
                    <div class="image">
                        <img src="{{asset('storage/'.$teacher->image_path)}}" alt="Teachers">
                    </div>
                    <div class="cont">
                        <a href="{{ route('teachers.teacherDetail',  ['id' => $teacher->id] )}}"><h6>{{$teacher->name}}</h6></a>
                        <span>Phần mềm máy tính</span>
                    </div>
                </div> <!-- singel teachers -->
           </div>
           @endforeach
           <!-- ===========noi thay doi ================= -->
       </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a href="{{$teachers->previousPageUrl()}}" aria-label="Previous">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>

                        <li class="page-item"><a class="{{ $teachers->currentPage() == 1 ? 'active' : '' }}" href="{{$teachers->url(1)}}">1</a></li>

                        @for ($i = 2; $i <= $teachers->lastPage(); $i++)
                            <li class="page-item">
                                <a href="{{ $teachers->url($i) }}" class="{{ $teachers->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="page-item">
                            <a href="{{$teachers->nextPageUrl()}}" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>  <!-- courses pagination -->
            </div>
        </div>  <!-- row -->
    </div> <!--  container-edit -->
</section>
@endsection