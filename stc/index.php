<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Static reports</title>
<meta name="description" content="dashboard">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="css/dashbrd.css" rel="stylesheet">
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

<div class="">  
	<div id="hdr">    
	        
			 <div class="top_header">
				 Static Reports
			 </div>
			  <br/>
			
		 <div class="tbl"> 
			<table>
				 <thead>
				 <tr>
					<th width="400" align="left">Report Name</th>
					<th width="157" align="left">Issue date</th>
					<th width="106" align="left">Link</th>
					<th width="306" align="left">Notes</th>
					
				 </tr>
			</thead>
			<tbody>
				 <tr>
					<td width="400" align="left">IS009 Chief and Asst Chief Contacts Report</td>
					<td width="157" align="left">6th Aug 2012</td>
					<td width="106" align="left"><a href="https://www.dropbox.com/s/fqlvwg8xlopwc4y/IS009%20Chief%20and%20Asst%20Chief%20Contacts%20Report.xlsx">Download</a></td>
					<td width="306" align="left"></td>
					
				 </tr>
				  <tr>
					<td width="400" align="left">IS012 - Waterpoint Verification Draft Selected Sites Report</td>
					<td width="157" align="left">28th Sep 2012 </td>
					<td width="106" align="left"><a href="https://www.dropbox.com/s/8fnppooo6wyp03c/IS012%20-%20Waterpoint%20Verification%20Draft%20Selected%20Sites%20Report%20_serialization.xlsx">Download</a></td>
					<td width="306" align="left">1031 pass sites, waterpoints assigned</td>
					
				 </tr>
				  <tr>
					<td width="400" align="left">IS013 Village Elders Contacts Report</td>
					<td width="157" align="left">6th Aug 2012</td>
					<td width="106" align="left"><a href="https://www.dropbox.com/s/n7nhtc76344fbds/IS013%20Village%20Elders%20Contacts%20Report%20%28491%20villages%29.xlsx">Download</a></td>
					<td width="306" align="left">491 villages</td>
					
				 </tr>
				 
			</thead>
			</tbody>
		 </div>
 </div>	
<div id="bdr">
   <div class="tbl">   
       <table id ="report">
	       <thead id="hide_tbl_header">
		        <tr>
					<td width="400" align="left">&nbsp;Report Name</td>
					<td width="38">
					<?php
					 $sptcheck_total  = pg_fetch_result($obj->calculateDashboardMetrics('total'),0);					
					 echo  $sptcheck_total;
					?>					
					</td>
				 </tr>           
				 <tr>
					<th width="400" align="left">Metric</th>
					<th width="157" align="left">Respondents No. </th>
					<th width="106" align="left">% of Total </th>
					<th width="83" align="left">n</th>
				 </tr>
			</thead>
       		   <tbody>
			   
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getDashboardVars();
		 while ($row = pg_fetch_array($result)) {
		          ?>
			   <tr>
				<td width="400" align="left">
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
				  	$rst = $obj->calculateDashboardMetrics($row['id']);
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
  
<!-- jquery and what not -->

  <script src="js_funcs/jquery.min.js" type="text/javascript"></script>
<script src="js_funcs/funcs.js" type="text/javascript"></script> 
<script src="js_funcs/export.js" type="text/javascript"></script> 

</div>
</div>


</body>
</html>
