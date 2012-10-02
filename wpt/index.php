<?php
include 'php_funcs/funcs.php';
$obj = new SSMTBL(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>DSW WPT Information</title>
<meta name="description" content="dashboard">
<meta name="keywords" content="oaf">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="css/main.css" rel="stylesheet">



<body>

<div id="container">
   <img name="logo" src="images/dsw_logo_small.png"  alt="DSW Logo" id="img_logo">
	
	<table id="wpt_rep">
	<!-- <thead>
	
  <tr>
    <th scope="col">Waterpoint ID</th>
    <th scope="col">Waterpoint Name</th>
    <th scope="col">Program Code</th>
    <th scope="col">Latitude</th>
    <th scope="col">Longititude</th>
    <th scope="col">Waterpoint Season</th>
    <th scope="col">Landowner Name</th>
    <th scope="col">Water Clear or Turbid</th>
    <th scope="col">Water Flow Rate</th>
    <th scope="col">Landowner Personality</th>
    <th scope="col">_turbidity_wet_season</th>
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
  </thead>   -->
   <tbody>
 
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getSSMInfo();//get the ssm results		
		 while ($row = pg_fetch_array($result)) {
		          ?>   
 <tr>
    <td><?php echo  $row['waterpoint_id']; ?></td>
    <td><?php echo  $row['waterpoint_name']; ?></td>
    <td><?php echo  $row['program_code']; ?></td>
    <td><?php echo  $row['gps_coordinate_latitude']; ?></td>
    <td><?php echo  $row['gps_coordinate_longititude']; ?></td>
    <td><?php echo  $row['waterpoint_season']; ?></td>
    <td><?php echo  $row['landowner_name']; ?></td>
    <td><?php echo  $row['water_clear_or_turbid']; ?></td>
    <td><?php echo  $row['water_flow_rate']; ?></td>
    <td><?php echo  $row['landowner_personality']; ?></td>
    <td><?php echo  $row['_turbidity_wet_season']; ?></td>
    <td><?php echo  $row['turbidity_dry_season']; ?></td>
    <td><?php echo  $row['households_using_wpt_dry_season']; ?></td>
    <td><?php echo  $row['households_using_wpt_wet_season']; ?></td>
    <td><?php echo  $row['months_of_wet_season']; ?></td>
    <td><?php echo  $row['months_of_dry_season']; ?></td>
    <td><?php echo  $row['nearest_market_center']; ?></td>
    <td><?php echo  $row['market_days_for_wpt']; ?></td>
    <td><?php echo  $row['directions_from_nearest_market_center']; ?></td>
    <td><?php echo  $row['watersource_type']; ?></td>
    <td><?php echo  $row['location_type']; ?></td>
    <td><?php echo  $row['location_of_wpt']; ?></td>
    
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
<a href="#" class="export_rpt" onClick="tableToExcel('wpt_rep', 'Wpt Summary Report')">Export Waterpoint Summary Report To Excel</a>
	
</div>
<script src="js_funcs/jquery.min.js" type="text/javascript"></script>
<script src="js_funcs/export.js" type="text/javascript"></script>

</body>
</html>
