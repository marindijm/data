<?php
 //header file
include '../header.php';

 $obj = new MainFuncs(); 
 $id = $_GET['id'];
 
 if($id == null or $id == '')
 {
  header('location:index.php');
 }
 if(intval($id) < 1 or intval($id) > 36 )//get rid of any unnecesary id's
 {
  header('location:index.php');
 }
 


?>
<div class="live_rep_detail_content">  
	<div id="hdr">    
	         
			  <div class="top_header">
				MOE Spotcheck Report	
			 </div>
			

			<div class="survey_details_header">				 
					 Survey Round:&nbsp;&nbsp; MOE Regular Evaluation <br>
					 Survey Start:<?php 
					 
					 $result = $obj->calculateDashboardMetrics('moe','survey_start');
					 $row = pg_fetch_array($result);
					 echo '&nbsp;&nbsp;'.date("F j, Y, g:i a", strtotime($row['r101']));
					 
					 ?><br>
					 Survey End:&nbsp;&nbsp;Ongoing <br>
				 
			</div> 
			<a href="#" class="export_rpt" onClick="tableToExcel('report', 'MPH Spotcheck Results')"></a> 
			
			<br/>
			<br/>
			<br/>
			
			<div class="tbl"> 
				 <table>
						<tbody>
						<tr>
					<td width="518">
					<div class="hdr_bolden">
					&nbsp;Metric:
					 <?php 
					 if($id == '17')
					 {
					    $mt =  pg_fetch_result($obj->getMetricDetails('moe','2'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					    echo  $mt;
					 
					 }
					 elseif($id == '27')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','21'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					    echo  $mt;
					 }
					 elseif($id == '29' or $id == '30')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','28'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '32' or $id == '33')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','31'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '35' or $id == '36')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','34'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					 else
					 {
					    $mt = pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					 echo  $mt;
					 }
					 ?>					
					 </div>
					  </td>
					<td width="540">
					<div class="hdr_bolden">
					&nbsp;Respondents No:
					<?php
					 $res_num = pg_fetch_result($obj->calculateDashboardMetrics('moe',$id),0);					
					 echo  $res_num;
					?>					
					</div>
					</td>
					</tr>           
				</tbody>
				</table>
			</div>	  	
  		 <div class="tbl"> 
			<table> 
				 <thead>				 
				 <tr>
				    <th width="116" align="left">Waterpoint ID</th>
					<th width="151" align="left">Waterpoint Name</th>
					<th width="124" align="left">Village</th>
					<th width="150" align="left">Sublocation </th>		
					<th width="212" align="left">Neighbor 1</th>
					<th width="235" align="left">Neighbor 2</th>						
					<th width="50"  align="right">Issue Fixed</th>
				 </tr>				
			</thead>
		   </table>
		 </div>
 </div>
 <div id="bdr">
   <div class="tbl">   
       <table id ="report" >
	    <thead id="hide_tbl_header">	
		<tr>
					<td width="115">
					<div class="hdr_bolden">
					&nbsp;Metric:
					 <?php 
					 if($id == '17')
					 {
					    $mt =  pg_fetch_result($obj->getMetricDetails('moe','2'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					    echo  $mt;
					 
					 }
					 elseif($id == '27')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','21'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					    echo  $mt;
					 }
					 elseif($id == '29' or $id == '30')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','28'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '32' or $id == '33')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','31'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '35' or $id == '36')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('moe','34'),0)." - ".pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					     echo  $mt;
					 }
					 else
					 {
					    $mt = pg_fetch_result($obj->getMetricDetails('moe',$id),0);					
					 echo  $mt;
					 }
					 ?>					
					 </div>
		    </td>
					<td width="150">
						<div class="hdr_bolden">
							&nbsp;Respondents No:
							<?php
							 $res_num = pg_fetch_result($obj->calculateDashboardMetrics('moe',$id),0);					
							 echo  $res_num;
							?>					
						</div>
			</td>
		  </tr>     			 
				 <tr>
				    <th width="115" align="left">Waterpoint ID</th>
					<th width="150" align="left">Waterpoint Name</th>
					<th width="124" align="left">Village</th>
					<th width="154" align="left">Sublocation </th>				
					<th width="210" align="left">Neighbor 1</th>
					<th width="235" align="left">Neighbor 2</th>					
					<th width="50"  align="right">Issue Fixed</th>
				 </tr>				
			</thead>
	             <?php
				 // iterate over result set
				 // print each row
				  $result = $obj->getSurveyDetails('moe',$id,'waterpoint_id','r106');
				 while ($row = pg_fetch_array($result)) {
		          ?>
			  	 <tr>
				   <td width="115" align="left"><?php echo $row['waterpoint_id']; ?></td>
				   <td width="150" align="left" ><?php  echo $row['s2_1_waterpoint_name']; ?></td>
				   <td width="124" align="left"><?php echo $row['s2_8_village']; ?></td>
				   <td width="154" align="left"><?php echo $row['s2_10_sublocation']; ?></td>			
				   <td width="210" align="left"><?php echo $row['s2_28_neighbour1_name']." - ".$row['s2_29_neighbour1_number']; ?></td>
				   <td width="235" align="left"><?php echo $row['s2_30_neighbour2_name']." - ".$row['s2_31_neighbour2_number']; ?></td>				  
				   <td width="50"  align="right">No</td>
			 	 </tr>
				<?php		
					 }    	
				 pg_free_result($result);       
				
				 ?>
      </table>
	  <br/>
			<br/>
   </div>
 </div>

</div>	
<?php 
//footer file
include '../footer.php'; ?>

