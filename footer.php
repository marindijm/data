<?php

$obj = new MainFuncs();//initialize the functions class
?>
</div><!--end of container-->
<div class="footer">
<table >
<tbody>
  <tr>
  
    <td>
		<div class="widget challenge rounded">
			<img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/challenge.png"  id="the_challenge" />
		</div>
    </td>
    <td>
		<div class="widget solution rounded">
			<img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/solution.png" alt=""  id="the_solution" />
		</div>
	</td>
    <td>
		<div class="widget evidence rounded">
			<img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/evidence.png" alt=""   id="the_evidence" />
		</div>
	</td>
    <td>
		<div class="widget models rounded">
			<img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/models.png" alt=""  id="models" />
		</div>
	</td>
    <td>
		<div class="widget partners rounded">
		 	<img src="<?php echo 'http://'.$obj->_domain.'/'; ?>images/partners.png" alt=""   id="partners" />
		 </div>
	 </td>
  </tr>
  </tbody>
</table>
</div>
<!-- load jquery first -->
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/jquery_cookie.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/jquery_blockUI.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/highcharts.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/exporting.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/grid.locale-en.js" type="text/javascript"></script> 
<script src="<?php echo 'http://'.$obj->_domain.'/'; ?>js_funcs/funcs.js" type="text/javascript"></script><!--load the javascript functions as the last thing in page-->
</body>
</html>