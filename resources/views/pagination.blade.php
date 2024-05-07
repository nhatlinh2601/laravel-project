<!DOCTYPE html>
<html>
	<head>
		<title>Laravel 10 Create AJAX Pagination Example</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			.box{
			    width:600px;
			    margin:0 auto;
			}
		</style>
	</head>
	<body>		
		<div class="container">
			<h3 align="center">Laravel 10 Create AJAX Pagination Example - Websolutionstuff</h3>
			<br />
			<div id="user_table">
				@include('user_pagination_data')
			</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function(){
	    $(document).on('click', '.pagination a', function(event){
	        event.preventDefault(); 
	        var page = $(this).attr('href').split('page=')[1];
	        fetch_user_data(page);
	    });
	
	    function fetch_user_data(page)
	    {
	        $.ajax({
                url:"/pagination/ajax?page="+page,
                success:function(data)
                {
                  console.log(data);
                    $('#user_table').html(data);
                }
	        });
	    }	 
	});
</script>