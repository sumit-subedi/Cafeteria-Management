<?php
  if (isset($_GET['del'])){
    // code...
    $var = $_GET['id'];
    $table = $_GET['table'];

    include('connection.php');

    mysqli_query($conn,"Delete FROM {$table} where id = '$var'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);

  }

 ?>
