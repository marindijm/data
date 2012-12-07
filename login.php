
<?php

if(!isset($_SESSION))
{
    session_start();//start if session not started new session
}
 $_SESSION['headertype'] = 'login'; //set session variable for login
 

//include necessary files
include 'php_funcs/funcs.php'; //include all the functions to be used all the pages 
include 'php_funcs/openid.php';
include 'php_funcs/header.php';



 $obj = new MainFuncs();//initialize the functions class
 $obj->logOutUser();//make sure previou sessions nullified

if(@$_GET['auth'] == 'yes')//supress notice
{
  $obj->authenticateUser();// authenticate and log in the user
}

if(isset($_SESSION['googleidentity']))//check if user has logged in
{
 		header("location:index.php");//redirect to the login page if user logged in already
}


?>

 
<div id="container"> 

	<noscript> <!-- notify user in case of javascript disabling-->
	For full functionality of this site it is necessary to enable JavaScript. 
	Here are the <a href="http://www.enable-javascript.com"> instructions how to enable JavaScript in your web browser</a>
	</noscript>	
<div class="snow"></div>
<div class="preload_imgs"></div>
 <div class="top_header">User Login</div> 	     
			  <br/>
			  
			  <div class="login">
	<a href="<?php 
	$openid_link = $obj->loginUser();//get the open id authentication link
	
	if(!$openid_link)
	{
	   echo '#';
	}
	else
	{
	   echo $openid_link;
	} 
	
	 ?>">Please Sign In With Your Poverty Action Account</a>
	         </div>
	         <br/>
	

<?php 
//footer file
include 'php_funcs/footer.php'; ?>