<?php
include 'funcs.php'; //include all the functions to be used all the pages 
$obj = new MainFuncs();//initialize the functions class
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
		 header("location:login.php");
		
 
}

if(!isset($_SESSION['googleidentity']) && $_SESSION['headertype'] != 'login')//check if user has logged in
{
 // echo $_SERVER['DOCUMENT_ROOT'];
	header("location:login.php");
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
<link href="<?php echo 'http://'.$obj->_domain.'/'; ?>images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="<?php echo 'http://'.$obj->_domain.'/'; ?>css/main.css" rel="stylesheet"> 
<link href="<?php echo 'http://'.$obj->_domain.'/'; ?>css/live_rep.css" rel="stylesheet"> 
<link href="<?php echo 'http://'.$obj->_domain.'/'; ?>css/jquery-ui-1.9.2.custom.min.css" rel="stylesheet"> 
<link href="<?php echo 'http://'.$obj->_domain.'/'; ?>css/ui.jqgrid.css" rel="stylesheet">
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
<div class="logout"><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>header.php?logout=yes">Log Out</a></div>
<?php
}
?>
<div id="nav-header">  
   <a href="/"><img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/dsw_logo_small.png" alt="DSW Logo" id="dsw_logo" ></a>
   <h1>Dispensers For Safe Water</h1>  
</div>
<?php
 //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'gen')//general DSW header
{
?>

   
   <div class="nav-menu">
	   <ul>
			<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>index.php">Home</a></li>
			<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>datasets.php">Datasets</a></li>		
			<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>tools.php">Field Tools</a></li>
			<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>reports.php">Reports</a></li>			
			<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>dashboard.php">Dashboard</a></li>
	  </ul>
  </div>


<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'is_tr')//header for issue tracker
{
?>

   <div class="nav-menu">
      <ul>
        <li id="home_tab"><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>index.php">Home</a></li>
		<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>/tracker/create.php">Create Issue(s)</a></li>
		<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>/tracker/view.php">View Issue(s)</a></li>		
		<li><a href="<?php echo 'http://'.$obj->_domain.'/'; ?>/tracker/manage.php">Manage Issue(s)</a></li>	
	
   </ul>
</div>
<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'cdm')//header for chlorine delivery manager
{
?>

   
   <div class="nav-menu">
		
		<li id="lr_tab"><a href="php_funcs/tools.php">Field Tools</a></li>
		<li id="stc_tab"><a href="php_funcs/reports.php">Reports</a></li>		
		<li id="dsts_tab"><a href="php_funcs/datasets.php">Datasets</a></li>		
		<li id="dshbrd_tab"><a href="php_funcs/dashboard.php">Dashboard</a></li> 

</div>
<?php 
}
?>

<?php //Change the header based on whether header is for tools or just general web header
if($_SESSION['headertype'] == 'login')//for login don't display anything
{
?>


<?php 
}
?>
