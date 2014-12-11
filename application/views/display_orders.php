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
   .table-responsive{
     border-radius: 4px;

   }
   .table-bordered>th>td {
      border: 2px solid black;
      border-radius: 4px;
      color:black;
   }
   thead{
      background-color: darkgray;
   }
   #search_by_status{
      margin-bottom: 23px;
   }
   .pagination{
      margin-right: 38%;
      margin-left: 38%;
   }
  </style>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="/products/index">Dojo eCommerce</a></li>
            <li><a href="/admin/display">Orders</a></li>
            <li><a href="/admin/products/">Products</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/index">Log Off</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div id="search_by_status">
      <select value="status_search">
        <option name="all"> Show All </option>
        <option name="shipped"> Shipped </option>
        <option name="proces"> Order in progress </option>
        <option name="cancelled"> Cancelled </option>
      </select>
    </div>
      <!-- Table -->
      <table class="table table-striped table-bordered">
        <thead>
          <th> Order ID </th>
          <th> Name </th>
          <th> Date </th>
          <th> Billing Address </th>
          <th> Total </th>
          <th> Status </th>
        </thead>
        <tbody>
          <tr>
            <td><a href="/admin/single_order"> 100 </a></td>
            <td> Bob </td>
            <td> 9/6/2014 </td>
            <td> 123 dojo way Bellevue WA 98005 </td>
            <td> $149.99 </td>
            <td>
              <select value="status">
                <option name="shipped"> Shipped </option>
                <option name="proces"> Order in process </option>
                <option name="cancelled"> Cancelled </option>
              </select>
            </td>
          </tr>
          <tr>
            <td><a href="/admin/single_order"> 99 </a></td>
            <td> Joe </td>
            <td> 9/6/2014 </td>
            <td> 123 dojo way Bellevue WA 98005 </td>
            <td> $29.99 </td>
            <td>
              <select value="status">
                <option name="shipped"> Shipped </option>
                <option name="proces"> Order in process </option>
                <option name="cancelled"> Cancelled </option>
              </select>
            </td>
          </tr>
          <tr>
            <td><a href="/admin/single_order"> 98 </a></td>
            <td> Joey </td>
            <td> 9/6/2014 </td>
            <td> 123 dojo way Bellevue WA 98005 </td>
            <td> $4.99 </td>
            <td>
              <select value="status">
                <option name="shipped"> Shipped </option>
                <option name="proces"> Order in process </option>
                <option name="cancelled"> Cancelled </option>
              </select>
            </td>
          </tr>
          <tr>
            <td><a href="/admin/single_order"> 97 </a></td>
            <td> Bob </td>
            <td> 9/6/2014 </td>
            <td> 123 dojo way Bellevue WA 98005 </td>
            <td> $19.99 </td>
            <td>
              <select value="status">
                <option name="shipped"> Shipped </option>
                <option name="proces"> Order in process </option>
                <option name="cancelled"> Cancelled </option>
              </select>
            </td>
          </tr>
          <tr>
            <td><a href="/admin/single_order"> 51 </a></td>
            <td> Bob </td>
            <td> 9/6/2014 </td>
            <td> 123 dojo way Bellevue WA 98005 </td>
            <td> $99.99 </td>
            <td>
              <select value="status">
                <option name="shipped"> Shipped </option>
                <option name="proces"> Order in process </option>
                <option name="cancelled"> Cancelled </option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
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