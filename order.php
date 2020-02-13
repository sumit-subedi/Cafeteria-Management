<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
      <link rel="stylesheet" href="styling.css"/>
    <title>Place your order</title>
  </head>
  <body>
    <div id="bd" style="height:700px;">
<?php include('connection.php'); ?>
      <div id="header" style="background-color:orange;">
       <div id="title" style="width:125px;"> MENU </div>
       <a href="hello.php"><div id="title" style="width:100px;float:right;margin-right:100px;">Home</div></a>
      </div>

        <div id="body" style="animation:mymove 50s infinite;height:600px;background-image: url(download.jpg);background-size: cover;position:relative;">

<div id="jdiv" style="display:block;margin-left:50px;float:left;width:700px;position:relative;">
  <h1>Place Your Order:</h1>
<form method="post" action="order.php">

  <div  style="float:right;
    height: 330px;
    width:600px;
    margin-right: 50px;

      background:rgba(0,0,0,0);">
  <h3>Select items</h3>


    <div  style="height:230px;
     overflow:auto;
     border: 2px solid black;
      background:rgba(0,0,0,0);">

     <?php

        $x = 0;
        $result = mysqli_query($conn,"select name from menu;");

        echo "<span id='right' style='font-size:25px;margin-left:22px;'>Name</span>
        <span id='left' style='font-size:25px;'>Quantity</span>";
        echo "<form>";
        while ($x < 6)
        {
          echo "<input id='right' type='text' name='name".$x."' list='items' placeholder = 'Enter the item . . . '>
          <input id='left' type='number' name='quantity".$x."'>
            <datalist id='items' name='items' >
";


while($row = mysqli_fetch_assoc($result)) {
    echo "<option> {$row['name']} </option>";


}
echo "</datalist>";
          $x ++;
        }

      ?>
    </div>
  </div>



    <div style="width:300px;height:50px;position:block;font-size:30px;"> Select table no :
      <select name="table">

          <?php
            $query = mysqli_query($conn,"select name from table_info where occupied = 0;");
            while($row = mysqli_fetch_assoc($query)) {
                echo "<option> {$row['name']} </option>";
              }
           ?>
         </div>
         <br><br>
         <hr>
         <div><input type="submit" name="submit" value="Confirm your order" style="margin:10px 0px 0px 20px;width:500px;height:42px;font-size:30px;background-color:lightblue;"></div>

</form>
      </div>

      <?php
        if (isset($_POST['submit'])) {
          $x = 0;
        if ($_POST['name0'] != null && $_POST['quantity0'] != null){
          $date = date("Y-m-d");
          $time = date("h:m:s");
          $table = $_POST['table'];
          $tid = mysqli_query($conn,"select id from table_info where name = '$table';");
          $row = mysqli_fetch_array($tid);
          $emp = mysqli_query($conn,"select id from emp where position = 'waiter' order by RAND() LIMIT 1");

          $emprow = mysqli_fetch_array($emp);


          mysqli_query($conn,
  "insert into orders(orderdate,ordertime,tid,emp_id,billed) values ('$date', '$time' , '$row[0]' , '$emprow[0]',false);");
  mysqli_query($conn,"update table_info set occupied = 1 where id = '$row[0]';");
$last_id = mysqli_insert_id($conn);

          while ($x < 6) {
            $nam = name.$x;
            $quantity = quantity.$x;
            if ($_POST[$nam] != null && $_POST[$quantity] != null) {
              $name = $_POST[$nam];
              $quantity = $_POST[$quantity];
              $id = mysqli_query($conn,"select id from menu where name = '$name';");
              $itemid = mysqli_fetch_array($id);
              $id = $itemid['id'];


              mysqli_query($conn,"insert into ordered_item(ordid,itemid,quantity)  values('$last_id', '$id', '$quantity')");
            }

            $x ++;
          }
        }
        else {
          echo "<script>alert('Invalid input')</script>";
        }
        header('location:order.php');
      }

       ?>

      <div  id="arko" style="display:block;float:left;width:350px;position:relative;margin-left:50px;">
        <button onclick="showfunction()">View unbilled orders</button>

        <div id="editdetails" style="width:350px;display:none;background-color:white;">
          <?php
            $query = mysqli_query($conn,"Select orders.id,table_info.name,orders.ordertime
            from orders,table_info
            where orders.tid = table_info.id and orders.billed = false;");
            while($row = mysqli_fetch_array($query)) {

                echo "<table style='border:2px solid black;width:300px;'>
                  <tr><th>Table Name </th>
                  <th style='width:150px;'>Order Time </th></tr>
                  <tr><td style='width:150px;padding-left:50px;'>{$row['name']}</td>
                  <td style='width:150px;'>{$row['ordertime']}</td></tr>

                  <tr><td><form method='post' action = 'editorder.php'>
                      <input type = 'hidden' value = ".$row['id']." name='id'>
                      <input type = 'submit' id='del' name='Edit' value='Edit Order' style='width:100px;display:inline;float:left;'>
                  </form></td>

                  <td><form method='post' action= 'billing.php' >
                      <input type = 'hidden' value = ".$row['id']." name='id'>
                      <input type='submit' id='del' name='Bill' value='Prepare Bill' style='width:100px;'>
                      </form>
                  </td></tr>
                </table>";
                echo "<br>";
              }

           ?>
        </div>

      </div>
      <script >
        function myFunction() {

          var x = document.getElementById("jdiv");
          if (x.style.display == "none") {
            x.style.display = "block";
            x.style.animation="pop 2s normal"; }
          else {
              // x.style.display = "none";

              // document.getElementById("arko").style.width = "900px";
            }
        }
        function showfunction(){
          document.getElementById("editdetails").style.display = "block";
        }
      </script>

    </div>

  </body>
</html>
