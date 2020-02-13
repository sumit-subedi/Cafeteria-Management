<?php session_start(); ?>
<?php
include 'connection.php';
$id =$_POST['id'];

$result = mysqli_query($conn,"SELECT * FROM menu WHERE id  = $id");

$row = mysqli_fetch_array($result);

$name = $row[1];
$price = $row[2];
$category = $row['groupn'];


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
      <form method="post" action="edit.php">
    <table width="342" border="0">
      <tr>
        <td width="107">Item Id:</td>
        <td width="315"><input type="text" name="id" readonly="readonly" value="<?php echo $id; ?>" /></td>

      </tr>
      <tr>
        <td>Item Name:</td>
        <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
        </tr>
        <tr>
        <td>Item Price:</td>
        <td><input type="text" name="price"value="<?php echo $price; ?>" /></td>
        </tr>
        <tr>
        <td>Select Category :
          <select name="type">
            <option value="nonveg">Non-Veg</option>
            <option value="veg">Veg</option>
            <option value="colddrink">Cold Drink</option>
            <option value="coffee">Coffee</option>
</td>

      </tr>

     <tr>

    		<td><input type="submit" name="save" value="Edit"  /></td>
    	</tr>
    </table>

<?php
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['type'];

  mysqli_query($conn,"UPDATE menu set Name = '$name', Price = '$price', groupn = '$category' where id = '$id';");
header('location:admin_menu.php');
}

 ?>

  </div>
  </body>
</html>
