<?php
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }
 include '../php_funcs/header.php'; 
 include '../php_funcs/funcs.php'; //include all the functions to be used all the pages 

 if(isset($_POST['submit'])) //page self call
 {
   $obj = new MainFuncs();//initialize the main class.
   extract($_POST);//get the post variables.
   $url = 'http://localhost/rest/issues/createissue'; //use localhost in this case because execution is in the server.
   
   //encode the post variables
   $fields = array(
            'wptid' => urlencode($wpt_id),
            'createdby' => urlencode($assign_to),
            'issuetypeid' => urlencode($issue_type),
            'createsourceid' => urlencode('1'),//just for now
            'userassigned' => urlencode($assign_to)
        );
	//url-ify the data for the POST
	$params = array();
	foreach($fields as $key=>$value) { array_push($params, $key.'='.$value); }
	$params = implode('&', $params);
	
  $obj->curl_request($url,  $params); //post the data
 }
 ?>

 <div class="top_header">Create Issue(s)</div>

 
  <div class ="crt"> <!--disable this for time being until we get feedback from evana-->
  	<fieldset>
	<legend>Import From CSV/XML</legend>
	<input type="file" name="somename" size="34" disabled="disabled" >	
	</fieldset>
	<br/>
	
	
 <form id="frmCreateIssue" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="application/x-www-form-urlencoded">
	<fieldset>
    	<legend>Create Issue</legend>	
		<div class="ui-widget">
			<label for="wpts_id">Waterpoint ID:  </label>
			<input id="wpts_id" name="wpt_id" />
		</div>
	
	<label>
	Waterpoint Name:
	</label>
    	<input name="wptname" type="text" maxlength="80" disabled="disabled" />
		 <br/><br/>
	<label>Issue</label><select name="issue_type" id="issuetypeoptions"></select>
	<br/><br/>
	<label>Assign To</label><select name="assign_to" id="usersoptions"></select>
	<br/><br/>
	<input name="submit" type="submit" id="submit" value="Create Issue" />
	</fieldset>
        </form>
   
	
	
  

<?php include '../php_funcs/footer.php'; ?>
