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
<link rel="stylesheet" type="text/css" href="print.css" media="print"/>
<link rel="stylesheet" href="print-qr.css" type="text/css" media="screen, projection" />
<title>Codon Genomics</title>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1><img src="img/codongenomics.png" width="247"></h1>
    <a href="#panel" data-icon="bars"><?php echo $_SESSION['email']?></a>
    </div>

	<div data-role="navbar">
		<ul>
		<li><a href="user.php" data-icon="home">Home</a></li>
		<li><a href="userpage.php" data-icon="heart" data-transition="flow" class="ui-btn-active ui-state-persist">About</a></li>
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
  </br>
    <form sata-ajax="false" action="" method="post" name="myForm" id="myForm" onSubmit="return validate();">
    <div class="staff"><table width='800' border='0' cellspacing='0' align='center'>
    <?php $_SESSION['pro_name'] = $_GET['pro_name'];$_SESSION['pro_id'] = $_GET['pro_id'];?>
    <tr>
      <td colspan ='2'>Project Details</td>
    </tr>
    <tr>
      <td width="42%"><?php echo "Project ID: ".$_GET['pro_id'];?></td>
      <td width="58%">Project Card</td>
    </tr>
    <tr>
      <td><?php echo "Project Name: ".$_GET['pro_name'];?></td>
    </tr>
    <tr>
      <td></td>
      <td><div class ="print">
	<?php
	include ("phpqrcode/qrlib.php");

	$param = $_GET['pro_name'];
	$codeText = $param;

	$filename="temp".session_id().".png";
	QRcode::png($codeText,$filename, 'L', 5, 2);
	echo '<img src="'.$filename.'" />';
	?><a href="javascript:window.print()"><img src="img/print.jpg" alt="print" id="print-button" align="right" /></div></td>
    </tr>

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
