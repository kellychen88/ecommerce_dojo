<?php 

// var_dump($orders);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
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
      padding:30px;
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
   td{
      text-align: center;
   }
   #search_by_status{
      margin-bottom: 23px;
   }
   .pagination{
      margin-right: 38%;
      margin-left: 38%;
   }
  </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- // <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->


  

</head>
 
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
      <form action='/admin/filter_order' method='post' id='filter_form'>
        <select name="status_search">
          <option value="all"> Show All </option>
          <option value="shipped"> Shipped </option>
          <option value="process"> Order in progress </option>
          <option value="cancelled"> Cancelled </option>
          <!-- <input type='submit' value='Submit'> -->
        </select>
      </form>
    </div>
<?php
    // var_dump($orders);
?>    

    <div id='order_data'></div>


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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
  $(document).ready(function()
  {
    $(document).on('submit', 'form', function()
    { 
      var form = $(this);
      $.post(form.attr('action'),form.serialize(),function(data){
        $('#order_data').html(data);
      });
      return false;
    });

    //filter orders by status
    $(document).on('change', '#filter_form', function()
    {
      $(this).submit();
    });

    //change status (the form is inside the partial)
    $(document).on('change', '#change_status', function()
    {
      $(this).submit();
    });

    $('#filter_form').submit();
  });

  </script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- // <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>