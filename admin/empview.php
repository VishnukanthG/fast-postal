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
	<title>Employees in City</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
<?php 

			$query="CALL `getemp`();";
					$query_run=mysqli_query($con,$query);
				
					if($query_run)
					{
					echo "EMPLOYEES ";		
							echo "<table>"; 
							echo "<tr><td>" . "Name" . "</td><td>" . "Phone" . "</td><td>" . "Email" . "</td><td>" . "City" . "</td></tr>";	
					while($row = mysqli_fetch_array($query_run)){  
						echo "<tr><td>" . $row['pname'] . "</td><td>" .$row['phno'] . "</td><td>" .$row['eml'] . "</td><td>" .$row['city'] . "</td></tr>"; 
					echo "</table>";
				}}
				else
					echo "the query was wrong ;)";
				
				



 ?>
 <br>
 <a href="index.php"><input type="button" id="back-button" value="Go Back" /></a>

	</body>
</html>