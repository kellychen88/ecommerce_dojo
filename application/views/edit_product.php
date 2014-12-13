<?php
// var_dump($product);
// var_dump($images);
// var_dump($category_id);
// var_dump($category);
// var_dump($cat_assigned);

if(isset($cat_assigned)){
	echo 'The following categories are assigned to the product:<br>';
	foreach ($cat_assigned as $cat){
		echo ' - '.$cat['name'].'<br>';
	}
}

if(isset($error)) {echo $error;}
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

</head>
<body>

<div id='container'>
	<h3 id='header-text'>Edit Product - <?=$product['id']?></h3>

  	<a href='/admin/products' class="btn btn-remove btn-small btn-default">
  		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
  	</a>
	<div id='details'>
   		<form action='/admin/update' method='post' enctype="multipart/form-data">
			<div class='name-div'>
				<div class='name'>	
					<span class='title'>Name</span>
					<input class='display-name' type='text' name='name' placeholder='name' value="<?=$product['name'];?>">
				</div>
				<div>
					<span class='title'>Description</span>
					<input class='display-desc' type='textarea' name='description' value="<?=$product['description'];?>">
				</div>

				<div class='price-div'>	
					<span class='title'>Price ($)</span>
					<input class='display-price' type='text' name='price' placeholder='$...' value="<?=$product['price'];?>">
				</div>
				<div>	
					<span class='title'>Quantity</span>
					<input class='display-qty' type='text' name='quantity' placeholder='1,2,3,...' value="<?=$product['inventory_count'];?>">
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

			  		if ($catid==$category_id['category_id']){
		            	echo "<option selected value='".$catid."' >".$catname.'</option>';
			  		}
			  		else {
		            	echo "<option value='".$catid."' >".$catname.'</option>';
			  		}
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
			
<?php 		foreach($images as $image)
			{ 	?>			
			<div class='hover-images' id='<?=$image['ID']?>'>
			<!-- <div class='images'> -->
				<button type="button" class="btn btn-small btn-default btn-drag" aria-label="Left Align">
					<span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
				</button>		
				<div class='thumbnail'><img src="<?=$image['image_path']?>" alt="Hat" height="42" width="42"></div> 
				<!-- <div class='hover-images'><img src="../../assets/square.jpg" alt="Hat" height="42" width="42"></div>  -->
				<p class='button-text'><?=$image['filename']?></p>
				<a href="/admin/delete_img/<?=$image['id']?>/<?=$product['id']?>" class="btn btn-small btn-default btn-trash">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>

<?php 		// Ensure the previously selected main image is already checked (leave all others unchecked)
				if ($image['main']==1)
				{   ?>
				<input class='check-box' type="checkbox" name='main_img_id' value="<?=$image['id']?>" checked>

<?php			}
				else 
				{	?>
				<input class='check-box' type="checkbox" name='main_img_id' value="<?=$image['id']?>">
<?php			} 	?>
				<input type='hidden' name='img_id' value="<?=$image['id']?>">
				<input type='hidden' name='image_IDs[]' value="<?=$image['id']?>">
				<input type='hidden' name='image_names[]' value="<?=$image['filename']?>">
				<input type='hidden' name='image_paths[]' value="<?=$image['image_path']?>">
				<p class='button-text'>main</p>
			</div>

<?php		} ?>
			<input type='hidden' name='product_id' value="<?=$product['id']?>">
			<div class='btn-bottom'>
		    	<a href='/admin/products' type="button" class="btn btn-small btn-default" name='action' value='Cancel'>Cancel</a>
		    	<input type="submit" class="btn btn-small btn-success" name='action' value='Preview' >
		    	<input type="submit" class="btn btn-small btn-primary" name='action' value='Edit'>
			</div>
		</form>
	</div> <!-- end of details div -->
</div> <!-- end of container div -->
</body>
</html>
