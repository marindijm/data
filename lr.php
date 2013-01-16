<?php
 //header file
include '../php_funcs/header.php';
 $obj = new MainFuncs(); 
 $pilot = @$_REQUEST['pilot'];
 ?>

<div class="live_rep_content"> 


	<div id="hdr">    

			 <div class="top_header">OAF Spotcheck Report</div>
			<div class="survey_details_header">				 
					 Survey Round:&nbsp;&nbsp; OAF Regular Evaluation <br>
					 Survey Start:<?php 
					 
					 $result = $obj->calculateDashboardMetrics('oaf','survey_start');
					 $row = pg_fetch_array($result,0);
					 echo '&nbsp;&nbsp;'.date("F j, Y, g:i a", strtotime($row['r101']));
					 
					 ?><br>
					 Survey End:&nbsp;&nbsp;Ongoing <br>
			</div>  
			<a href="#" class="export_rpt" id="exp">Export Report To Excel</a>   
			<div class="hdr_bolden">&nbsp;&nbsp;&nbsp;&nbsp;Survey Summary</div>
			 <div class="tbl"> 
				 <table>
						<tbody><tr>
					<td width="859">&nbsp;Total Number of Dispenser Spot-Checks</td>
					<td width="38">
					<?php
					 $sptcheck_total  = pg_fetch_result($obj->calculateDashboardMetrics('oaf','total'),0);
					
					 echo  $sptcheck_total;
					?>					</td>
					</tr>           
				</tbody>
				</table>
			</div>	  
  		 <div class="hdr_bolden">&nbsp;&nbsp;&nbsp;&nbsp;Spotcheck Data</div>
		 <div class="tbl"> 
			<table>
				 <thead>
				 <tr>
					<th width="525">Metric</th>
					<th width="157" align="right">Respondents No. </th>
					<th width="106" align="right">% of Total </th>
					<th width="83" align="right">n</th>
				 </tr>
			</thead>
			</table>
		 </div>
 </div>	
<div id="bdr">
   <div class="tbl">   
       <table id ="oaf_report">
	       <thead id="hide_tbl_header">
		        <tr>
					<td width="525">&nbsp;Total Number of Dispenser Spot-Checks</td>
					<td width="38">
					<?php
					 $sptcheck_total  = pg_fetch_result($obj->calculateDashboardMetrics('oaf','total'),0);					
					 echo  $sptcheck_total;
					?>					
					</td>
				 </tr>           
				 <tr>
					<th width="525">Metric</th>
					<th width="157" align="right">Respondents No. </th>
					<th width="106" align="right">% of Total </th>
					<th width="83" align="right">n</th>
				 </tr>
			</thead>
       		   <tbody>
			   
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getDashboardVars('oaf','spotcheck');
		 while ($row = pg_fetch_array($result)) {
		          ?>
			   <tr>
				<td width="525">
				 <?php
				if( $row['ident_column'] == 'yes')
				{
			      echo  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['survey_choice'].' - '.$row['dashboard_var'];	
				}
				else
				{
				    echo  '&nbsp;&nbsp;'.$row['survey_choice'].$row['dashboard_var'];	
				}	
			
	            ?>
				</td>				
			   	 <td width="157" > 				
				  <div class="numalign">
				  <?php
				  	$rst = $obj->calculateDashboardMetrics('oaf',$row['id']);
					$rw = pg_fetch_array($rst);
					
					if(intval($rw['rst']) <> 0)
					{
					  echo "<a href ='details.php?id=".$row['id']."'>".$rw['rst']."</a>";
					}
					if($row['id'] == '28' or $row['id'] =='31' or $row['id'] =='34')
					{
					 $d_total = $sptcheck_total *2;
					}
					
				  ?>
				  </div> 
				 </td>
				 <td width="118" >
				   <div class="numalign">
				   <?php 
				 
				    if($row['id'] == '28' or $row['id'] =='31' or $row['id'] =='34')
					{
					 
				     $count_percentage = floatval($rw['rst']) / floatval($d_total) *100;					 
					 echo number_format($count_percentage , 0, '.', ',');
					}
					else
					{
					   if(intval($rw['rst']) <> 0)
					   {
							 
						 $count_percentage = floatval($rw['rst']) / floatval($sptcheck_total) *100;						 
						 echo number_format($count_percentage , 0, '.', ',');
					   }
					}
				   
				   ?>
				   </div> 
		         </td>
				  <td width="96">
					 <div class="numalign">
					 <?php 
					
				    if($row['id'] == '28' or $row['id'] =='31' or $row['id'] =='34')
					{
					      echo $d_total;
					}
					else
					{
					   if(intval($rw['rst']) <> 0)
					   {
						  echo  $sptcheck_total; ///show total
					   }
					}
					  ?></div>
				</td>
					
          </tr>
		
		<?php		
			 }    	
		 pg_free_result($result);       
		
		 ?>
        </tbody>     
       </table>
    </div>
          <br>
  </div>
  

</div>


<?php 
//footer file
include 'footer.php'; ?>