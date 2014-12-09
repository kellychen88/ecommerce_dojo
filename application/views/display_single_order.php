<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  </head>
  <style type="text/css">

    .navbar-default .navbar-nav>li>a {
      color:white;
    }
    #navbar{
      border-color: red;
      background-color: darkgray;
      color: white;
    }
    .container-fluid{
       background-color: red!important;
       border-radius: 4px;
    }
   body{
      padding:70px;
   }
   .table-bordered{
      border: black solid 1px;
      border-radius: 4px;
      width: 300px;
      margin-left: 60px;
      padding: 20px;
    }
   thead{
      background-color: darkgray;
   }
   #search_by_status{
      margin-bottom: 23px;
   }
   .pagination {
      display: block;
      margin-left: 38%;
      margin-right: 38%;
   }
   .address{
    overflow: scroll;
   }
   #order_info {
    border: 1px solid #000;
    width: 250px;
    padding: 25px;
    border-radius: 4px;
    margin-left: 50px;
   }
   #shipping{
    margin-top: 20px;
   }
   #billing{
    margin-top: 20px;
   }
   p{
    margin-bottom: 0px;
   }
   #total{
    border: 1px solid #000;
    border-radius: 4px;
    padding: 10px;
    width:200px;
    margin-left: 80px;
  }
   #status{
    border: 1px solid #000;
    border-radius: 4px;
    display: inline-block;
    width: 200px;
    padding: 10px;
    background-color: green;
    color: black;
    margin-left: 80px;
   }
  </style>
  <body>

 <nav class="navbar navbar-default" role="navigation">
   <div class="container-fluid">
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li><a class="navbar-brand" href="#">Dojo eCommerce</a></li>
         <li><a href="/orders/index">Orders</a></li>
         <li><a href="/orders/products">Products</a></li>
       </ul>
       <form class="navbar-form navbar-right" role="search">
         <div class="form-group">
           <input type="text" class="form-control" placeholder="Search">
         </div>
         <button type="submit" class="btn btn-default">Submit</button>
       </form>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="#">Log Off</a></li>
       </ul>
     </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
 </nav>
 <div class="row" id="main">
    <div id="order_info" class="col-xs-6 col-sm-5 col-md-4">
      <p> Order ID: 1 </p>
      <p id="shipping"> Customer shipping info: </p>
      <p> Name: Bob </p>
      <p> Address: 123 Dojo Way </p>
      <p> City: Seattle </p>
      <p> State: WA </p>
      <p> Zip: 98133 </p>
      <p id="billing"> Customer billing info: </p>
      <p> Name Bob </p>
      <p> Address: 123 Dojo Way </p>
      <p> City: Seattle </p>
      <p> State: WA </p>
      <p> Zip: 98133 </p>
    </div>
      <!-- Table -->
    <div class="col-xs-6 col-sm-4 col-md-4">
      <table class="table table-bordered">
        <thead>
          <th> ID </th>
          <th> Item </th>
          <th> Price </th>
          <th> Quantity </th>
          <th> Total </th>
        </thead>
        <tbody>
          <tr>
            <td> 35 </td>
            <td> Cup </td>
            <td> $9.99 </td>
            <td> 1 </td>
            <td> $9.99 </td>
          </tr>
          <tr>
            <td> 215 </td>
            <td> shirt </td>
            <td> $19.99 </td>
            <td> 2 </td>
            <td> $39.98 </td>
          </tr>
        </tbody>
      </table>
    </div>  
    
    <div id="total" class="col-xs-6 col-sm-3 col-md-offset-3 col-md-4">
      <p> Sub total: $29.89 </p>
      <p> Shipping: $1.00 </p>
      <p> Total Price: $30.98 </p>
    </div>
    <div class="row">
      <div id="status" class="col-xs-6 col-md-offset-10 col-md-6">
        <p>Status: Shipped </p>
      </div>
    </div>  
  </div>  
    <nav>
      <ul class="pagination">
        <li class="disabled"><span aria-hidden="true">&laquo;</span></li>
        <li class="active"><span>1 <span class="sr-only">(current)</span></span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
      </ul>
    </nav>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>