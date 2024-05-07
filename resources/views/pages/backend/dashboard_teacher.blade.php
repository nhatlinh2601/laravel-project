@extends('layouts.backend.backend')
@section('page_title')
    Trang chủ GIÁO VIÊN
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Khóa học</span>
                        <span class="info-box-number">{{$courseCount}}</span>
                        <a href="{{ route('admin.gv.myCourses') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Học viên</span>
                        <span class="info-box-number">{{$userCount}}</span>
                        <a href="{{ route('admin.gv.myStudents') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>


          

        </div>

       
      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="orderChartCourse"></div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>

        

        

    </div>
@endsection

<script src="https://code.highcharts.com/highcharts.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        var chartData={!! json_encode($chartData) !!};
        Highcharts.chart('orderChartCourse', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Số lượng học viên theo học khóa học'
            },
            xAxis: {
                categories: chartData.map(item => item.course_name)
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'Khóa học',
                data: chartData.map(item => item.student_count)
            }]
        });

       
    });
</script>
