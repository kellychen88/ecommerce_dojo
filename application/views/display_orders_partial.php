      <!-- Table -->
      <table class="table table-striped table-bordered">
        <thead>
          <th> Order ID </th>
          <th> Name </th>
          <th> Date </th>
          <th> Shipping Address </th>
          <th> Total </th>
          <th> Status </th>
        </thead>
        <tbody>
<?php
      foreach($orders as $order)
      {
?>
          <tr>
            <td><a href="/admin/single_order/<?=$order['order_id']?>"><?=$order['order_id']?></a></td>
            <td><?=$order['name']?></td>
            <td><?=$order['format_date']?></td>
            <td><?=$order['street_address']?> <?=$order['city_state']?> <?=$order['zipcode']?></td>
            <td>$<?=$order['amount']?></td>
            <td>
              <form action='/admin/edit_order_status' method='post' id='change_status'>
                <select name="status">
<?php 
                if($order['status'] == "shipped")
                  {
                    echo "<option value='shipped' selected> Shipped </option>";
                  }
                  else
                  {
                    echo "<option value='shipped'> Shipped </option>";
                  }  
                if($order['status'] == "process")
                  {
                    echo "<option value='process' selected> Order in Process </option>";
                  }
                  else
                  {
                    echo "<option value='process'> Order in process </option>";
                  }
                if($order['status'] == "cancelled")
                  {
                    echo "<option value='cancelled' selected> Cancelled </option>";
                  }
                  else
                  {
                    echo "<option value='cancelled'> Cancelled </option>";
                  }
?> 
                </select>
                <input type='hidden' name='order_id' value="<?=$order['order_id'];?>">                
                <!-- <input type='submit' value='submit'> -->
              </form>
              
            </td>
          </tr>
<?php
      }
?>            
        </tbody>
      </table>