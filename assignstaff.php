<?php
session_start();

//$_SESSION['l_id'] = $_POST['l_id'];  
$_SESSION['name'] = $_POST['name']; 
$_SESSION['email'] = $_POST['email'];
$_SESSION['pro_id'] = $_POST['pro_id']; 
$_SESSION['pro_name'] = $_POST['pro_name']; 

?>
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

<body>

<form data-ajax="false" id="myForm" name="myForm" method="post" action="assignstaff.php">


<?php
	include('connect.php');
	//$lid = mysql_real_escape_string($_SESSION['l_id']);
	$name = mysql_real_escape_string($_SESSION['name']);
	$email = mysql_real_escape_string($_SESSION['email']);
	$pro_id = mysql_real_escape_string($_SESSION['pro_id']);
	$pro_name = mysql_real_escape_string($_SESSION['pro_name']);
	$date = mysql_real_escape_string($_SESSION['date']);
	mysql_query("INSERT INTO staffs_pro (w_id ,name, email, pro_id, pro_name, date)VALUES (NULL,'$name','$email', '$pro_id', '$pro_name',CURDATE())") or die ("Error inserting data into table");
	header('Location:assign.php');
	
	//closes specified connection
	mysql_close($conn);
		
?>

</form>
</body>
</html>
