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
<script src="lib/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
<link rel="icon" href="img/icon.png">
<title>Codon Genomics</title>
</head>
<style>
form label{
display: inline-block;
width: 100px;
font-size:18px;
}
</style>
<script type="text/javascript">
function clearFields() {
    document.getElementById("name").value=""
    document.getElementById("address").value=""
	document.getElementById("phone").value=""
}
</script>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1><img src="img/codongenomics.png" width="247"></h1>
    <a href="#panel" data-icon="bars">Admin</a>
    </div>

	<div data-role="navbar">
		<ul>
		<li><a href="admin.php" data-icon="home" class="ui-btn-active ui-state-persist">Home</a></li>
		<li><a href="mypage.php" data-icon="heart" data-transition="flow">About</a></li>
        <li><a href="assign.php" data-icon="alert" data-transition="flow">Assign</a></li>
		<!--<li><a href="#" data-icon="gear">Setup</a></li>-->
		</ul>
	</div>
    
<div data-role="panel" data-display="overlay" id="panel">
    <h3>Personal Details</h3>
	<ul data-role="listview" data-inset="false">
		<li><a href="adprofile.php" data-direction="reverse">Profile</a></li>
        <li><a href="adminlogout.php" data-direction="reverse" data-ajax="false">Log Out</a></li>
    </ul>
</div>

  <div data-role="main" class="ui-content">
  	<h1>Profile</h1>
    <form data-ajax="false" id="myForm" name="myForm" method="post" action="adupdate.php">
  	<hr><br/><br/>
    <?php
  //retrieve email from form 
  		$result = mysql_query("SELECT * FROM admin") or die ("Error running MySQL query");
  
  		$row = mysql_fetch_assoc($result);
    ?>
    
  	<label for="name">Admin Name:</label>
    <input name="name" type="text" id="name" size="50" value ="<?php echo $row['name']; ?>" required><br/>
    
    <label for="email">Email:</label>
    <input name="email" type="email" id="email" size="50" value ="<?php echo $row['email']; ?>"readonly ><br/>
    
  	<label for="address">Address:</label>
    <input name="address" type="text" id="address" size="50" value ="<?php echo $row['address']; ?>" required><br/>
    
  	<label for="phone">Phone No:</label>
    <input name="phone" type="text" id="phone" size="50" value ="<?php echo $row['phone']; ?>" required><br/>
    
    <label for="phone">Password:</label>
    <input name="phone" type="password" id="password" size="50" value ="<?php echo $row['password']; ?>" readonly>
    
   <div data-role="controlgroup" data-type="horizontal">
    <p><input type="submit" id="save" value="Save"></p>
    </div>
    </form>
  </div>
  
  <div data-role="footer" data-position="fixed">
    <p style="font-weight:normal; font-size:12px" >&copy; 2014 Codon Genomics Sdn. Bhd. All rights reserved.</p>
  </div>
</div> 

</body>
</html>
