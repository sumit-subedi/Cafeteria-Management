<?php session_start(); ?>
<?php
include 'connection.php';
$id =$_POST['id'];

$result = mysqli_query($conn,"SELECT name FROM table_info WHERE id  = '$id'");

$row = mysqli_fetch_array($result);

$name = $row[0];
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
      <form method="post" action="edittable.php">
    <table width="342" border="0">
      <tr>
        <td width="107">Table Id:</td>
        <td width="315"><input type="text" name="id" readonly="readonly" value="<?php echo $id; ?>" /></td>

      </tr>
      <tr>
        <td>Table Name:</td>
        <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
        </tr>
       <tr>

    		<td><input type="submit" name="save" value="Edit"  /></td>
    	</tr>
    </table>

<?php
if (isset($_POST['save'])) {
  $name = $_POST['name'];


  mysqli_query($conn,"UPDATE table_info set Name = '$name' where id = '$id';");
  header('location:tables.php');
}

 ?>

  </div>
  </body>
</html>
