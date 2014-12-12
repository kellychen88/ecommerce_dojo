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
*/		.navbar-default{
		    background-color: #98cdf2;
		    border-color: #E7E7E7;
		}
		body{
			padding: 70px;
		}
		.container-main{
    		white-space: nowrap;
    		max-width: 99%;
    		width: 1500px;
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
			display: block;
			margin-top: -10px; width:400px;
			/*border: 1px solid gray;*/
			white-space: normal;
			margin-left: 258px;
			margin-top: -100px;

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
		.header{
			display:inline-block;
			vertical-align: top;
			width: 800px;
		}
	

		
		.sort{margin: 10px 0px 10px 53px;}
		.sort{
			float:right;
		}
		.sort{
			display: inline-block;
		}
		.pagination
		{
			position:absolute;
			margin-top: -40px;
			display:inline-block;
			margin-right: 10%;
			margin-left: 665px;
		}
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

?>
	<div class="container-main">
			<div class='left-sidebar'>
				<form name='search' action='/products/search' method='post'>
					<input class='' type='text' name='search-product' placeholder='product name'>
				      <!-- <span><a href="/products/show/" class="glyphicon glyphicon-search" role="button"></a></span>  -->
				    <span><input type="submit" class="glyphicon glyphicon-search" name='search'></span>
				</form>
				      	<!-- <a href="#" class="btn btn-default" role="button">Button</a></p> -->
				<!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
				<h5>Categories</h5>
				<ul>
			 <?php 	
				for($i = count($category) - 1; $i >= 0; $i--)
					  {
					  	$cat_name=$category[$i]['name'];
					  	$cat_id=$category[$i]['id'];
			            echo "<li class='category'><a href='/products/show/". $cat_id ."/". $cat_name ."'>".$cat_name.'</a></li>';		   
				}	
			?>
					<li class='category show-all'><a href='/products/show/all/All Products'>Show All</a></li>
				</ul>
			</div>
			<div class='header'>
				<h2> 
<?php 				
					if(isset($name))
						{
							echo $name;
						}
						else
						{
							echo "All Products";
						}
					if($this->input->get('page'))
						{ 
							$page = $this->input->get('page');
						}
						else
						{
							$page = 1;
						}
?>
					(page <?=$page?>)
				</h2>
			    <nav>
<?php
			      $this_total = count($product);
			      if($this->input->get('limit')){$this_limit = $this->input->get('limit');}else{$this_limit = 8;};
			      if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
			      $last = ceil( $this_total / $this_limit );
			      $start = 1;
			      $end = $last;
			      $class = "";

?>
			      <ul class = "pagination">
			          <li class="<?php if($page == 1){echo 'disabled';}?>">
			          <a href= "?limit=<?=$this_limit?>&page=<?=($page-1)?>">&laquo;</a>
			        </li>
<?php      
			      if ( $start > 1 ) 
			      {
?>        
			          <li><a href="?limit=<?=$this_limit?>&page=1">1</a></li>
			          <li class="disabled"><span>...</span></li>
<?php          
			      }
			      
			      for ( $i = $start ; $i <= $end; $i++ ) 
			      {
			          if( $page == $i ){ $class = "active"; }
?>          
			          <li class="'<?=$class?>'"><a href="?limit=<?=$this_limit?>&page=<?=$i?>"><?= $i ?></a></li>
<?php          
			      }
			      
			      if ( $end < $last )
			       {
?>        
			          <li class="disabled"><span>...</span></li>
			          <li><a href="?limit='<?=$this_limit?>'&page=<?=$last?>"><?=$last?></a></li>
<?php          
			      }
?>
					  <li class="<?php if( $page == $last ){echo 'disabled';}?>">
			          <a href= "?limit=<?=$this_limit?>&page=<?=($page+1)?>">&raquo;</a></li>   
			      </ul>
			   	</nav>	
		
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
		<div class="main">   	
<?php		   	
		   	for($i = count($each_page) - 1; $i >= 0; $i--)
		   	{		
		   	 	$prod_id=$each_page[$i]['id'];
		   		$prod_name=$each_page[$i]['name'];
		   		$prod_price=$each_page[$i]['price'];
		   		// $prod_image=$product[$i]['main_path'];
		   		// $sub_path=substr($prod_image, 4, strlen($prod_image)-1);

		   		echo "<div class='product'>";
		   		echo "<a href='/products/prod_details'></a>";
		   		// echo "<a href='/products/prod_details/$prod_id'><img src='../../".$sub_path."'></a>";
		   		echo "<p class='price'><span>".$prod_price."</span></p>";
		   		echo "<p class='prod_name'>".$prod_name."</p>";
		   		echo "</div>"; 
		   	}			
?>
		</div> <!-- end of main div -->

	</div>	<!-- end of container main div -->


</body>
</html>