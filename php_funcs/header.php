<?php

 if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'gen'; //by default display the general header
 }
 if(@$_GET['logout'] == 'yes')
{
        $_SESSION = array();
         session_destroy();
		  //logOutUser();
		 header("location:../login.php");
		
 
}

if(!isset($_SESSION['googleidentity']) && $_SESSION['headertype'] != 'login')//check if user has logged in
{
 	 header("location:../login.php");//if not redirect to the login page
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DSW Program Information</title>
<meta name="description" content="dsw info">
<meta name="keywords" content="dsw">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="../images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="../css/main.css" rel="stylesheet"> 
<link href="../css/live_rep.css" rel="stylesheet"> 
<link href="../css/jquery-ui-1.9.1.min.css" rel="stylesheet"> 
<!--
<link rel="stylesheet" media="screen" href="css/christmaslights.css" />
<script type="text/javascript" src="js_funcs/soundmanager2-nodebug-jsmin.js"></script>
<script type="text/javascript" src="js_funcs/animation-min.js"></script>
<script type="text/javascript" src="js_funcs/christmaslights.js"></script>
<script type="text/javascript">
var urlBase = './';
soundManager.url = './';
</script>

-->

</head>

<body>
<div id="container"> 
<?php
if(isset($_SESSION['googleidentity']))//check if user has logged in and show log out link
{
?>
<div class="logout"><a href="/php_funcs/header.php?logout=yes">Log Out</a></div>
<?php
}

 //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'gen')//general DSW header
{
?>

<div id="nav-header">  
   <a href="/"><img src="../images/dsw_logo_small.png" alt="DSW Logo" id="dsw_logo" ></a>
   <h1>Dispensers For Safe Water</h1>  
   </div>
   
   <div class="nav-menu">
	   <ul>
			<li><a href="/">Home</a></li>
			<li><a href="../datasets.php">Datasets</a></li>		
			<li><a href="../tools.php">Field Tools</a></li>
			<li><a href="../reports.php">Reports</a></li>			
			<li><a href="../dashboard.php">Dashboard</a></li>
	  </ul>
  </div>


<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'is_tr')//header for issue tracker
{
?>
<div id="nav-header">  
   <img name="logo" src="../images/dsw_logo_small.png" alt="DSW Logo">
   <h1>Dispensers For Safe Water</h1>  
 </div>
   
   <div class="nav-menu">
      <ul>
        <li id="home_tab"><a href="/">Home</a></li>
		<li><a href="/tracker/create.php">Create Issue(s)</a></li>
		<li><a href="/tracker/view.php">View Issue(s)</a></li>		
		<li><a href="/tracker/manage.php">Manage Issue(s)</a></li>	
	
   </ul>
</div>
<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'cdm')//header for chlorine delivery manager
{
?>
<div id="nav-header">  
   <img name="logo" src="../images/dsw_logo_small.png" alt="DSW Logo">
   <h1>Dispensers For Safe Water</h1>  
 </div>
   
   <div class="nav-menu">
		
		<li id="lr_tab"><a href="tools.php">Field Tools</a></li>
		<li id="stc_tab"><a href="reports.php">Reports</a></li>		
		<li id="dsts_tab"><a href="datasets.php">Datasets</a></li>		
		<li id="dshbrd_tab"><a href="dashboard.php">Dashboard</a></li> 

</div>
<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'login')//for login don't display anything
{
?>
<div id="nav-header">  
   <img name="logo" src="../images/dsw_logo_small.png" alt="DSW Logo">
   <h1>Dispensers For Safe Water</h1>  
 
</div>

<?php 
}
?>
