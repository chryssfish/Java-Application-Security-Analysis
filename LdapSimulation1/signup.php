<?php
// initialize session
session_start();
 
include("adduser.php");
 
// check to see if user is logging out
if(isset($_GET['out'])) {
	// destroy session
	session_unset();
	$_SESSION = array();
	unset($_SESSION['user'],$_SESSION['access']);
	session_destroy();
}
 
// check to see if  register form has been submitted
if(isset($_POST['username'])){
	// run information through authenticator
	if(register($_POST['surname'],$_POST['name'],$_POST['username'],$_POST['email'] ,$_POST['password']))
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
      <title>SignUp Page</title>
      
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
		input {margin-right: 150px;}
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
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>Sign up</b></div>
				
            <div style = "margin:30px">
               
               <form action="signup.php" method="post">
	              SurName:   <input type = "text" name = "surname" class = "box"/><br /><br />
                  Name      : <input type = "text" name = "name" class = "box" /><br/><br />
                  UserName  :<input type = "text" name = "username" class = "box"/><br /><br/>
				  Email     :<input type = "text" name = "email" class = "box"/><br /><br/>
                  Password  :<input type = "password" name = "password" class = "box" /><br/><br />
				  <br>
	             <input type="submit" name="submit" value="Submit" />
				 
               </form>
               	
            </div>
				
         </div>
			
      </div>
  </div>
   </body>
</html>