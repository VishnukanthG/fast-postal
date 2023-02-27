<?php 
session_start();
if(isset($_SESSION['admusername']))
			{
				
			}
else
	{
		header('location:index.php');
	}			
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer and Employee Browsing</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
<div id="container">
	<center><h2>Customer and Employee Browsing</h2></center>

	<center><img class="avatar" src="../images/1.png"></center>
	<form class="myform" action="browsec.php" method="post">
		<select name="bw" class="ipvalues2" required>
		
		<option value="emp">Employee</option>
		<option value="cust">Customer</option>
		 </select>
		 <br>
		 <br>
		 <input type="submit" name="submit_btn" id="register-button" value="Browse" />
		 <a href="index.php"><input type="button" id="back-button" value="Go Back" /></a>
		<br>
		 </form>
		 <?php 
		 if(isset($_POST['submit_btn']))
		{
		
		 $city=$_POST['city'];
		 $ch=$_POST['bw'];
		 $_SESSION['city']=$city;
		
		if($ch=='emp')
		header('location:empview.php');
		else if($ch=='cust')
		header('location:custview.php');
		}
		  ?>
		 </div>
		 </body>
		 </html>