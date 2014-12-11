<?php
  // var_dump($products);
?>
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
   table{
    margin-top: 26px;
   }
   .table-bordered{
    border: 1px solid #000;
   }
   img{
    height: 100px;
    width: 150px;
   }
   td, th{
      /*border-right: 1px solid black;*/
      border-color: black;
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
  #add_new>button{
    border-radius: 4px;
  }
  </style>
  <body>
    
    <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="/products/index">Dojo eCommerce</a></li>
                <li><a href="/admin/display">Orders</a></li>
                <li><a href="/admin/products">Products</a></li>
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
    <div id="add_new">
      <button><a href="/admin/add"> Add new product </a></button>
    </div>
    <div class="table-responsive"></div>
      <!-- Table -->
      <table class="table table-bordered">
        <thead>
          <th> Picture </th>
          <th> ID </th>
          <th> Name </th>
          <th> Inventory Count </th>
          <th> Quantity sold </th>
          <th> Action </th>
        </thead>
        <tbody>
<?php
          foreach($products as $product)
          {
            // $prod_image = $product['image_path'];
            // $sub_path = substr($prod_image, 4, strlen($prod_image)-1);
?> 
          <tr>
            <!-- <td><img src='../../<?=$sub_path?>'></td> -->
            <td></td>
            <td><?=$product['id']?></td>
            <td><?=$product['name']?></td>
            <td><?=$product['inventory_count']?> hours </td>
            <td><?=$product['quantity_sold']?> hours </td>
            <td>
              <a href="/admin/edit/<?=$product['id']?>"> Edit </a>
              <a href="/admin/delete/<?=$product['id']?>"> Delete </a>
            </td>
          </tr>
<?php
            }
?>          
        </tbody>
      </table>
     </div> 
    <nav>

<?php
      $this_total = count($all);
      if($this->input->get('limit')){$this_limit = $this->input->get('limit');}else{$this_limit = 4;};
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
      
      if ( $end < $last ) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>