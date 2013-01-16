<?php
include 'php_funcs/funcs.php';

 $obj = new MainFuncs(); 
 //header file
include 'php_funcs/header.php';

 ?>
 
<div class="top_header">Field Tools</div>
	     
			  <br/>
			 <div class="rep_tbl">
			<table>				 
			<tbody>
				 <tr>
				<td width="342"><p><a href="#repbox1" id="rep"><img src="images/icon_bug_1.png"></a><br/>Issue Tracker</p></td>					
				<td width="391"><p><a href="#repbox2" id="rep"><img src="images/dsw_logo.png"></a><br/>Chlorine Delivery Manager</p></td>
				<td width="308"><p><a href="#repbox3" id="rep"><img src="images/map.png"></a><br/>Dispenser Map</p></td>
				 </tr>	
								
			</tbody>
	  </table>
	  	<div class="repbox" id="repbox1">
			<div class="center_header" id="desc">Description</div>
			A tool for tracking chlorine dispenser issues.		
	  </div>
		 <div class="repbox" id="repbox2">
		<div class="center_header" id="desc">Description</div>
		  A tool for managing the delivery of chlorine.
		
		 </div>
		 <div class="repbox" id="repbox3">
			<div class="center_header" id="desc">Description</div>
		An interactive map showing the location of all dispensers in the program.
		</div>	
 </div>
	
		

<?php 
//footer file
include 'php_funcs/footer.php'; ?>