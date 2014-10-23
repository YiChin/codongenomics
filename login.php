<?php

include("connect.php");

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql=sprintf("SELECT email FROM staffs WHERE email='$email' and password='$password'");
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$count=mysql_num_rows($result);
	
	$sql1=sprintf("SELECT email FROM admin WHERE email='$email' and password='$password'");
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$count1=mysql_num_rows($result1);

	if($count==1)
	{
		
		$_SESSION['email']=$row["email"];
		header("location:user.php");
	}
	
	if($count1==1)
	{
		header("location:admin.php");
	}
	else 
	{
		$message = "Invalid Email Address or Password!";
		//echo ("alert<p align ='right'>invalid ID or password!</p>");
		echo "<script type='text/javascript'>alert('$message');</script>";
//require('index.php');
	}
}
mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/blue.min.css" />
<link rel="stylesheet" href="css/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
<script src="lib/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
<link rel="Logo icon" href="img/icon.png">
<title>Codon Genomics</title>
<script type = "text/javascript">
function Verify()
{
	var email =  parseInt(document.myForm.email.value);
	var pass =  parseInt(document.myForm.password.value);
	
	if (myForm.email.value == "")
	{	
		myForm.email.focus();
		sweetAlert("Oops...","You did not enter Email Address.\n" + "Please enter now.","error");
		return false;
	}
	

	if (myForm.password.value == "")
	{
		myForm.password.focus();
		sweetAlert("Oops...","You did not enter an Password.\n" + "Please enter now.","error");
		return false;
	}

	else return true;
}

</script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1><img src="img/codongenomics.png" width="247"></h1>
    </div>

	<div data-role="navbar">
		<ul>
		<li><a href="index.html" data-icon="home" data-transition="flow">Home</a></li>
		<li><a href="about.html" data-icon="star" data-transition="flow">About</a></li>
        <li><a href="signup.html" data-icon="edit" data-transition="flow">Sign Up</a></li>
        <li><a href="login.php" data-icon="lock" class="ui-btn-active ui-state-persist">Login</a></li>
        <li><a href="#contactus" data-icon="phone" data-transition="flow">Contact Us</a></li>
		<!--<li><a href="#" data-icon="gear">Setup</a></li>-->
		</ul>
	</div>

  <div data-role="main" class="ui-content">
    <p>Welcome Back!</p>
    <form data-ajax="false" method="post" action="login.php" name="myForm" id="myForm" onSubmit="return Verify();">
      <input type="text" name="email" id="email" data-clear-btn="true" placeholder="Email Address" />
      <input type="password" name="password" id="password" data-clear-btn="true" placeholder="Password" />
      <div data-role="controlgroup" data-type="horizontal">
      <p><input type="submit" value="Log In" class="ui-btn"></p>
      <p><a href="forgetpass.html" style="text-decoration:none; font-style:italic; font-size:12px">Forget your password?</a></p>
      <p>Don't have an account? <a href="signup.html" style="text-decoration:none;">Sign Up</a>
      </div>
    </form>
  </div>
  
  <div data-role="footer" data-position="fixed">
    <p style="font-weight:normal; font-size:12px" >&copy; 2014 Codon Genomics Sdn. Bhd. All rights reserved.</p>
  </div>
</div> 

</body>
</html>
