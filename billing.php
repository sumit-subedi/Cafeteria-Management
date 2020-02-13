<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Prepare Bill</title>
  </head>
  <body>
    <div id="bd" style="height:700px;">
    <?php include('connection.php');
    $id = $_POST['id'];?>
      <div id="header" style="background-color:orange;">
       <div id="title" style="width:125px;"> MENU </div>
       <a href="hello.php"><div id="title" style="width:100px;float:right;margin-right:100px;">Home</div></a>
      </div>

        <div id="body" style="animation:mymove 50s infinite;height:600px;background-image: url(download.jpg);background-size: cover;position:relative;">
          <div id="jdiv" style="display:block;">
            <?php

             if (isset($_POST['Bill'])) {
            echo "<div >
                   <div >
                       <div >
                           <div >
                               <h1 ><center><strong>Order summary</strong></center></h1>
                               <h3>Invoice Number : {$id}</h3>
                           </div>
                           <div >
                               <div >
                                   <table style='width:700px;margin-left: 50px;'>
                                       <thead>
                                           <tr>
                                               <td class='tablehead'><strong>Item Name</strong></td>
                                               <td class='tablehead'><strong>Item Price</strong></td>
                                               <td class='tablehead'><strong>Item Quantity</strong></td>
                                               <td class='tablehead'><strong>Total</strong></td>
                                           </tr>
                      </thead>
                      <tbody>";

                          $id = $_POST['id'];
                          $y = 0;
                          $query = mysqli_query($conn,"select menu.name,menu.price,ordered_item.quantity
                              from menu,ordered_item
                              where ordered_item.ordid = '$id' and ordered_item.itemid = menu.id;");
                            while ($row = mysqli_fetch_assoc($query)) {
                              echo "<tr><td id='tabledatas'>{$row['name']}</td>
                              <td id='tabledatas'>{$row['price']}</td>
                              <td id='tabledatas'>{$row['quantity']}</td>";
                              $x = $row['price'] * $row['quantity'];
                              $y = $y + $x;
                            echo "  <td id='tabledatas'>{$x}</td></tr>";
                            }
                                              echo "<tr>
                                               <td></td>
                                               <td ></td>
                                               <td id='tabledatas'><strong>Subtotal</strong></td>
                                               <td id='tabledatas'>{$y}</td>
                                           </tr>
                                           <tr>
                                               <td ></td>
                                               <td></td>";
                                               $z = 0.2 * $y;
                                               $x = $y + $z;
                                               echo "<td id='tabledatas'><strong>Service Charge</strong></td>
                                               <td id='tabledatas'>{$z}</td>
                                           </tr>
                                           <tr>
                                               <td ><i></i></td>
                                               <td ></td>
                                               <td id='tabledatas'><strong>Total</strong></td>
                                               <td id='tabledatas'>{$x}</td>
                                           </tr>

                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>";
               }
               ?>
               <form action="billing.php" method="post">
                 <input type="hidden" value="<?php echo $id; ?> " name="id">
              <div><input type="submit" id="del" value="Confirm Payment" name="submit" style="font-size: 25px;width:300px;height:60px;margin:20px 0px 0px 200px;">
                 </div>
               </form>
                <?php
                    if (isset($_POST['submit'])) {
                      $id = $_POST['id'];

                      mysqli_query($conn,"update orders set billed = true where id = {$id};");
                      $table = mysqli_query($conn,"select tid from orders where id = {$id};");
                      $tid = mysqli_fetch_assoc($table);
                      $ttid = $tid['tid'];

                       mysqli_query($conn,"update table_info set occupied = 0 where id = '$ttid';");

                      header('location:order.php');
                    }


                 ?>
              </div>
    </div>
           </div>


  </body>
</html>
