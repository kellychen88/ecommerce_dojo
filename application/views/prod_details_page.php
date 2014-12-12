<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>(Cart Page) Shopping Cart | Dojo eCommerce</title>
	<!-- <link rel="icon" href=".icon"> -->
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<meta name="description" content="coding dojo assignment">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Arthur">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="scripts/bootstrap/css/bootstrap.min.css"> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- // <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script> -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<!-- // <script type="text/javascript" scr="scripts/bootstrap/js/bootstrap.min.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
	<style type="text/css">
		.navbar-default{
		    background-color: #98cdf2;
		    border-color: #E7E7E7;
		}
		.container-main{padding-left: 20px;}
		.left-section{width:350px; display: inline-block; vertical-align: top;}
		.right-section{width: 500px; display: inline-block; vertical-align: top; margin-top: 40px;}
		.right-section p{font-size: 18px;}
		.product{
			position: relative;
			display: inline-block;
			margin-right:20px;
		}
		body{
			padding: 70px;
		}
		.thumbnail1{width:300px; margin: 10px;}
		.main-img{ height:300px; width:300px;}
		.thumbnail-img{ height:50px; width:50px; display: inline;}

		.related-img{ height:120px; width:120px;}
		.price {
			/*text-align: right;*/
			position: absolute;
			top:95px;
			left:0px;
			width:100%;
			height: 25px;
			font-size: 15px;
			/*background-color: black;*/
			color: white; 
			background: rgb(0, 0, 0); /* fallback color */
			background: rgba(0, 0, 0, 0.5);
			text-align: right;
			padding-right:10px;
		}
		.buy-qty{margin-left: 320px}
		.prod_name{font-size: 15px; margin-bottom: 20px;}
		.select-qty{width:60%; display: inline-block;}
		.buy-btn{display: inline-block;}

	</style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Dojo eCommerce</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shopping Cart (5) <span class="caret"></span></a> -->
          <a href="/products/carts">Shopping Cart (5)</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php 
var_dump($category);  var_dump($cat_name);   //die();
		$main_subpath=substr($product['main_path'], 4, strlen($product['main_path'])-1);
?>
<div class='container-main'>
	<div class='left-section'>
		<a href='/products/show/<?=$category['category_id'] ?>/<?=$cat_name['name'] ?> '>Go Back</a>
		<h1><?= $product['name'] ?></h1>
		<img class='main-img' src='../../<?= $main_subpath ?> '>
		<div class='thumbnail1'>
			<?php 
				
				for($i = count($image) - 1; $i >= 0; $i--) {
					$image_subpath=substr($image[$i]['image_path'], 4, strlen($image[$i]['image_path'])-1);
					echo "<a><img class='thumbnail-img' src='../../". $image_subpath ."'></a>"; 
				}
			?>
		</div>
	</div>
	<div class='right-section'>
		<p><?=$product['description'] ?> </p>		<!-- <p>voluptate ipsum natus praesentium quia provident itaque commodi a, unde vel pariatur vero adipisci. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, totam, impedit. Excepturi quibusdam beatae inventore odit unde accusamus autem, quisquam necessitatibus nam qui illo officiis, eveniet nostrum porro rerum, molestias. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, quis vitae rem inventore ut distinctio repellat est maiores dolorem, consequuntur obcaecati dolor quae eaque tempore amet ducimus non maxime dolorum.</p> -->
		<form action='/admin/products' name='buy' method='post'>
			<div class='form-group buy-qty' name='buy' method='post'>
				<select class='form-control select-qty' name='qty'>

					<option value="1">1 (<?=$product['price']?>)</option>
					<option value="2">2 (<?=$product['price']*2?>)</option>
					<option value="3">3 (<?=$product['price']*3?>)</option>

				</select>
				<button class='btn btn-primary buy-btn'>Buy</button>
			</div>
		</form>
	</div>
	<div class='similar-items'>
		<h2>Similar Items</h2>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
		<div class='product'>
			<a href='#'><img class='related-img' src="../../assets/demo_img.jpg"></a>
			<p class='price' id=''><span>$19.99</span></p>
			<p class='prod_name'>Black Belt</p>
		</div>
	</div>



</div>
</body>
</html>