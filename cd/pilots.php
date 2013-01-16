<?php
include 'php_funcs/funcs.php';

 $obj = new ChlorineDeliveryFuncs(); 
  //header file
include '../php_funcs/header.php';

?>

<div id="container">
<div class="content">

<table id="pilots">
<thead>
  <tr>
    <th width="48" scope="col" align="left">Pilot Name</th>
    <th width="182" scope="col" >Month Chlorine Records Begin</th>
    <th width="163" scope="col">Year Chlorine Records Begin</th>
    <th width="179" scope="col">Month Chlorine Records End</th>
    <th width="152" scope="col">Year Chlorine Records End</th>
    <th width="200" scope="col">Total Months Of Chlorine Supply</th>
  </tr>
  </thead>
  <tbody>
  <?php
   $result = $obj->getPilotInfo();//get pilot info
    while ($row = pg_fetch_array($result)) {
  ?>
  <tr>
    <td class="align_left"><?php echo  $row['pilot_name']; ?></td>
    <td><?php echo  $row['month_chlorine_records_begin'];?></td>
    <td><?php echo  $row['year_chlorine_recs_begin']; ?></td>
    <td><?php echo  $row['month_chlorine_records_end'];?></td>
    <td><?php echo  $row['year_chlorine_records_end'];?></td>
    <td><?php echo  $row['total_months_of_chlorine_supply'];?></td>
  </tr>
  <?php
  	 }    	
		 pg_free_result($result);  
  ?>
 </tbody>
</table>


<br/>

<script src="js_funcs/funcs.js" type="text/javascript"></script> 
 
<a href="#" class="export_rpt" id="exp">Export Report To Excel</a>
</div>

<?php 
//footer file
include '../php_funcs/footer.php'; ?>
