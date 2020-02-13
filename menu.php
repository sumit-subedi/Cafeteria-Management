<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="styling.css"/>
    <title> MENU </title>
  </head>
  <body>
    <div id="bd">

       <div id="header" style="background-color:orange;">
        <div id="title" style="width:125px;"> MENU </div>
        <a href="hello.php"><div id="title" style="width:100px;float:right;margin-right:100px;">Home</div></a>
      </div>

      <div id="body" style="animation:mymove 50s infinite;height:800px;background-image: url(download.jpg);background-size: cover;position:relative;">
          <div id="jdiv" style="width:90%;padding-left: 0px;margin-left:5%;height:90%;display:block;">

            <?php
            include('connection.php');

              $nonvegitem = mysqli_query($conn,"SELECT Name,Price from menu where groupn='nonveg'");



              // Echo  non-veg items on menu
              echo '
              <div style="width:500px;float:left;">
              <table>
                <tr><th id="tableh">Non-Veg Items</th>
                <th id="tableh">Price</th>
                </tr>';
                $i = 1;
                while($row = mysqli_fetch_array($nonvegitem)) {

              echo '  <tr><td id="tabledata">'.$i.'.  '.$row[0].'</td>
                <td id="tabledata">'.$row[1].'</td>
                </tr>';
                $i = $i+1;
              }
            echo'  </table>
              </div>';

              $vegitem = mysqli_query($conn,"SELECT Name,Price from menu where groupn='veg'");
              echo "Successful";
              // Echo veg items on menu
            echo '<div style="float:left;width:500px;height:200px;">
            <table>
              <tr><th id="tableh">Veg Items</th>
              <th id="tableh">Price</th>
              </tr>';
              $i = 1;
              while($row = mysqli_fetch_array($vegitem)) {
            echo '  <tr><td id="tabledata">'.$i.'.  '.$row[0].'</td>
              <td id="tabledata">'.$row[1].'</td>
              </tr>';
            }
            $i++;
          echo'  </table>
            </div>';


            $colddrinks = mysqli_query($conn,"SELECT Name,Price from menu where groupn='colddrink'");

            // Cold drinks from menu
            echo '
            <div style="width:500px;float:left;">
            <table>
              <tr><th id="tableh">Cold Drinks</th>
              <th id="tableh">Price</th>
              </tr>';
              $i = 1;
              while($row = mysqli_fetch_array($colddrinks)) {

            echo '  <tr><td id="tabledata">'.$i.'.  '.$row[0].'</td>
              <td id="tabledata">'.$row[1].'</td>
              </tr>';
              $i = $i+1;
            }
          echo'  </table>
            </div>';


            $coffee = mysqli_query($conn,"SELECT Name,Price from menu where groupn='coffee'");
            // Coffe available
            echo '
            <div style="width:500px;float:left;">
            <table>
              <tr><th id="tableh">Coffee</th>
              <th id="tableh">Price</th>
              </tr>';
              $i = 1;
              while($row = mysqli_fetch_array($coffee)) {

            echo '  <tr><td id="tabledata">'.$i.'.  '.$row[0].'</td>
              <td id="tabledata">'.$row[1].'</td>
              </tr>';
              $i = $i+1;
            }
          echo'  </table>
            </div>';
echo "<div style='width:800px;'>  <a href='order.php'><button id='del' style='width:150px;font-size:25px;height:50px;'>Place Order</button></a> </div>
    </div>";
              mysqli_close($conn);
              ?>
          <!-- </div>
      </div>
<br>
 -->



  </body>
</html>
