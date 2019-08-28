<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>TravelManagementSystem||Admin</title>



<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->

<?php include('function.php'); ?>
<?php
$_SESSION['loginstatus']="";
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="select * from users where Username='" . $_POST["t1"] . "' and Pwd='" . $_POST["t2"] ."'";
	
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
$data=mysqli_fetch_array($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["Username"]= $_POST["t1"];
		$_SESSION["usertype"]=$data[2];
		$_SESSION['loginstatus']="yes";
		header("location:index.php");
	}
	else
	{
	echo "<script>alert('Invalid User Name or Password');</script>";
}
}
?>




<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Admin <span>Page</span></span></h1>
		</div>
		<form method="post">
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>

			<input type="text" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" />
		
			<br/>
			<label for="password">Password</label>
			<br/>
		
			<input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password" />
			<br/>
			

			<input type="submit" value="LOGIN" name="sbmt" />

			<br/>
			
		</div>
	</div>
	</form>

	<!--
<form method="post">
<table border="0" width="500px" height="400px" align="left" class="tableshadow">
<tr><td colspan="2" class="toptd"><img src="adminpics/lo.jpg" width="550px" height="100px" /></td></tr>

<tr><td><img src="adminpics/gggh.jpg" width="200px" height="200px" /></td>
<td class="lefttxt"><table border="0" width="100px" height="200px">
	<td>User Name</td></td><td>
	<input type="text" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" /></td></tr>
<tr><td class="lefttxt">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password" /></td></tr></table>
<tr><td></td><td align="center" ><input type="submit" value="LOGIN" name="sbmt" /></td></tr>
</table>
</form>

-->

</div>


</div>
</body>
</html>


