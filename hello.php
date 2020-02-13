
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css"/>
<title>Home Page </title>
</head>
<body >

<div id="bd">

		<!-- Header -->
		<div  id="header" style="background-color:orange;">
			<div id="title">Hamro Cafeteria</div>
			<a href="#"><h3 style="float: right;color: red;margin-right: 30px;
			margin-top: 40px;text-decoration: none;">About the developer</h3></a>
		</div>




		<div id="body" style="background-image: url(download.jpg);background-size:contain;">

				<a href="menu.php">	<div class="menu"> MENU
							<p style="color: black;font-size: 25px;margin:0px;">	See our menu</p>
					</div></a>

				<a href="order.php">	<div class="menu" style="width:200px;">ORDER
						<p style="color: black;font-size: 25px;margin:0px;">	Order food online</p>
					</div></a>

			<button class="button" onclick="myFunction()">  Log In  </button>

			<!-- Login Popup Window -->
			<div id="jdiv" style="display:none;">
				<button onclick="myFunction()" id="close";> X </button>

				<!-- Login username -->
				<form action="hello.php" method="post" autocomplete="on">
					<div id="form" >USER NAME : </div>
					 <input type="text" id="input" placeholder="Enter your username" name="user_name">

					 <!-- Login Password -->
					 <div id="form" >PASSWORD :  </div>
					  <input type="password" autocomplete="off" id="input" placeholder="Enter password" name="password">

						<!-- Error message -->
						<div id="error"; style="font-size:25px;
						background-color: lightgray;width: 400px;color:red;
						margin-left:20px;padding:0px;display:none;">Incorrect username or password </div>

						<!-- confirm button -->
					<input type="Submit" value="confirm" name="submit" style="background-color: white;width:13%;
					margin-left: 50px;margin-top: 25px;padding: 2px;font-size:25px;"/>

				</form>


			</div>


			<!-- Data retrieved and handeled from form -->
			<?php
			if (isset($_POST['submit'])){
					$name = $_POST['user_name'];
					$password = $_POST['password'];
					if ($name == "sumit" && $password == "subedi"){
						header('location:adminhome.php');

					}
					else {
						echo'<script type="text/javascript">',
						  'var y = document.getElementById("error");',
						  'y.style.display="block";',
						"</script>";

						echo'<script type="text/javascript">',
						  'var y = document.getElementById("jdiv");',
						  'y.style.display="block";',
						"</script>";

					}
				}
	 ?>

	 <!-- Make the login window popup -->
			<script >
				function myFunction() {
					var y = document.getElementById("error");
					y.style.display = "none";
					var x = document.getElementById("jdiv");
					if (x.style.display == "none") {
						x.style.display = "block";
						x.style.animation="pop 2s normal"; }
					else {
							x.style.display = "none";
						}
				}
				function play(){
					document.getElementById("jdiv").style.display = "block";
				}
			</script>



			 <a href="billing.php"><div class="menu" style="width:250px;">BILLING
				 <p style="color: red;font-size: 25px;margin:0px;">	Prepare The Bill</p>
			 </div></a>

			<div class="menu" style="width:250px;margin-top:115px;">About Us
					<p style="color: red;font-size: 25px;margin:0px;">Know About Us</p>
				 </div>
			</div>
		<div style="clear:both;"></div>

		<!-- Footer Part -->
			<footer id="footer">
					<div  style="float:left;"> <span class="foot">Contact Us At</span>
						<p class="foot" style="font-size:20px;width:200px;">Jalahali,Banglore-097</p>
						<p class="foot" style="font-size:20px"> 998 045 678 </p>
					 </div>

					 <div class="foot" style="float:left;"> Follow Us On

					</div>
			</footer>

		</div>
	</div>




</body>
</html>
