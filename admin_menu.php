<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Edit Menu</title>
  </head>
  <body >
    <div id="bd" style="background: linear-gradient(120deg, #16170E 20%, #747272  50% ,#1B1B1C 90%);">
    <div  id="header">
      <div id="head"><b>Hamro Cafeteria</b></div>

      <a href="adminhome.php"><button class="button" id="button" >  Home </button> </a>
    </div>
    <br> <br>



    <h1 style="margin-left:400px;margin-bottom:5px;color:green;"><em><u>Menu </u></em></h1>

    <?php
    include('connection.php');
    $item = mysqli_query($conn,"SELECT * from menu order by id");



    // Echo  non-veg items on menu
    echo '
    <div style="float:left;">
    <table>
      <th id="tableh">Item No.</th>
      <th id="tableh">Name </th>

      <th id="tableh">Price</th>
      <th id="tableh">Group</th>
      ';
      $i = 1;
      while($row = mysqli_fetch_array($item)) {

    echo ' <a href="#"> <tr id="tble"><td id="tabledata">'.$i.'.  '.$row[0].'</td>
      <td id="tabledata">'.$row[1].'</td>
      <td id="tabledata">'.'Rs.'.$row[2].'</td>
      <td id="tabledata">'.$row[3].'</td>
      <td><form method="get" action="delete.php">
    <input type="hidden" name="id" value="'.$row[0].'">
    <input type="hidden" name="table" value="menu">
    <input type="submit" value="delete" id="del" name="del">
</form></td>
<td><form method="post" action="edit.php">
<input type="hidden" name="id" value="'.$row[0].'">

<input type="submit" value="edit" id="del" name="edit">
</form></td>
      </tr></a>';
      $i = $i+1;
    }
  echo'  </table>
    </div>';


    ?>





    <div id="jdiv" style="display:none;margin-top:0px;height:350px;">
      	<button onclick="myFunction()" id="close";> X </button>

      <form action="admin_menu.php" method="post">
        <div><span id="text">Enter the unique number for item :</span>
        <input type="number" name="idno" min="1" max="99999"></div>

        <div><span id="text">Enter the name of food item :</span>
        <input type="text" name="name"></div>

        <div><span id="text">Enter the price of food item :</span>
        <input type="number" name="price"></div>
<br>

        Select Category :
          <select name="Category">
            <option value="nonveg">Non-Veg</option>
            <option value="veg">Veg</option>
            <option value="colddrink">Cold Drink</option>
            <option value="coffee">Coffee</option>




        <input type="submit" name="button" value="Submit" style="display:inline;">



      </form>

    </div>

    <?php

      if (isset($_POST['button'])){

        $id = $_POST['idno'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['Category'];

        if ($id == null ){
          echo "<script type='text/javascript'>alert('NUll id not available');</script>";
        }

        $result = mysqli_query($conn,"SELECT Name FROM menu WHERE id = '$id'");
         $row = mysqli_fetch_array($result);
        if($result->num_rows == 1) {
          echo "<script type='text/javascript'>alert('id already exist');</script>";
      }

      mysqli_query($conn,"Insert into menu values ('$id','$name','$price','$type')");
      header("location:admin_menu.php");
    }


    mysqli_close($conn);
      ?>

    <div onclick="myFunction()"><button style="width:150px;height:50px;font-size:20px;margin-top:80px;margin-left:150px;">
      Add new item </button></div>

    <script >
      function myFunction() {

        var x = document.getElementById("jdiv");
        if (x.style.display == "none") {
          x.style.display = "block";
          x.style.animation="pop 2s normal"; }
        else {
            x.style.display = "none";
          }
      }
    </script>
</div>
  </body>
</html>
