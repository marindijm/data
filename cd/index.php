<?php
include 'php_funcs/funcs.php';

 $obj = new ChlorineDeliveryFuncs(); 
  //header file
include '../php_funcs/header.php';

?>

<div id="container">
<div class="content">
 <div class="top_header">
				 Chlorine Delivery Report
			 </div>
<table id="cd_report">
<thead>
  <tr>
    <th width="72">Program Name</th>
    <th width="105">Total Jerricans Consumed</th>
    <th width="109">Total Jerricans Delivered</th>
    <th width="130">Total Waterpoints in Pilot</th>
    <th width="154">Average Jerricans Consumed/Waterpoint</th>
    <th width="106">Months Record Active</th>
    <th width="137">Average Monthly Jerricans Consumed</th>
    <th width="150">Average Monthly Jerricans Delivered</th>
  </tr>
  </thead>
  
         		   <tbody>
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getProgramCode();//get the program code
		  $prog_code  = ''; //initialize prog code var
		 
		  //totals
		  $total_jerricans_consumed = 0;
		  $total_jerricans_delivered = 0; 
		  $total_waterpoints =0 ;
		  $total_avg_jerricans_consumed_per_wpt =0;
		  $total_avg_monthly_jerricans_consumed = 0;
		  $total_avg_monthly_jerricans_delivered = 0;
		 while ($row = pg_fetch_array($result)) {
		          ?>
			   <tr>
					<td class="align_left"> 
					<?php
					   echo  $row['pilot_name'];
					  $prog_code  = trim($row['pilot_name']);					 
					  ?>
					</td>
					<td>
					<?php 
					 $jerricans_consumed = floatval(pg_fetch_result($obj->getJerricansConsumed($prog_code),0));
					  $total_jerricans_consumed +=  $jerricans_consumed;
				     echo number_format($jerricans_consumed, 0, '.', ',');
					?>
					</td>
					<td>
					<?php
					   $jerricans_delivered =floatval(pg_fetch_result($obj->getJerricansDelivered($prog_code),0));
					   $total_jerricans_delivered += $jerricans_delivered;
					   echo number_format($jerricans_delivered, 0, '.', ',');
					  ?>
					</td>
					<td><?php 
					 $waterpoints = floatval(pg_fetch_result($obj->getTotalWaterpoints($prog_code),0));
					  $total_waterpoints += $waterpoints;
					echo  number_format($waterpoints, 0, '.', ',');					
					?>
					</td>
					<td><?php
					$avg_jerricans_consumed_per_wpt =  $jerricans_consumed /  $waterpoints;
					  $total_avg_jerricans_consumed_per_wpt += $avg_jerricans_consumed_per_wpt;
					echo  number_format($avg_jerricans_consumed_per_wpt, 2, '.', ',');					
					?>
					</td>
					<td>
					<?php
					$months_active =  floatval(pg_fetch_result($obj->getMonthsRecsActive($prog_code),0)); 
					 echo  number_format($months_active, 0, '.', ',');
					?>
					</td>
					<td>
					<?php
					$avg_monthly_jerricans_consumed =  $avg_jerricans_consumed_per_wpt /  $months_active;
					$total_avg_monthly_jerricans_consumed += $avg_monthly_jerricans_consumed;
					echo  number_format($avg_monthly_jerricans_consumed, 9, '.', ',');
					?>
					</td>
					<td>
					<?php
					$avg_monthly_jerricans_delivered = $jerricans_delivered / $waterpoints / $months_active;
					$total_avg_monthly_jerricans_delivered += $avg_monthly_jerricans_delivered;
					echo  number_format($avg_monthly_jerricans_delivered, 9, '.', ',');
					?>
					</td>
            </tr>		
		<?php		
			 }    	
		 pg_free_result($result);       
		
		 ?>
		 
		  <tr>
					<td class="totals">Totals</td>
					<td class="totals"><?php echo number_format($total_jerricans_consumed, 0, '.', ',');	?></td>
					<td class="totals"><?php echo number_format($total_jerricans_delivered, 0, '.', ','); ?></td>
					<td class="totals"><?php echo  number_format($total_waterpoints, 0, '.', ',');	?></td>
					<td class="totals"><?php echo  number_format( $total_avg_jerricans_consumed_per_wpt, 2, '.', ','); ?></td>
					<td></td>
					<td class="totals"><?php echo  number_format($total_avg_monthly_jerricans_consumed, 9, '.', ',');?></td>
					<td class="totals"><?php echo  number_format($total_avg_monthly_jerricans_delivered, 9, '.', ',');?></td>
            </tr>		
		 </tbody>
 
</table>
<br/>
<script src="js_funcs/jquery.min.js" type="text/javascript"></script>
<script src="js_funcs/funcs.js" type="text/javascript"></script> 
<script src="js_funcs/export.js" type="text/javascript"></script> 
<a href="#" class="export_rpt" onClick="tableToExcel('cd_report', 'Chlorine Delivery Report')">Export Report To Excel</a>
</div> <!-- end of container -->
</div>

<?php 
//footer file
include '../php_funcs/footer.php'; ?>
