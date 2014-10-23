<?php
include("connect.php");
session_start();

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
<link rel="Logo icon" href="img/icon.png">
<title>Codon Genomics</title>
</head>
<style>
form label{
display: inline-block;
width: 100px;
font-size:18px;
}
</style>
<script type = "text/javascript">
function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

function validatePassword() {
//var staffid,newPassword,confirmPassword,output = true;
var email = parseInt(document.myForm.email.value);
var newPassword = parseInt(document.myForm.newPassword.value);
var confirmPassword = parseInt(document.myForm.confirmPassword.value);
var invalid = " "; // Invalid character is a space
var minLength = 6; // Minimum length

//staffid = document.myForm.staffid;
//newPassword = document.myForm.newPassword;
//confirmPassword = document.myForm.confirmPassword;

	if (myForm.email.value == "")
	{
		myForm.email.focus();
		sweetAlert("Oops...","You did not enter Email Address.\n" + "Please enter now.","error");
		return false;
	}
	if (document.myForm.newPassword.value.length < minLength) 
	{
		myForm.newPassword.focus();
		myForm.newPassword.select();
		sweetAlert("Sorry...","Your password must be at least " + minLength + " characters long.\n" + "Try again.","error");
		return false;
	}

	// check for spaces
	if (document.myForm.newPassword.value.indexOf(invalid) > -1)
	{	
		myForm.newPassword.focus();
		myForm.newPassword.select();
		sweetAlert("Sorry...", "Spaces are not allowed.","error");
		return false;
	}

	if (myForm.newPassword.value != myForm.confirmPassword.value)
	{
		myForm.newPassword.focus();
		myForm.newPassword.select();
		sweetAlert("Sorry...","You did not enter the same new password twice.\n" + "Please re-enter both now.","error");
		return false;
	}

	else {
		alert("You have successfully change your password.\n" + "Sign in now.");
		return true;
      }
}
</script>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1><img src="img/codongenomics.png" width="247"></h1>
    <a href="#panel" data-icon="bars"><?php echo $_SESSION['email']?></a>
    </div>

	<div data-role="navbar">
		<ul>
		<li><a href="user.php" data-icon="home" class="ui-btn-active ui-state-persist">Home</a></li>
		<li><a href="userpage.php" data-icon="heart" data-transition="flow">About</a></li>
        <li><a href="#help" data-icon="alert" data-transition="flow">Help</a></li>
		<!--<li><a href="#" data-icon="gear">Setup</a></li>-->
		</ul>
	</div>
    
<div data-role="panel" data-display="overlay" id="panel">
    <h3>Personal Details</h3>
	<ul data-role="listview" data-inset="false">
		<li><a href="profile.php" data-direction="reverse">Profile</a></li>
		<li><a href="resetpass.php" data-direction="reverse">Change Password</a></li>
        <li><a href="logout.php" data-direction="reverse" data-ajax="false">Log Out</a></li>
    </ul>
</div>

  	<div data-role="main" class="ui-content">
  	<h1>Reset Password</h1>
    <form data-ajax="false" id="myForm" name="myForm" method="post" action="reset.php">
  	<hr><br/>
    <?php
  //retrieve email from form
  		$eml = $_SESSION['email'];
  
  		$result = mysql_query("SELECT * FROM staffs WHERE email = '$eml'") or die ("Error running MySQL query");
  
  		$row = mysql_fetch_assoc($result);
    ?>
    
    
    <label for="email">Email:</label>
    <input name="email" type="email" id="email" size="50" value ="<?php echo $row['email']; ?>"readonly ><br/>
    
  	<label for="password">New Password:</label>
    <input type="password" name="newPassword" id="newPassword" placeholder="Password" required/><br/>
    
  	<label for="password1">Confirm Password:</label>
    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required/><br/>
    
    <div data-role="controlgroup" data-type="horizontal">
    <button type="submit" class="btn btn-signup">Save</button>
    </div>
    </form>
    </div>
  
  <div data-role="footer" data-position="fixed">
    <p style="font-weight:normal; font-size:12px" >&copy; 2014 Codon Genomics Sdn. Bhd. All rights reserved.</p>
  </div>
</div> 

</body>
</html>
