<?php session_start(); ?>
<?php
include 'connection.php';
$id =$_POST['id'];

$result = mysqli_query($conn,"SELECT * FROM emp WHERE id  = $id");

$row = mysqli_fetch_array($result);

$fname = $row[1];
$mname = $row[2];
$lname = $row[3];
$age = $row[4];
$sex = $row[5];
$position = $row[6];
$salary = $row[7];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css"/>
    <title>Edit</title>
  </head>
  <body style="background-color:lightgreen;">
  <div id="edit_body">


     <p><h1>Value Update</h1></p>

      <form method="post" action="editemp.php">

        <div>Item Id:
        <input type="text" name="id" readonly="readonly" value="<?php echo "$id";?>" /></div>


      <div>  First Name:
        <input type="text" name="fname" value="<?php echo $fname; ?>"/></div>

      <div>  Middle Name:
        <input type="text" name="mname"value="<?php echo $mname; ?>" /></div>

        <div>Last Name:
        <input type="text" name="lname"value="<?php echo $lname; ?>" /></div>

      <div>  Age:
        <input type="number" name="age" value="<?php echo $age; ?>" /></div>
    <div>Genger:<br>
            <input type="radio" name="gender" value="M" checked> Male<br>
            <input type="radio" name="gender" value="F"> Female<br>
            <input type="radio" name="gender" value="T"> Other </div>
            <div>  Position:
              <input type="text" name="position" value="<?php echo $position; ?>" /></div>
              <div>  Age:
                <input type="number" name="salary" value="<?php echo $salary; ?>" /></div>
    		<input type="submit" name="save" value="Edit"  />
</form>

        <?php
        if (isset($_POST['save'])) {
          $fname = $_POST['fname'];
          $mname = $_POST['mname'];
          $lname = $_POST['lname'];
          $age = $_POST['age'];
          $sex = $_POST['gender'];
          $position = $_POST['position'];
          $salary = $_POST['salary'];


          mysqli_query($conn,"UPDATE emp set fname = '$fname', mname = '$mname', lname = '$lname', age = '$age', sex = '$sex',position = '$position', salary = '$salary' where id = '$id';");
          header('location:employee.php');
        }

         ?>


  </div>
  </body>
</html>
