@extends('layouts.backend.backend')
@section('page_title')
    Trang chủ ADMIN
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn hàng</span>
                        <span class="info-box-number">{{$orderCount}}</span>
                        <a href="{{ route('admin.order.index') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Khóa học</span>
                        <span class="info-box-number">{{$courseCount}}</span>
                        <a href="{{ route('admin.course.index') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Người dùng</span>
                        <span class="info-box-number">{{$userCount}}</span>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-map-signs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Bài biết</span>
                        <span class="info-box-number">{{$postCount}}</span>
                        <a href="{{ route('admin.post.index') }}" class="small-box-footer">
                           Xem thêm
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Đơn mua khóa học mới</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                       @include('pages.backend.order.data')

                    </div>

                    <div class="card-footer clearfix">
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
                                <div id="orderChartMonth"></div>
                            </div>
                        </div>

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
                                <div id="orderChartYear"></div>
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

        var dailyOrdersData={!! json_encode($dailyOrdersData) !!};
        Highcharts.chart('orderChartMonth', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Số lượng khóa học đã bán theo tháng'
            },
            xAxis: {
                categories: dailyOrdersData.map(item => item.date)
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'Khóa học',
                data: dailyOrdersData.map(item => item.count)
            }]
        });

        var monthOrdersData = {!! json_encode($monthOrdersData) !!};
        Highcharts.chart('orderChartYear', {
           

            chart: {
                type: 'column'
            },
            title: {
                text: 'Số lượng khóa học đã bán theo năm'
            },
            xAxis: {
                categories: monthOrdersData.map(item => item.month)
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'Khóa học',
                data: monthOrdersData.map(item => item.count)
            }]
        });
    });
</script>
