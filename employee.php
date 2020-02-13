<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Employee Details</title>
  </head>
  <body>
    <div id="bd" >

      <div  id="header" style="height:100px;background: linear-gradient(120deg, #16170E 20%, #747272  50% ,#1B1B1C 90%);" >
        <div id="head"><b>Hamro Cafeteria</b></div>

        <a href="adminhome.php"><button class="button" id="button" >  Home </button> </a>
      </div>

      <div id="body" style="background-color:silver;margin-top:2px;">
        <h1 style="margin-left:400px;margin-bottom:5px;color:green;"><em><u>Employee Details</u></em></h1>


            <div id="jdiv" style="display:none;margin-top:0px;height:500px;background-color:lightgreen;">
              	<button onclick="myFunction()" id="close";> X </button>

              <form action="employee.php" method="post">

                <div><span id="text">Enter the unique number for employee :</span>
                <input type="number" name="id" min="1" max="999"></div>

                <div><span id="text">Enter the first name of employee :</span>
                <input type="text" name="fname"></div>

                <div><span id="text">Enter the middle name of employee(if any) :</span>
                <input type="text" name="mname"></div>

                <div><span id="text">Enter the last name of employee :</span>
                <input type="text" name="lname"></div>

                <div><span id="text">Enter the age of employee :</span>
                <input type="text" name="age"></div>

              <div>  <p id="text">  Select gender of employee :</p>
                    <select name="gender">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="T">Transgender</option>
                    </div>




                <div><span id="text">Enter the salary of employee :</span>
                <input type="number" name="salary"></div>



         <p id="text">Enter the position of employee on cafeteria:</p>

            <select name="position">
              <option value="cashier">Cashier</option>
              <option value="waiter">Waiter</option>
              <option value="manager">Manager</option>
              <option value="cook">Cook</option>
              <option value="dishwasher">Dish Washer</option>

<br><br>

                <input type="submit" name="button" value="Submit" style="display:inline;width:100px;height:50px;">



              </form>

            </div>
<?php

$item = mysqli_query($conn,"SELECT * from emp order by fname");



// Echo  non-veg items on menu
echo '
<div style="float:left;">
<table>
  <th id="tablehe">Employee id.</th>
  <th id="tablehe">F.Name </th>
  <th id="tablehe">M.Name </th>
  <th id="tablehe">L.Name</th>
  <th id="tablehe">Age</th>
  <th id="tablehe">Gender</th>
  <th id="tablehe">Position </th>
  <th id="tablehe">Salary</th>
  ';
  $i = 1;
  while($row = mysqli_fetch_array($item)) {

echo ' <a href="#"> <tr id="tble"><td id="tabledata">'.$i.'.  '.$row[0].'</td>
  <td id="tabledata">'.$row[1].'</td>
  <td id="tabledata">'.$row[2].'</td>
  <td id="tabledata">'.$row[3].'</td>
  <td id="tabledata">'.$row[4].'</td>
  <td id="tabledata">'.$row[5].'</td>
  <td id="tabledata">'.$row[6].'</td>
  <td id="tabledata">'.$row[7].'</td>
  <td><form method="get" action="delete.php">
<input type="hidden" name="id" value="'.$row[0].'">
<input type="hidden" name="table" value="emp">
<input type="submit" value="delete" id="del" name="del">
</form></td>
<td><form method="post" action="editemp.php">
<input type="hidden" name="id" value="'.$row[0].'">

<input type="submit" value="edit" id="del" name="edit">
</form></td>
  </tr></a>';
  $i = $i+1;
}
echo'  </table>
</div>';


?>
<?php

  if (isset($_POST['button'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
echo "$id $fname $mname $gender $salary $position";
    if ($id == null ){
      echo "<script type='text/javascript'>alert('NUll id not available');</script>";
    }

    $result = mysqli_query($conn,"SELECT fname FROM emp WHERE id = '$id'");
     $row = mysqli_fetch_array($result);
    if($result->num_rows == 1) {
      echo "<script type='text/javascript'>alert('id already exist');</script>";
  }

  mysqli_query($conn,"Insert into emp values ('$id','$fname', '$mname','$lname', '$age', '$gender', '$position', '$salary' )");
  header("location:employee.php");
 }


mysqli_close($conn);
  ?>

<div onclick="myFunction()"><button id="butto">
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
    </div>

  </body>
</html>
