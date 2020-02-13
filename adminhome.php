<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
      <link rel="stylesheet" href="styling.css"/>
    <title>Admin</title>
  </head>
  <body>
    <div id="bd" style="background-image:url(dark3.jpg);background-size:cover;">
      <div  id="header">
        <div id="head"><b>Hamro Cafeteria</b></div>

        <a href="hello.php"><button class="button" id="button" >  Log Out  </button> </a>
      </div>

    <div id="body" style="margin-top:100px;position:relative;">
      <div style="margin-left:200px;"> <span  style="color:white;font-size:40px;">
        <b><i> Welcome admin of Hamro Cafe to your website </i></b></span> </div>
      <div style="margin-left:450px;" class="w3-tangerine"><span style="color:purple;font-size:70px;">
      <i>  Here you can </i> </span></div>

    <div>
      <a href="admin_menu.php"><div class="adminmenu" id="menus"> <b> Menu </b>
        <p class="w3-tangerine" id="desc">View,Edit or Delete menu items </p>
      </div> </a>

      <a href="employee.php"><div class="adminmenu" id="menus"> <b style="font-size:25px;"> Employees </b>
        <p class="w3-tangerine" id="desc">View or Edit Employee details</p>
      </div></a>

      <div class="adminmenu" id="menus"> <b> Orders </b>
        <p class="w3-tangerine" id="desc">View,Edit or Delete menu items </p>
      </div>

      <a href="tables.php"><div class="adminmenu" id="menus"> <b> Tables </b>
        <p class="w3-tangerine" id="desc">Manage Table Details </p>
      </div></a>


    </div>

  </div>
</div>
  </body>
</html>
