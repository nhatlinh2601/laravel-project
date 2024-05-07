<!-- resources/views/ajax/index.blade.php -->

<form id="ajax-form">
    @csrf
    <!-- Thêm các trường dữ liệu cần thiết -->
    <input type="text" name="name" id="name">
    <button type="button" id="submit-btn">Gửi AJAX Request</button>
</form>

<div id="result-container"></div>
<!-- Cài đặt jQuery từ CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        console.log('Document is ready.'); // Kiểm tra xem đoạn mã đã chạy đến đây chưa

        $('#submit-btn').on('click', function() {
            console.log('Submit button clicked.'); // Kiểm tra xem sự kiện click đã được kích hoạt chưa

            var formData = $('#ajax-form').serialize();
            formData['_token'] = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/ajax-example',
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log('Ajax request success:',
                        response); // Kiểm tra xem yêu cầu AJAX đã thành công chưa
                    if (response.success) {
                        $('#result-container').html('Dữ liệu đã được gửi thành công: ' +
                            JSON.stringify(response.data));
                    } else {
                        $('#result-container').html('Có lỗi xảy ra.');
                    }
                },
                error: function(error) {
                    console.log('Ajax request error:',
                        error); // Kiểm tra xem có lỗi nào xuất hiện không
                }
            });
        });
    });
</script>
