<?php
session_start();
 
$_SESSION['email'] = $_POST['email'];  
?>
<html>
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
<script type = "text/javascript">

</script>

</head>

<body>

<form data-ajax="false" id="myForm" name="myForm" method="post" action="addstaff.php">


<?php
	include('connect.php');
	$id = mysql_real_escape_string($_SESSION['s_id']);
	$name = mysql_real_escape_string($_SESSION['name']);
	$eml = mysql_real_escape_string($_SESSION['email']);
	$pass = mysql_real_escape_string($_POST['password']);
	
	mysql_query("INSERT INTO staffs(s_id, name, email, password) VALUES ('%s',' ', '$eml', '$pass')") or die ("Error inserting data into table");
	header('Location:mypage.php');
	
	//closes specified connection
	mysql_close($conn);
		
?>

</form>
</body>
</html>
