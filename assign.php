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
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1><img src="img/codongenomics.png" width="247"></h1>
    <a href="#panel" data-icon="bars">Admin</a>
    </div>

	<div data-role="navbar">
		<ul>
		<li><a href="admin.php" data-icon="home" >Home</a></li>
		<li><a href="mypage.php" data-icon="heart" data-transition="flow">About</a></li>
        <li><a href="assign.php" data-icon="alert" data-transition="flow" class="ui-btn-active ui-state-persist">Assign</a></li>
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
  	<form data-ajax="false" action="assign.php" method="post" name="myForm" id="myForm" onSubmit="return validate();"> 
    </br>
    <div data-role="controlgroup" data-type="horizontal">
    <input type="button" id="Assign Staff" value=" + Assign Staff" onClick="window.location.href='assign.html';"/>
    <input type="submit" id="delete" name="delete" value=" Delete" onclick = "return confirm('Do you want to delete this staff from database?');"/>
    </div>
    </br></br>
	<div class="staff"><table width='800' border='0' cellspacing='0' align='center'>
    <?php
	$result = mysql_query("SELECT * FROM staffs_pro ORDER BY email") or die("Error running MYSQL query");
	?>
	<tr>
	<td width="5%">#</td><td>Staff Name</td><td>Email</td><td>Project ID</td><td>Project Name</td>
	<td>Date</td></tr>

	<?php
		while($row = mysql_fetch_array($result))
	{?>

	<tr>
    <td align= 'center'><input name="checkbox[]" type="checkbox" id ="checkbox[]" value="<?php echo $row['email'];?>"></td>
	<td align= 'center'><?php echo $row['name'];?></td>
	<td align= 'center'><?php echo $row['email'];?></td>
	<td align= 'center'><?php echo $row['pro_id'];?></td>
	<td align= 'center'><?php echo $row['pro_name'];?></td>
	<td align= 'center'><?php echo $row['date'];?></td>

	</tr>

	<?php
	}
	?>
    
	<?php
	$count=mysql_num_rows($result);
	// Check if delete button active, start this 
	if(isset($_POST['delete']))
	{
		$checkbox = $_POST['checkbox'];

	for($i=0;$i<$count;$i++)
	{
		$del_id = $checkbox[$i];
		$sql = "DELETE FROM staffs_pro WHERE email='$del_id'";
		$result = mysql_query($sql);
	}
	// if successful redirect to delete_multiple.php 
	if($result)
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=assign.php\">";
		return false;
	}
	}
	mysql_close($conn);
	?>
    
	</table>
    </div>
    </form>
  </div>
  
  <div data-role="footer" data-position="fixed">
    <p style="font-weight:normal; font-size:12px" >&copy; 2014 Codon Genomics Sdn. Bhd. All rights reserved.</p>
  </div>
</div> 

</body>
</html>
