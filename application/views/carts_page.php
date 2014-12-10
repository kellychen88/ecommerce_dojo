<!DOCTYPE html>
<html>
<head>
	<title>(Cart Page) Shopping Cart | Dojo eCommerce</title>
	<!-- <link rel="stylesheet" type="text/css" href="_____.css"> -->
	<!-- <style type="text/css"></style> -->
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
		body{
			padding: 70px;
		}
		.container{margin-bottom: 20px}
		.total{text-align: right;}
		.row-spacing{padding-top:20px;}

		/* CSS that needs to fine-tune */
		thead{background-color: gray;}
		#checkbox{margin-left: 6px; font-size: 14px;}
		#expiration input {
			width: 60px; display: inline-block; 
			margin:0px, 30px 0px 0px; 
		}
		.shipping{margin-top:0px;}
		.slash{display:inline-block; font-size:20px; margin-top: 2px; color: gray;}
		#expiration input, .slash{vertical-align: top;}


		/* CSS that refuses to work */
		.navbar-brand, .dropdown-toggle{color: white;}
		/*.expiration{display: inline;}*/
		/*#expiration{border: solid 1px gray;}*/
	
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
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shopping Cart (5) <span class="caret"></span></a>
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

	<div class="container">
		<div class='cart-table'>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</thead>
				<tbody>
					<tr>
						<td>Black Belt for Staff</td>
						<td>$19.99</td>
						<td>1</td>
						<td>$19.99</td>
					</tr>
					<tr>
						<td>Black Belt for Staff</td>
						<td>$19.99</td>
						<td>1</td>
						<td>$19.99</td>
					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>
						<td><br></td>
					</tr>				
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>
						<td><br></td>
					</tr>				
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>
						<td><br></td>
					</tr>				
				</tbody>
			</table>
			<div class='total-btn pull-right'>
				<p class='total'>Total: $49.96</p>
				<button type="button" class="btn btn-success navbar-btn green-btn">Continue Shopping</button>
			</div>
		</div> <!-- end of "cart-table" div -->
		<div class='information'>
			<h2 class='row shipping col-md-12 col-xs-12'>Shipping Information</h2>
			<form role="form" action='/user_main/pay'>
				<div class="form-group row">
			  		<div class='col-md-2 col-xs-2'><label>First Name: </label></div>
			    	<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="first_name_ship" placeholder="Enter first name"></div>
				</div>
				<div class="form-group row">
			  		<div class='col-md-2 col-xs-2'><label>Last Name: </label></div>
			    	<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="last_name_ship" placeholder="Enter last name"></div>
				</div>
				<div class="form-group row">
			  		<div class='col-md-2 col-xs-2'><label>Address: </label></div>
					<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="address1_ship" placeholder="Enter address"></div>
			  	</div>
				<div class="form-group row">
			  		<div class='col-md-2 col-xs-2'><label>Address 2: </label></div>
					<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="address2_ship" placeholder="Enter address"></div>
			  	</div>
			  	<h2 class='row row-spacing col-md-12 col-xs-12'>Billing Information</h2>
			  	<div class="form-group row" id='checkbox'>
			  		<div class="col-md-2 col-xs-2">
			  	    	<div class="checkbox">
			  	    	<input type="checkbox">Same as Shipping</div>
			  		</div>
			  	</div>	
		  		<div class="form-group row">
		  	  		<div class='col-md-2 col-xs-2'><label>First Name: </label></div>
		  	    	<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="first_name_bill"></div>
		  		</div>
		  		<div class="form-group row">
		  	  		<div class='col-md-2 col-xs-2'><label>Last Name: </label></div>
		  	    	<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="last_name_bill"></div>
		  		</div>
		  		<div class="form-group row">
		  	  		<div class='col-md-2 col-xs-2'><label>Address: </label></div>
		  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="address1_bill"></div>
		  	  	</div>
		  		<div class="form-group row">
		  	  		<div class='col-md-2 col-xs-2'><label>Address 2: </label></div>
		  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="address2_bill"></div>
		  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>City: </label></div>
	  	  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="city_bill"></div>
	  	  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>State: </label></div>
	  	  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="state_bill"></div>
	  	  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>Zipcode: </label></div>
	  	  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="zipcode_bill"></div>
	  	  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>Card: </label></div>
	  	  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="card"></div>
	  	  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>Security Code: </label></div>
	  	  			<div class='col-md-4 col-xs-4'><input type="text" class="form-control" name="security"></div>
	  	  	  	</div>
	  	  		<div class="form-group row">
	  	  	  		<div class='col-md-2 col-xs-2'><label>Expiration: </label></div>

	  	  			<div class='col-md-3 col-xs-3' id='expiration'>
						<input type="text" class="form-control col-md-1 col-xs-1" name="exp_month" placeholder="(mm)">
						<p class='slash col-md-1 col-xs-1'>/</p>
<!-- 						<span class='slash'>/</span> -->
						<input type="text" class="form-control col-md-1 col-xs-1" name="exp_year" placeholder="(year)">
	  	  			</div>
	  	  	  	</div>
				<div class='col-md-6 col-xs-6'>
			  		<button type="submit" class="btn btn-primary pull-right">Submit</button>
			  	</div>
			</form>
		</div>

	</div> <!-- end of main body div -->
</body>
</html>