@extends('layouts.backend.backend')
@section('page_title')
    Danh sách đơn hàng
@endsection


<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Thêm vào phần đầu của trang HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>

@section('content')
    <div class="card">
        @if (session('success'))
            <div style="margin: 0 20px" class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="margin: 0 20px" class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center card-header">
            <h3 class="card-title">Danh sách đơn hàng</h3>

        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    <div class="col-sm-12 col-md-8">
                        <div id="example1_filter" class=" dataTables_filter">
                            <form action="{{ route('admin.order.find-order') }}" method="order"
                                class="d-flex align-items-center">
                                @csrf
                                <label class="d-flex justify-content-center align-items-center">




                                    </select>

                                    <input type="date" id="from_date" class="form-select form-control form-control-sm"
                                        onfocus="showCalendar()">
                                    <input type="date" id="to_date" class="form-select form-control form-control-sm"
                                        onfocus="showCalendar()">

                                    <select id="order_status" name="status" style="margin: 0 4px"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value=0 {{ old('category') == 0 ? 'selected' : '' }}>Trạng thái đơn hàng
                                        </option>
                                        <option value=1>Chưa xác nhận</option>
                                        <option value=2>Đã xác nhận</option>

                                        <input style="margin: 0 4px" name="search_key" type="search"
                                            class="form-control form-control-sm" placeholder="Search key"
                                            aria-controls="example1" value="{{ old('search_key') }}">

                                </label>

                                <button id="order_search" title="Search" type="submit" class="btn btn-flat btn-info"
                                    style="border-radius: 4px;margin: 0 4px">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>

                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <a href={{ route('admin.order.add') }}> <button
                                style="border: none;float: right;margin-bottom: 16px" class="btn-flat btn-lg btn-success"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                        </a>

                    </div>



                </div>
                <div class="row">
                    <div id="order_table" class="col-sm-12">
                        @include('pages.backend.order.data')
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- @foreach ($orders as $order)
            {{ $order->name }}
        @endforeach
        {!! $orders->links() !!} --}}
@endsection

<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_user_data(page);
        });

        function fetch_user_data(page) {
            $.ajax({
                url: "/admin/order/list/ajax?page=" + page,
                success: function(data) {
                    $('#order_table').html(data);
                }
            });
        }

        $('#order_status').on('change', function(event) {
            event.preventDefault();
            var status = $(this).val();

            $.ajax({
                url: '{{ route('admin.order.find-by-status') }}',
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {

                    $('#order_table').html(data);


                },
                error: function(error) {
                    console.error('Error:', error);
                },

            });

        })
        $('#order_search').on('click', function(event) {
            event.preventDefault();
            var key_search = $('#key_search').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            console.log(from_date);

            $.ajax({
                url: '{{ route('admin.order.find-by-date-searchkey') }}',
                method: 'POST',
                data: {
                   
                    from_date: from_date,
                    to_date: to_date,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {

                    $('#order_table').html(data);


                },
                error: function(error) {
                    console.error('Error:', error);
                },

            });

        })
    });

    function confirmDelete() {

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        return result;
    }

    function confirmRestore() {

        var result = confirm("Bạn có chắc chắn muốn khôi phục không?");
        return result;
    }

    function showCalendar() {
        var calendar = new Calendar();
        document.getElementById("myDate").autocomplete = calendar;
    }
</script>

<!-- Thêm vào phần cuối của trang HTML trước thẻ </body> -->
<script></script>
