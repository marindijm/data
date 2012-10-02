<?php
include 'php_funcs/funcs.php';
$obj = new SSMTBL(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>DSW SSM Information</title>
<meta name="description" content="dashboard">
<meta name="keywords" content="oaf">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="css/main.css" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet"> 



<body>
<div id="nav-header">  
   <img name="logo" src="/images/dsw_logo_small.png"  alt="DSW Logo" id="img_logo">
   <h1>DSW Data</h1>  
   <ul id="nav-menu">
		<li><a href="/">Home</a></li>
		<li><a href="#">Live Reports</a>
			<ul>
				<li><a href="/cd/">Chlorine
						Delivery</a></li>
				<li><a href="/oaf/">OAF Regular Spotcheck</a></li>
				<li><a href="/moe">MoE</a></li>
				<li><a href="/mph">MoPHS</a></li>
			</ul></li>
		<li><a href="#">Static reports</a>
			<ul>
				<li><a href="#">Nyanza selected sites</a></li>
				<li><a href="/ssm">Nyanza SSM</a></li>
				<li><a href="/cd/waterpoints_hubs.php">Waterpoints</a></li>
			</ul></li>
		<li><a href="/datasets">Datasets</a></li>
		<li><a href="#">Dashboard</a></li>
	</ul>
</div>

<div id="container">
   <div class="top_header">
				Download SSM 
			 </div>
	
	<table id="ssm_rep">
	<thead>
  <tr>
    <th scope="col">ssm002</th>
    <th scope="col">ssm003</th>
    <th scope="col">ssm004</th>
    <th scope="col">ssm005</th>
    <th scope="col">ssm006</th>
    <th scope="col">ssm007</th>
    <th scope="col">instruction</th>
    <th scope="col">instruction1_1</th>
    <th scope="col">instruction1_2</th>
    <th scope="col">instruction1_6</th>
    <th scope="col">ssm011 </th>
    <th scope="col">ssm012 </th>
    <th scope="col">ssm013 </th>
    <th scope="col">ssm014 </th>
    <th scope="col">ssm015 </th>
    <th scope="col">ssm016</th>
    <th scope="col">ssm019</th>
    <th scope="col">ssm020</th>
    <th scope="col">s1_comments </th>
    <th scope="col">instruction1_7</th>
    <th scope="col">ssm101</th>
    <th scope="col">ssm102</th>
    <th scope="col">ssm103</th>
    <th scope="col">ssm104</th>
    <th scope="col">ssm105</th>
    <th scope="col">ssm106</th>
    <th scope="col">s2_comments</th>    
  </tr>
  </thead>  
   <tbody>
 
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getSSMInfo();//get the ssm results		
		 while ($row = pg_fetch_array($result)) {
		          ?>   
 <tr>
    <td><?php echo  $row['ssm002']; ?></td>
    <td><?php echo  $row['ssm003']; ?></td>
    <td><?php echo  $row['ssm004']; ?></td>
    <td><?php echo  $row['ssm005']; ?></td>
    <td><?php echo  $row['ssm006']; ?></td>
    <td><?php echo  $row['ssm007']; ?></td>
    <td><?php echo  $row['instruction']; ?></td>
    <td><?php echo  $row['instruction1_1']; ?></td>
    <td><?php echo  $row['instruction1_2']; ?></td>
    <td><?php echo  $row['instruction1_6']; ?></td>
    <td><?php echo  $row['ssm011']; ?></td>
    <td><?php echo  $row['ssm012']; ?></td>
    <td><?php echo  $row['ssm013']; ?></td>
    <td><?php echo  $row['ssm014']; ?></td>
    <td><?php echo  $row['ssm015']; ?></td>
    <td><?php echo  $row['ssm016']; ?></td>
    <td><?php echo  $row['ssm019']; ?></td>
    <td><?php echo  $row['ssm020']; ?></td>
    <td><?php echo  $row['s1_comments']; ?></td>
    <td><?php echo  $row['instruction1_7']; ?></td>
    <td><?php echo  $row['ssm101']; ?></td>
    <td><?php echo  $row['ssm102']; ?></td>
    <td><?php echo  $row['ssm103']; ?></td>
    <td><?php echo  $row['ssm104']; ?></td>
    <td><?php echo  $row['ssm105']; ?></td>
    <td><?php echo  $row['ssm106']; ?></td>
    <td><?php echo  $row['s2_comments']; ?></td>
  </tr>
  <?php		
			 }    	
		 pg_free_result($result);       
		
		 ?>
  </tbody>
</table>
<br/>
<br/>
<br/>
<a href="#" class="export_rpt" onClick="tableToExcel('ssm_rep', 'SSM Report')">Export SSM Report To Excel</a>
	
</div>
<script src="js_funcs/jquery.min.js" type="text/javascript"></script>
<script src="js_funcs/export.js" type="text/javascript"></script>

</body>
</html>
