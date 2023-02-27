<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:customer');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:employee');
			}	
else
	{
		#	echo '<script type="text/javascript"> alert("All in vain") </script>';
	}			
require 'dbconfig/config.php';
?>

<!DOCTYPE HTML>
<html>
<head>
        <title>Home | Fast Postal</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
<link href="css/custom.css" rel='stylesheet' type='text/css' />

<script type='text/javascript' src="js/jquery.validate.js"></script>
<script type='text/javascript' src="js/common.js"></script>
<script type="text/javascript">
$(function() {
   $("#login_form").validate();
});
</script>

    </head>
    <body>
    <!---- container ---->
<!---- header ----->
<div class="header "   style="min-height: 660px;" >
        <div class="container">
                <!--- logo ----->
                <div class="logo">
                    <img src="images/1.png" alt="Logo"  /> <a href="index.php"><span></span><strong>Fast Postal</strong></a>
                </div>
                <!--- logo ----->
<!--- top-nav ----->
<div class="top-nav">
    <span class="menu"> </span>
    <ul>
        <li class="active" ><a href="index.php">Home</a></li>
        <li ><a href="register.php">Register</a></li>

            </ul>

</div>
<div class="clearfix"> </div>
<!--- top-nav ----->
        <!----- script-for-nav ---->
<script>
        $( "span.menu" ).click(function() {
          $( ".top-nav ul" ).slideToggle( "slow", function() {
            // Animation complete.
          });
        });
</script>
<div class="banner text-center">
    
    <div class="form_cont">
        <form name="login_form" id="login_form" method="post" autocomplete="off" action="index.php" >
            <div class="row1"><select name="user_type" class="required">
                           <option value="customer"  >Customer</option>
                           <option value="employee" >Employee</option>
                        </select></div>
            <div class="row1"><input type="text" name="username" placeholder="Type Your username" class="required"/></div>
            <div class="row1"><input type="password" name="password" maxlength="40" value="" class="required" placeholder="Password" /></div>
            <div class="row1"><input type="submit" Value="Login" name="login_submit" /></div>
        </form>
        
 <?php 
                                if(isset($_POST['login_submit']))
                                {
                                #echo '<script type="text/javascript"> alert("Sign Up Button Clicked") </script>';
                                    $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
                                    
                                    //echo $username;
                                    $password=$_POST['password'];
					$conc="";
					$mpassword=$conc.$password;
					$password=$mpassword;
                                    //preg_replace('/[^A-Za-z0-9\-]/', '', $password);
                                    $user_type=$_POST['user_type'];
                                    if($user_type=="employee")
                                        {
                                            $query="select * from empuserinfo where username='$username' and password='$password'";
                                            $query_run=mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                $query2="select * from empuserinfo where username='$username' and password='$password' and vstatus=0";
                                                $query_run2=mysqli_query($con,$query2);
                                                if(mysqli_num_rows($query_run2)>0)  
                                                {
                                                    echo '<script type="text/javascript"> alert("Employee not verified") </script>';
                                                }
                                                else
                                                {
                                                //success login
                                                //$_SESSION = [];
                                                //session_destroy();
                                                //will see the differences
                                                $_SESSION['empusername']=$username;
                                                $tqq="select * from empuserinfo where username='$username' and password='$password'";
                                                $qrq=mysqli_query($con,$tqq);
                                                $rw2=mysqli_fetch_array($qrq);
                                                $_SESSION['empcity']=$rw2['city'];
                                                //echo $rw2['city'];
                                                header('location:employee');
                                                }
                                                //echo '<script type="text/javascript"> alert("found ya") </script>';
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                        }
                                    else
                                        {

                                            $query="select * from userinfo where username='$username' and password='$password'";
                                            $query_run=mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                //success login
                                                //$_SESSION = [];
                                                //session_destroy();
                                                //will see the differences
                                                $_SESSION['username']=$username;
                                                header('location:customer');
                                                //echo '<script type="text/javascript"> alert("found ya") </script>';
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                            //echo '<script type="text/javascript"> alert("Only Employee Login right now") </script>';
                                        }
                                }
                            ?>
    </div>
    
</div>
<!---- banner --->
        </div>
    </div>
<!---- header ----->
<div class="footer">
    <div class="top-footer">
            <div class="container">
                    <div class="top-footer-grids">
                            <div class="top-footer-grid">
                                    <h3>Contact Details</h3>
                                    <ul class="address">
                                        <li><span class="map-pin"> </span><label>Building No : 425 <br> Global Tech Park Back Gate RR Nagar Bangalore</label></li>
                                        <li><span class="mob"> </span>PH : 7884502255</li>
                                        <li><span class="msg"> </span><a href="#">fastpostal2006@gmail.com</a></li>
                                    </ul>
                            </div>
                            <div class="top-footer-grid">
                                    <ul class="latest-post">
                                        <li><a href="terms-and-condition.php">Terms & Conditions</a> </li>
                                        
                                    </ul>
                            </div>
                            <div class="clear"> </div>
                    </div>
            </div>
    </div>
    <!----start-bottom-footer---->
    <div class="bottom-footer">
            <div class="container"> 
                    <div class="bottom-footer-left">
                        
                             <p> &copy; 2006 Fast Postal. All rights reserved | Powered by: VVV Groups LTD</p>

                    </div>
                    <div class="clear"> </div>
            </div>
    </div>
    <!----//End-bottom-footer---->
</div>
	</body>
</html>
