<?php
// initialize session
session_start();
 
if(!isset($_SESSION['user'])) {
	// user is not logged in, do something like redirect to login.php
	header("Location: login.php");
	die();
}
 

?>
<html>
   
   <head>
      <title>Member Page</title>
      
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
            
            <div style = "margin:30px">
               
					<p>Welcome <?= $_SESSION['user'] ?>!</p>
					<p>You are <?= $_SESSION['access'] ?>!</p>
					 
					 
					<p><a href="login.php?out=1">Logout</a></p>
             	
            </div>
				
         </div>
			
      </div>
  </div>
   </body>
</html>
 
<p>Welcome <?= $_SESSION['user'] ?>!</p>
<p>You are <?= $_SESSION['access'] ?>!</p>
 
 
<p><a href="login.php?out=1">Logout</a></p>