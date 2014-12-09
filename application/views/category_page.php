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
/*		.container-main{margin:10px 0px 0px 20px;}
*/		
		.container-main{
    		white-space: nowrap;
    		max-width: 99%;
    		}
		.left-sidebar{
			/*width: 230px; */
			display: inline-block; vertical-align: top;
			border:1px solid gray; padding:10px;
			margin-left:10px;
			margin-top: 10px;
		}
		.main {
			display: inline-block; vertical-align: top; 
			margin-top: -10px; width:400px;
			/*border: 1px solid gray;*/
			white-space: normal;

		}
		.show-all{
			font-style: italic;
		}
		.category{
			list-style-type: none;
			text-indent: -30px;
		}
		.product{
			position: relative;
			display: inline-block;
			margin-right:10px;
		}
		img{ height:200px; width:200px;}
		.price {
			/*text-align: right;*/
			position: absolute;
			top:170px;
			left:0px;
			width:100%;
			height: 30px;
			font-size: 20px;
			/*background-color: black;*/
			color: white; 
			background: rgb(0, 0, 0); /* fallback color */
			background: rgba(0, 0, 0, 0.5);
			text-align: right;
			padding-right:10px;
		}
		.prod_name{font-size: 20px; margin-bottom: 20px;}
		.main{
			width:900px;
			padding:0px 20px;
		}

		.header h2, .pages{vertical-align: top;}

		.pages{
			margin-left:350px;
			margin-top:20px;
		}
		.pages, h2{
			display:inline-block;
		}
		.pages ul{
			list-style-type: none;
		}
		.pages ul li{
			border-right:1px solid gray;
			display: inline-block;
			padding: 0px 15px;
		}
		.pages ul li:last-child{
			border-right:none;
		}
		.sort{margin: 10px 0px 10px 53px;}
		.sort p, .sort form, .sort-form {display: inline-block;}
		.sort-form{margin-left:10px;}
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
	          <a href="#">Shopping Cart (5)</a>
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
	
	<div class="container-main">
		<!-- <div class='row col-md-12 col-xs-12'> -->
			<!-- <div class='left-sidebar col-xs-2 col-md-2'> -->
			<div class='left-sidebar'>
				<input class='' type='text' placeholder='product name'>
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				<h5>Categories</h5>
				<ul>
					<li class='category'><a href='#'>Tshirt</a></li>
					<li class='category'><a href='#'>Shoes</a></li>
					<li class='category'><a href='#'>Cups</a></li>
					<li class='category'><a href='#'>Fruits</a></li>
					<li class='category show-all'><a href='#'>Show All</a></li>
				</ul>
			</div> <!-- end of left-sidebar div-->
			<!-- <div class='main container col-xs-9 col-md-9'> -->
			<div class='main'>
				<div class='header'>
					<h2>Tshirts (Page 2)</h2>
					<div class='pages'>
						<ul>
							<li><a href='#'>first</a></li>
							<li><a href='#'>prev</a></li>
							<li>2</li>
							<li><a href='#'>next</a></li>
						</ul>
						<div class='sort'>
							<p>Sorted by </p>
							<form>
								<select class='sort-form'>
									<option value='sort_price'>Price</option>
									<option value='sort_popular'>Most Popular</option>
								</select>
							</form>
						</div>
					</div>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
				<div class='product'>
					<a href='#'><img src="../../assets/demo_img.jpg"></a>
					<p class='price' id=''><span>$19.99</span></p>
					<p class='prod_name'>Black Belt</p>
				</div>
			<!-- </div> -->
			</div> <!-- end of main div -->
	</div>	<!-- end of container main div -->


</body>
</html>