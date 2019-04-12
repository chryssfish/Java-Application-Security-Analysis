<?php
// initialize session
session_start();
 
include("authenticate.php");
 
// check to see if user is logging out
if(isset($_GET['out'])) {
	// destroy session
	session_unset();
	$_SESSION = array();
	unset($_SESSION['user'],$_SESSION['access']);
	session_destroy();
}
 
// check to see if login form has been submitted
if(isset($_POST['userLogin'])){
	// run information through authenticator
	if(authenticate($_POST['userLogin'],$_POST['userPassword']))
	{
		// authentication passed
		header("Location: protected.php");
		die();
	} else {
		// authentication failed
		$error = 1;
	}
}
 
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
		 body {margin:0;}

		.navbar {
		  overflow: hidden;
		  background-color: #333;
		  position: fixed;
		  top: 0;
		  width: 100%;
		}

		.navbar a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.navbar a:hover {
		  background: #ddd;
		  color: black;
		}

		.main {
		  padding: 16px;
		  margin-top: 30px;
		  height: 1500px; /* Used in this example to enable scrolling */
		}
		input{margin-right: 150px;}
      </style>
      
   </head>
   
   <body bgcolor = "#ffedfb">
	   <div class="navbar">
		  <a href="home.html">Home</a>
		  <a href="login.php">Login</a>
		  <a href="signup.php">SignUp</a>
	   </div>
    <br><br><br><br>
	<br><br><br><br>
	<br><br><br><br>
	<div class="main">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action="login.php" method="post">
				User: <input type="text" name="userLogin" /><br /><br>
				Password: <input type="password" name="userPassword" />
				<br><br>
				
				<input type="submit" name="submit" value="Submit" />
				
			   </form>
             	
            </div>
				
         </div>
			
      </div>
  </div>
   </body>
</html>