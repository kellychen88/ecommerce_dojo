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
</head>
<style>
	body{
		padding: 70px;
	}
</style>
<body>
	<h2>Admin Login Page</h2>

  <form action='/admin/display' method='post'>    
    <input type='hidden' name='action' value='login' />
    <p>Email Address:<input type='text' name='email' /></p>
    <p>Password:<input type='password' name='password' /></p>
    <input type='submit' value='Login' class="btn btn-default"/>
  </form>


</body>
</html>