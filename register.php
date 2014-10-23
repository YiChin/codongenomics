<?php
session_start();
$_SESSION['email'] = $_POST['email'];  
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />

<title>Codon Genomics</title>
<link rel="Logo icon" href="img/icon.png">
<script type = "text/javascript">

</script>

</head>

<body>

<form data-ajax="false" id="myForm" name="myForm" method="post" action="register.php" >

<?php
	include('connect.php');
	$id = mysql_real_escape_string($_SESSION['s_id']);
	$name = mysql_real_escape_string($_SESSION['name']);
	$eml = mysql_real_escape_string($_SESSION['email']);
	$pass = mysql_real_escape_string($_POST['password']);
	
	mysql_query("INSERT INTO staffs(s_id, name, email, password) VALUES ('%s',' ', '$eml', '$pass')") or die ("Error inserting data into table");
	header('Location:login.php');
	
	//closes specified connection
	mysql_close($conn);
		
?>

</form>

</body>
</html>
