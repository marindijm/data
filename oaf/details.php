<?php
include '../php_funcs/funcs.php';

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
 
 //header file
include '../php_funcs/header.php'

?>



<div class="live_rep_detail_content">  
<br/>
	<div id="hdr">    
	         
			  <div class="top_header">
				OAF Spotcheck Report	
			 </div>
			

			<div class="survey_details_header">				 
					 Survey Round:&nbsp;&nbsp; OAF Regular Evaluation <br>
					 Survey Start:<?php 
					 
					 $result = $obj->calculateDashboardMetrics('oaf','survey_start');
					 $row = pg_fetch_array($result);
					 echo '&nbsp;&nbsp;'.date("F j, Y, g:i a", strtotime($row['r101']));
					 
					 ?><br>
					 Survey End:&nbsp;&nbsp;Ongoing <br>
				 
			</div> 
			<br/>
			<a href="#" class="export_rpt" onClick="tableToExcel('oaf_report', 'OAF Spotcheck Results')"></a> 
			 <div class="dashboard_home_hdr">
				
			</div> 	
					
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
					    $mt =  pg_fetch_result($obj->getMetricDetails('oaf','2'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					    echo  $mt;
					 
					 }
					 elseif($id == '27')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','21'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					    echo  $mt;
					 }
					 elseif($id == '29' or $id == '30')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','28'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '32' or $id == '33')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','31'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '35' or $id == '36')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','34'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					 else
					 {
					    $mt = pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					 echo  $mt;
					 }
					 ?>					
					 </div>
					  </td>
					<td width="540">
					<div class="hdr_bolden">
					&nbsp;Respondents No:
					<?php
					 $res_num = pg_fetch_result($obj->calculateDashboardMetrics('oaf',$id),0);					
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
				    <th width="65" align="left">Quiz ID</th>
					<th width="180" align="left">Waterpoint Name</th>
					<th width="139" align="left">Village</th>
					<th width="132" align="left">Sublocation </th>
					<th width="147" align="left">OAF Field Officer</th>
					<th width="149" align="left">Nearest Committee</th>
					<th width="172" align="left">Nearest Boma</th>					
					<th width="50"  align="right">Issue Fixed</th>
				 </tr>				
			</thead>
		   </table>
		 </div>
 </div>
 <div id="bdr">
   <div class="tbl">   
       <table id ="oaf_report" >
	    <thead id="hide_tbl_header">	
		<tr>
					<td width="250">
					<div class="hdr_bolden">
					&nbsp;Metric:
					 <?php 
					 if($id == '17')
					 {
					    $mt =  pg_fetch_result($obj->getMetricDetails('oaf','2'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					    echo  $mt;
					 
					 }
					 elseif($id == '27')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','21'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					    echo  $mt;
					 }
					 elseif($id == '29' or $id == '30')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','28'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '32' or $id == '33')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','31'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					  elseif($id == '35' or $id == '36')
					 {
					     $mt =  pg_fetch_result($obj->getMetricDetails('oaf','34'),0)." - ".pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					     echo  $mt;
					 }
					 else
					 {
					    $mt = pg_fetch_result($obj->getMetricDetails('oaf',$id),0);					
					 echo  $mt;
					 }
					 ?>					
					 </div>
					  </td>
					<td width="150">
						<div class="hdr_bolden">
							&nbsp;Respondents No:
							<?php
							 $res_num = pg_fetch_result($obj->calculateDashboardMetrics('oaf',$id),0);					
							 echo  $res_num;
							?>					
						</div>
					</td>
		  </tr>     			 
				 <tr>
				    <th width="65" align="left">Quiz ID</th>
					<th width="180" align="left">Waterpoint Name</th>
					<th width="139" align="left">Village</th>
					<th width="132" align="left">Sublocation </th>
					<th width="147" align="left">OAF Field Officer</th>
					<th width="149" align="left">Nearest Committee</th>
					<th width="172" align="left">Nearest Boma</th>					
					<th width="50"  align="right">Issue Fixed</th>
				 </tr>				
			</thead>
	             <?php
				 // iterate over result set
				 // print each row
				  $result = $obj->getSurveyDetails('oaf',$id,'quiz_id','r108');
				 while ($row = pg_fetch_array($result)) {
		          ?>
			  	 <tr>
				   <td width="66" align="left"><?php echo $row['quiz_id']; ?></td>
				   <td width="177" align="left" ><?php  echo $row['waterpoint_name']; ?></td>
				   <td width="133" align="left"><?php echo $row['vilage_name']; ?></td>
				   <td width="140" align="left"><?php echo $row['sublocation_name']; ?></td>
				   <td width="146" align="left"><?php echo $row['field_officer_name']; ?></td>
				   <td width="150" align="left"><?php echo $row['committee_nearest_wpoint']; ?></td>
				   <td width="173" align="left"><?php echo $row['boma_nearest_wpoint']; ?></td>				  
				   <td width="49"  align="right">No</td>
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
include '../php_funcs/footer.php'; ?>
