<?php
if(isset($error))
{
	echo $error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-Commerce</title>

	<link rel="stylesheet" href='../../assets/bootstrap/css/bootstrap.min.css'>
	<link rel="stylesheet" href='../../assets/bootstrap/css/bootstrap-theme.min.css'>
	<script src="../../assets/jquery/jquery-1.11.1.min.js"></script>
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<style>
		#container{
			font-family:arial;
			font-size:18px;
			margin:0px 0px 0px 8px;
			margin-left: 20px;
		}
		#details{
			margin: 1px 0px 0px 70px;			
		}
		#header-text {
			display: inline-block;
		}
		.btn-remove {
			display: inline-block;
			color:#999999;
			background: none;
			border:none;
			font-size: 30px;
			float:right;
		}
		.btn-drag {
			display: inline-block;
			color:#999999;
			background: none;
			border:none;
			font-size: 20px;
		}
		.title { 
				margin: 1px 0px 1px 5px;
				display: inline-block;
				text-align: right;	
		}
		.display{
				display: inline-block;
		}
		.display-name {
				margin: 0px 0px 5px 120px;
				display: inline-block;
				width: 220px;
		}
		.display-desc {
				margin: 0px 0px 5px 79px;
				display: inline-block;
				width: 220px;
				height: 80px;

		}
		.cat{
			margin-top: 20px;
		}
		.display-cat {
				margin: 0px 0px 5px 81px;
				display: inline-block;
				width: 220px;
		}
		.display-product {
				margin: 0px 0px 5px 177px;
				display: inline-block;
				width: 220px;
				height: 80px;
		}
		.display-new {
				margin: 0px 0px 5px 3px;
				display: inline-block;
				width: 220px;
		}
		.display-upload {
			margin-left: 103px;
			margin-top:20px;
			display: inline-block;
			width: 300px;
		}
		.image-label{
			display: inline-block;
		}
		input[type=file]{display: inline-block;}
		.display-price{
			margin: 0px 0px 5px 100px;
			display: inline-block;
			width: 220px;		
		}
		.price-div{
			margin-top: 20px
		}
		.display-qty{
			margin: 0px 0px 5px 101px;
			display: inline-block;
			width: 220px;		
		}
		.button-text{
			display: inline-block;
		}

		.btn-product {
			position:absolute;
		}
		.btn-trash {
			/*visibility: collapse;*/
			display: inline-block;
			color:#999999;
			background: none;
			border:none;
			font-size: 20px;
			margin-top:8px;

		}
		.hover-images  {
				margin: 15px 0px 0px 170px;
				width:400px;
		}

		.thumbnail{border:none;}
		.btn-drag, .thumbnail, .check-box, .button-text{display: inline-block; vertical-align: top;}
		.btn-drag{margin-top: 8px;}
		input.check-box{margin-top:20px;}
		.button-text{margin-top:13px;}
		.btn-bottom{margin: 30px 0px 20px 165px;}


	</style>


	<script type="text/javascript">
	  	$(document).ready(function(){

		  	// $(document).on('submit', 'form', function()
		  	// {	
		  	// 	var form = $(this);
		  	// 	$.post(form.attr('action'),form.serialize(),function(data){
		  	// 		$('#notes').html(data);
		  	// 	});
		  	// 	return false;
		  	// });


		 	$(".hover-images").hover(
				function() {
			    	$(this).css('cursor','crosshair');
			    	$(".btn-trash").css("visibility","visible");
			    	$(".glyphicon-trash").css("visibility","visible");
				 }, 
				function() {
			    	$(this).css('cursor','finger');
			    	$(".btn-trash").css("visibility","hidden");
			    	$(".glyphicon-trash").css("visibility","hidden");
				}
			);
	}); 

	</script>
</head>
<body>

<div id='container'>
	<h3 id='header-text'>Edit Product</h3>

  	<button type="button" class="btn btn-remove btn-small btn-default">
  		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
  	</button>
	<div id='details'>
   		<form action='/admin/process' method='post' enctype="multipart/form-data">
			<div class='name-div'>
				<div class='name'>	
					<span class='title'>Name</span>
					<input class='display-name' type='text' name='name' placeholder='name' value='kelly'>
				</div>
				<div>
					<span class='title'>Description</span>
					<input class='display-desc' type='textarea' name='description' value='Great Fit, Cool new colors'>
				</div>

				<div class='price-div'>	
					<span class='title'>Price ($)</span>
					<input class='display-price' type='text' name='price' placeholder='$...' value='119.99'>
				</div>
				<div>	
					<span class='title'>Quantity</span>
					<input class='display-qty' type='text' name='quantity' placeholder='1,2,3,...' value='3'>
				</div>
			</div>

			<div class='cat'>
				<span class='title'>Categories</span>
				<select class='display-cat' name='cat' >
	<?php 		// loop through the categories 		  
				for($i = count($category) - 1; $i >= 0; $i--)
				{
			  		$catname=$category[$i]['name'];
			  		$catid=$category[$i]['id'];
	            	echo "<option value='".$catid."' >".$catname.'</option>';
	            	// echo "<option selected value='".$catid."' >".$catname.'</option>';

				}
	?>
				</select>
			</div>
			<div>
				<span class='title'>or add new category</span>
				<input class='display-new' type='text' name='add_new_cat' placeholder='add new category'>
			</div>
			<div>	
				<p class='title image-label'>Images</p>
				<input type='file' class='display-upload' name='userfile' size='20'>
			</div>

			<div class='hover-images'>
			<!-- <div class='images'> -->
				<button type="button" class="btn btn-small btn-default btn-drag" aria-label="Left Align">
					<span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
				</button>		
				<div class='thumbnail'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div> 
				<!-- <div class='hover-images'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div>  -->
				<p class='button-text'>img.png</p>
				<button type="button" class="btn btn-small btn-default btn-trash">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</button>
				<input class='check-box' type="checkbox">
				<input type='hidden' name='product_id' value='1'>
				<input type='hidden' name='img_id' value='1'>
				<p class='button-text'>main</p>
			</div>

			<div class='hover-images'>
			<!-- <div class='images'> -->
				<button type="button" class="btn btn-small btn-default btn-drag" aria-label="Left Align">
					<span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
				</button>		
				<div class='thumbnail'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div> 
				<!-- <div class='hover-images'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div>  -->
				<p class='button-text'>img.png</p>
				<button type="button" class="btn btn-small btn-default btn-trash">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</button>
				<input class='check-box' type="checkbox">
				<input type='hidden' name='product_id' value='1'>
				<input type='hidden' name='img_id' value='2'>
				<p class='button-text'>main</p>
			</div>

			<div class='btn-bottom'>
		    	<input type="submit" class="btn btn-small btn-default" name='action' value='Cancel'>
		    	<input type="submit" class="btn btn-small btn-success" name='action' value='Preview' >
		    	<input type="submit" class="btn btn-small btn-primary" name='action' value='Update'>
			</div>
		</form>
	</div> <!-- end of details div -->
</div> <!-- end of container div -->
</body>
</html>