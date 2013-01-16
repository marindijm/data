<?php
include 'php_funcs/funcs.php';
//header file
include 'php_funcs/header.php';

$obj = new MainFuncs(); 
 
 ?>
<div class="top_header">Program Reports</div>	     
			  <br/>
	<div class="rep_tbl">
			<table>				 
			<tbody>
				 <tr>
				<td width="342"><p><a href="#repbox1" id="rep"><img src="images/live_rep.png"></a><br/>Live Reports</p></td>					
				<td width="391"><p><a href="#repbox2" id="rep"><img src="images/motorcycle_rep.png"></a><br/>Motorcycle Reports</p></td>
				<td width="308"><p><a href="#repbox3" id="rep"><img src="images/random.png"></a><br/>Other Statistics </p></td>
				 </tr>	
								
			</tbody>
	  </table>
	  	<div class="repbox" id="repbox1">
			<div class="center_header" id="desc">Description</div>
			 These reports display live feedback for select surveys e.g. Spotcheck Surveys.
			 <table>
				 <tbody>
				  <tr>
					  <td width="223"><a href="cd/"><img src="images/thumb.png"/></a><br/>Live Chlorine Delivery Report</td>
					  <td width="218"><a href="oaf/"><img src="images/thumb.png"/></a><br/>Ongoing OAF Spotcheck</td>
					  <td width="239"><a href="moe/"><img src="images/thumb.png"/></a><br/>Completed MOE Spotcheck</td>
					  <td width="281"><a href="mph/"><img src="images/thumb.png"/></a><br/>Completed MoPHS Spotcheck</td>									
				  </tr>
				  </tbody>
			  </table>
	  </div>
		 <div class="repbox" id="repbox2">
		<div class="center_header" id="desc">Description</div>
		  The most up to date motorcycle records.
		<table>
		 <tbody>
		  <tr>
				<td width="216"><a href="mr/sum" id="#"><img src="images/thumb.png"/></a><br/>Motorcycle Summary</td>
				<td width="276"><a href="mr/d" id="#"><img src="images/thumb.png"/></a><br/>Motorcycle Details</td>
				<td width="222"><a href="mr/ma" id="#"><img src="images/thumb.png"/></a><br/>Monthly Analysis</td>
				<td width="279"><a href="mr/mc" id="#"><img src="images/thumb.png"/></a><br/>Total Maintenance Cost</td>
			</tr>
			<tr>
				<td><a href="mr/fc1" id="#"><img src="images/thumb.png"/></a><br/>Total Fuel Cost</td>
				<td><a href="mr/fc" id="#"><img src="images/thumb.png"/></a><br/>Total Fuel Consumed</td>
				<td><a href="mr/km" id="#"><img src="images/thumb.png"/></a><br/>Kilometres Covered</td>
				<td><a href="mr/kml" id="#"><img src="images/thumb.png"/></a><br/>Kilometres Covered Per Litre</td>
		    </tr>
			<tr>
				<td><a href="mr/tck" id="#"><img src="images/thumb.png"/></a><br/>Total Cost Per Kilometre</td>
				<td><a href="mr/tc" id="#"><img src="images/thumb.png"/></a><br/>Total Cost</td>
				
		    </tr>
		  </tbody>
		 </table>
		 </div>
		 <div class="repbox" id="repbox3">
			<div class="center_header" id="desc">Description</div>
			 Other statistics about the program
		</div>	
 </div>

<?php 
//footer file
include 'php_funcs/footer.php'; ?>