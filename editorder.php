<?php session_start(); ?>
<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css"/>
    <title>Edit Order</title>
  </head>
  <body style="background-color:lightgreen;">
    <div id="edit_body" style="width:800px;">


       <p><h1>Value Update</h1></p>
       <div  style="float:right;
         height: 330px;
         width:600px;
         margin-right: 100px;

           background:rgba(0,0,0,0);">
           <h2>Select items</h2>


         <div  style="height:230px;
          overflow:auto;
          border: 2px solid black;
           background:rgba(0,0,0,0);">




       <?php
       if (isset($_POST['Edit'])) {
         // code...

       $id = $_POST['id'];

       $items = mysqli_query($conn,"select itemid,quantity from ordered_item where ordid = '$id';");
$x = 0;
echo "<span id='right' style='font-size:25px;margin-left:22px;'>Name</span>
<span id='left' style='font-size:25px;'>Quantity</span>";
while (($x < 6 and $item = mysqli_fetch_array($items)) or $x < 6)
{


          $result = mysqli_query($conn,"select name from menu;");
          $namearray = mysqli_query($conn,"select name from menu where id =". $item['itemid']);
          $name = mysqli_fetch_assoc($namearray);

          echo "<form method='post' action='editorder.php'>";

            echo "<input id='right' type='text' name='name".$x."' value ='{$name['name']}'
            list='items'placeholder = 'Enter the item . . . '>
            <input type='hidden' name = 'id' value = '{$id}'>
            <input id='left' type='number' name='quantity".$x."' value ='{$item['quantity']}'>
              <datalist id='items' name='items' >";

  while($row = mysqli_fetch_assoc($result)) {
      echo "<option> {$row['name']} </option>";


  }
  echo "</datalist>";


$x ++;
}

}
        ?>
      </div>
    </div>
        <div><input type="submit" name="submit" value="Confirm your edit" style="margin-left: 0px;width:500px;height:42px;font-size:30px;background-color:lightblue;"></div>

</form>
     </div>
     <?php
       if (isset($_POST['submit'])) {
         $x = 0;
         $id = $_POST['id'];

       if ($_POST['name0'] != null && $_POST['quantity0'] != null){

         $list = mysqli_query($conn,"select orderdate,ordertime,tid,emp_id from orders where id ='$id'");

         $data = mysqli_fetch_assoc($list);

         $date = $data['orderdate'];
         $time = $data['ordertime'];
         $tid = $data['tid'];
         $eid = $data['emp_id'];

mysqli_query($conn,"delete from orders where id ='$id'");

         mysqli_query($conn,
 "insert into orders values ('$id','$date', '$time' , '$tid' , '$eid',false);");

         while ($x < 6) {
           $nam = name.$x;
           $quantity = quantity.$x;
           if ($_POST[$nam] != null && $_POST[$quantity] != null) {
             $name = $_POST[$nam];
             $quantity = $_POST[$quantity];

             $foodid = mysqli_query($conn,"select id from menu where name = '$name';");
             $itemid = mysqli_fetch_array($foodid);
             $foodid = $itemid[0];


             mysqli_query($conn,"insert into ordered_item  values('$id', $foodid, '$quantity')");
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

  </body>
</html>
