<?php
include ('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email=$_POST['email'];
	$result=mysql_query("SELECT email FROM staffs WHERE email='$email'");
	//$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$count=mysql_num_rows($result);
	
	if($count==1)
	{
		$_SESSION['email']=$row["email"];
	}
	if($_POST["email"] == $row["email"])
	{
		mysql_query("UPDATE staffs set password='" . $_POST["newPassword"] . "' WHERE email='" . $_SESSION["email"] . "'");
		//echo "<script>alert('Password Changed');/script>";
		header('Location:profile.php');
	}
	else
	header('Location:forgetpass.html');
}
?>