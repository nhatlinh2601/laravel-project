@extends('layouts.backend.backend')
@section('page_title')
    Danh sách đơn hàng
@endsection


<html>


</html>

@section('content')
    <section style="margin-top: 16px" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h3 class="card-title">Chi tiết đơn hàng ID: {{ $order->id }}</h3>

                        </div>
                        <div class="row" id="order-body">
                            <div class="col-sm-6">
                                <table class="table table-hover box-body text-wrap table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="td-title">Họ tên:</td>
                                            <td><a href="#" class="updateInfoRequired editable editable-click"
                                                    data-name="first_name" data-type="text" data-pk="O-1qkBx-AkkTm"
                                                    data-url="https://demo.s-cart.org/sc_admin/order/update"
                                                    data-title="First name">{{ $order->student->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <td class="td-title">Email:</td>
                                            <td><a href="#" class="updateInfoRequired editable editable-click"
                                                    data-name="last_name" data-type="text" data-pk="O-1qkBx-AkkTm"
                                                    data-url="https://demo.s-cart.org/sc_admin/order/update"
                                                    data-title="Last name">{{ $order->student->email }}</a></td>
                                        </tr>
                                        <tr>
                                            <td class="td-title">Địa chỉ:</td>
                                            <td><a href="#" class="updateInfoRequired editable editable-click"
                                                    data-name="phone" data-type="text" data-pk="O-1qkBx-AkkTm"
                                                    data-url="https://demo.s-cart.org/sc_admin/order/update"
                                                    data-title="Phone">{{ $order->student->address }}</a></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="td-title">Trạng thái đơn hàng:</td>
                                            <td><a href="#" class="updateStatus editable editable-click"
                                                    data-name="status" data-type="select"
                                                    data-source="{&quot;1&quot;:&quot;New&quot;,&quot;2&quot;:&quot;Processing&quot;,&quot;3&quot;:&quot;Hold&quot;,&quot;4&quot;:&quot;Canceled&quot;,&quot;5&quot;:&quot;Done&quot;,&quot;6&quot;:&quot;Failed&quot;}"
                                                    data-pk="O-1qkBx-AkkTm" data-value="1"
                                                    data-url="https://demo.s-cart.org/sc_admin/order/update"
                                                    data-title="Order status">
                                                    @if ($order->status == 1)
                                                        <span class="badge badge-success">
                                                            ACTIVE
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            INACTIVE
                                                        </span>
                                                    @endif
                                                </a></td>
                                        </tr>

                                        <tr>
                                            <td> Thời gian:</td>
                                            <td>2023-11-23 21:43:59</td>
                                        </tr>
                                        <tr>
                                            <td class="td-title"><i class="far fa-money-bill-alt nav-icon"></i> Tổng tiền :
                                            </td>
                                            <td>{{ $order->total }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <form id="form-add-item" action="" method="">
                            <input type="hidden" name="_token" value="hCoCbHx4UwAwxIAGrmvthVyGla4DND93Ofrtwdm1"> <input
                                type="hidden" name="order_id" value="O-1qkBx-AkkTm">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card collapsed-card">
                                        <div class="table-responsive">
                                            <table id="myTable"
                                                class="table table-hover box-body text-wrap table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Tên khóa học</th>

                                                        <th class="product_price">Giá</th>
                                                        <th class="product_qty">Số lượng</th>
                                                        <th class="product_total">Tổng tiền</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($order->details as $item)
                                                        <tr>

                                                            <td>

                                                                {{ App\Models\Course::find($item->course_id)->name }}
                                                            </td>

                                                            <td class="product_price"><a href="#"
                                                                    class="edit-item-detail editable editable-click"
                                                                    data-title="Price">{{ $item->price }}</a></td>
                                                            <td class="product_qty">x <a href="#"
                                                                    class="edit-item-detail editable editable-click"
                                                                    data-title="quantity"> 1</a></td>
                                                            <td
                                                                class="product_total item_id_9aaec53a-b00e-4b80-b3d7-05939575b830">
                                                                {{ $item->price }}</td>


                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>



                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

<script>
    function updateSelectedCourse(selectedValue) {
        // Log giá trị được chọn để kiểm tra
        console.log("Selected Course ID:", selectedValue);


    }

    function addNewRow() {


        // Tạo một hàng mới
        var newRow = document.createElement("tr");

        // Tạo các ô (cột) cho hàng mới
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
        var cell3 = document.createElement("td");
        var cell4 = document.createElement("td");
        var cell5 = document.createElement("td");
        // Thêm nội dung cho các ô (cột) nếu cần
        cell1.textContent = "New Data 1";
        cell2.textContent = "New Data 2";
        cell3.textContent = "New Data 2";
        cell4.textContent = "New Data 2";
        cell5.textContent = "New Data 2";

        // Thêm các ô vào hàng
        newRow.appendChild(cell1);
        newRow.appendChild(cell2);
        newRow.appendChild(cell3);
        newRow.appendChild(cell4);
        newRow.appendChild(cell5);

        // Thêm hàng mới vào tbody của bảng
        document.querySelector("#myTable tbody").appendChild(newRow);
    }
</script>
