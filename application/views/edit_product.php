<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-Commerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<style>
		#container{
			width:1000px;
			height: 1000px;
			font-family:arial;
			font-size:18px;
			margin:0px 0px 0px 8px;
		}
		#details{
			margin: 1px 0px 0px 70px;			
		}
		#header-text {
			display: inline-block;
		}
		#hearder-remove {
			display: inline-block;
			margin: 0px 0px 5px 230px;
		}
		.title { 
				margin: 1px 0px 1px 5px;
				display: inline-block;	
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
				margin: 0px 0px 5px 108px;
				display: inline-block;
				/*width: 220px;*/
		}
		.button-text{
			display: inline-block;
		}
		.icons  {
				margin: 8px 0px 5px 140px;
				display: inline-block;
		}
		.div-product {
    		position:relative;
		}
		.btn-product {
			position:absolute;
		}
		.glyphicon-trash, .btn-trash {
			visibility: collapse;
		}
	</style>


	<script type="text/javascript">



	  $(document).ready(function(){

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


	}); //end doc. ready




	</script>
</head>
<body>

<div id='container'>
  <h3 id='header-text'>Edit Product - ID <?= $product['id'] ?></h3>
  <button type="button" id='hearder-remove' class="btn btn-small btn-default">
  	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
  </button>


  <div id='details'>
   <form action='/main/action' method='post'>
	<div class='name-div'>
		<div class='name'>	
			<span class='title'>Name</span>
			<input class='display-name' type='text' name='name' value='<?= $product['name'] ?>'>
		</div>
		<div>
			<span class='title'>Description</span>
			<input class='display-desc' type='textarea' name='desc' value='<?= $product['description'] ?>'>
		</div>
	</div>

	<div class='cat'>
		<span class='title'>Categories</span>
		<select class='display-cat' name='cat' >
 <?php 		  
	for($i = count($this->session->userdata('category')) - 1; $i >= 0; $i--)
		  {
		  	$catname=$this->session->userdata('category')[$i]['name'];
            echo "<option value='".$catname."' >".$catname.'</option>';
		    // var_dump("<option value='".$catname."' >".$catname.'</option>'); die();

		  }
	?>
		</select>

			<button type="button" class="btn btn-mini btn-default btn-product"> 
		  		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			</button>
			<button type="button" class="btn btn-mini btn-default">
		  		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			</button>
	</div>
	
	<div>
		<span class='title'>or add new category</span>
		<input class='display-new' type='text' name='add_cat' placeholder='add new category'>
	</div>

	<div>	
		<span class='title'>Images</span>
		<input type='file' class='display-upload' name='upload' value='Upload'></button>
	</div>

	<div class='icons'>
		<button type="button" class="btn  btn-small btn-default" aria-label="Left Align">
		  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
		</button>

		<div class='hover-images'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div> 
		</button>
		<p class='button-text'>img.png</p>

		<button type="button" class="btn btn-small btn-default btn-trash">
		  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>

		<button type="button" class="btn btn-small btn-default">
		  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		</button>
		<p class='button-text'>main</p>
	</div>
	
	<div class='btn-bottom'>
	    	<button type="submit" class="btn btn-small btn-default" name='action' value='Cancel'>
	    	<input type="submit" class="btn btn-small btn-success" name='action' value='Preview' >
	    	<button type="submit" class="btn btn-small btn-primary" name='action' value='Update'>
	    	
	</div>


  </form>
</div>
</body>
</html


</body>
</html>