<?php
include 'php_funcs/funcs.php';

 $obj = new DashboardFuncs(); 

?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>DSW Datasets</title>
<meta name="description" content="dashboard">
<meta name="keywords" content="oaf">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="css/data.css" rel="stylesheet">
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
				Datasets
			 </div>
			 	<div id="hdr">    
	     
			  <br/>
			
		 <div class="tbl"> 
			<table>
				 <thead>
				 <tr>
					<th width="400" align="left">Dataset Name</th>
					<th width="157" align="left">Issue date</th>
					<th width="106" align="left">Link</th>
					<th width="306" align="left">Notes</th>
					
				 </tr>
			</thead>
			<tbody>
				 <tr>
					<td width="400" align="left">Waterpoints</td>
					<td width="157" align="left">28th Sep 2012</td>
					<td width="106" align="left"><a href="/wpt">Open</a></td>
					<td width="306" align="left">All DSW waterpoints</td>
					
				 </tr>
				 <tr>
					<td width="400" align="left">SSM</td>
					<td width="157" align="left">28th Sep 2012</td>
					<td width="106" align="left"><a href="/ssm">Open</a></td>
					<td width="306" align="left">Sublocation stake-holder contacts</td>
					
				 </tr>
				 <tr>
					<td width="400" align="left">Nyanza Contacts</td>
					<td width="157" align="left">28th Sep 2012</td>
					<td width="106" align="left"><a href="#">Open</a></td>
					<td width="306" align="left">Nyanza village and administrative contacts</td>
					
				 </tr>

				 
				 
			</thead>
			</tbody>
		 </div>
 </div>	

			
</div>


</body>
</html>