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

	$(function(){
      $("#div1").html('<a href="example.html">Link</a><b>hello</b>');
      $("#div2").text('<a href="example.html">Link</a><b>hello</b>');
    });

	  $(document).ready(function(){
			$("select").hover(function(){
	    	$("select").css("background-color","yellow");
	    		},function(){
	    			$("select").css("background-color","pink");
			  });

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

			$("select > option").hover(function ()
			{
			         alert($target.attr("value"));//Will alert id if it has id attribute
			         alert($target.text());//Will alert the text of the option
			         alert($target.val());//Will alert the value of the option
			     
			});
	}); //end doc. ready



	</script>
</head>
<body>
	<div id="div1"></div>
	<div id="div2"></div>

<div id='container'>
  <h3 id='header-text'>Edit Product - ID 2</h3>
  <button type="button" id='hearder-remove' class="btn btn-small btn-default">
  	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
  </button>


  <div id='details'>
   <form action='' method='post'>
	<div class='name-div'>
		<div class='name'>	
			<span class='title'>Name</span>
			<input class='display-name' type='text' name='name' placeholder='name'>
		</div>
		<div>
			<span class='title'>Description</span>
			<input class='display-desc' type='textarea' name='desc' value='Great Fit, Cool new colors'>
		</div>
	</div>

	<div class='cat'>
		<span class='title'>Categories</span>
		<select class='display-cat' name='cat' >
		  <option value='shirt' >Shirt</option>
		  <option value='hat' selected>Hat</option>
		  <option value='mug'>Mug</option>
		  <option value='pant'>Pant</option>
		  <option value='key-chain'>Key Chain</option>
		  <option value='belt'>Belt</option>
		</select>
		
		<div class='div-product' contentEditable="true">
			<!-- <input class='display-product' type='textarea' name='show-product' placeholder='Hat<br>Mug<br>' > -->
			<textarea class='display-product' name='show-product' placeholder='Hat,Mug...'> </textarea>
			<button type="button" class="btn btn-mini btn-default btn-product"> 
		  		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			</button>
			<button type="button" class="btn btn-mini btn-default">
		  		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			</button>
		</div>
	</div>
	
	<div>
		<span class='title'>or add new category</span>
		<input class='display-new' type='text' name='add_cat' placeholder='add new category'>
	</div>

	<div>	
		<span class='title'>Images</span>
		<input type='file' class='display-upload' name='upload' value='Upload'></button>
		<!-- <input type="file" class="btn btn-default display-upload" name='upload' value='Upload'></button> -->
	</div>

	<div class='icons'>
		<button type="button" class="btn  btn-small btn-default" aria-label="Left Align">
		  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
		</button>

		<!-- <button type="button" class="btn btn-small btn-default hover-image"> -->
		  <div class='hover-images'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div> 
		  <!-- <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> -->
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
<!-- 	<div class=" btn-group btn-group-justified" role="group" aria-label="...">
	 	<div class="btn-group" role="group"> -->
	    	<button type="button" class="btn btn-small btn-default" >
	    		<a href='/' >Cancel</a></button>
<!-- 	  	</div>
	  	<div class="btn-group" role="group"> -->
	    	<button type="button" class="btn btn-small btn-success" >
	    		<a href='/' class='preview' target="_blank">Preview</a></button>
<!-- 	  	</div>
	  	<div class="btn-group" role="group"> -->
	    	<button type="submit" class="btn btn-small btn-primary" >
	    		<a href='/' >Update</a></button>
	  <!-- 	</div> -->
	</div>


  </form>
</div>
</body>
</html


</body>
</html>