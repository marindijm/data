<?php
 //header file
include 'php_funcs/header.php';
?>
 <div class="top_header">Program Datasets</div>     
			  <br/>
	<div class="ds_tbl">
			<table>	
						 
			<tbody>
				 <tr><td width="169"><a href="#repbox1" id="ds"><img src="images/thumb.png"/><br/>Waterpoint Summary</a></td> </tr>	
				 <tr><td><a href="#repbox2" id="ds"><img src="images/thumb.png"/><br/>Chlorine Delivery</a></td></tr>
				 <tr><td><a href="#repbox3" id="ds"><img src="images/thumb.png"/><br/> Miscellanous information</a></td></tr>	
					
			</tbody>
			</table>
			
			
			<div class="repbox" id="repbox1">
				<div class="center_header" id="desc">Description</div>
				 This dataset includes  all the waterpoints plus relevant info i.e. districts, counties, divisions, directions, promoter info, location, village elder contacts etcetera.	
				 <br/><br/>
				 <a href="dl/summary" class="export_rpt" id="dl1">Download Dataset</a>		
	        </div>
			
			<div class="repbox" id="repbox2">
				<div class="center_header" id="desc">Description</div>
					This dataset, is of all the chlorine delivery records since the inception of the program
					<br/>
					 <br/>
					  <div style="display:none" id="dvloader"><img src="images/loading.gif" /></div>
				  <br/>
					 <a href="dl/cd" class="export_rpt" id="dl">Download Dataset</a>			
	        </div>
			<div class="repbox" id="repbox3">
				<div class="left_header" id="desc">Description</div>
			        A compilation of all other information pertaining a waterpoint which is not in the summary
			     <br/>	
				  <br/>
				   <div style="display:none" id="dvloader"><img src="images/loading.gif" /></div>
				  <br/>
			   <a href="dl/misc" class="export_rpt" id="dl">Download Dataset</a>			
	        </div>
  </div>

<?php 
//footer file
include 'php_funcs/footer.php'; ?>
