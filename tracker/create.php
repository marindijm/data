<?php
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }
 include '../header.php'; 

 if(isset($_POST['submit'])) //page self call
 {
   $obj = new MainFuncs();//initialize the main class.
   extract($_POST);//get the post variables.
   $url = 'http://localhost/data/rest/issues/createissue'; //use localhost in this case because execution is in the server.
   
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

 
  <div class ="crt"> <!--disable this for time being until we get feedback from evans-->
  	<fieldset>
	<legend>Import From CSV/XML</legend>
	<input type="file" name="somename" size="34" disabled="disabled" >	
	</fieldset>
	<br/>
	
	
 <form id="frmCreateIssue" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="application/x-www-form-urlencoded">
	<fieldset>
    	<legend>Create Issue</legend>	
		
<div id="dialog" title="Select Waterpoint" style="display:none"> 
	 <table id="list1"></table>
	<div id="pager1"></div>
	<a href="" id="a1">Get Selected Waterpoint</a>
 </div>  
   <a href="#" id="dialog_link">Select Waterpoint</a>
   <br/>  
			<label>Waterpoint ID:  </label><input id="wptid" name="wptid" disabled="disabled"  />
		
	
	<label>
	Waterpoint Name:
	</label>
    	<input name="wptname" id="wptname" type="text" maxlength="80" disabled="disabled" />
		 <br/><br/>
	<label>Issue</label><select name="issue_type" id="issuetypeoptions"></select>
	<br/><br/>
	<label>Assign To</label><select name="assign_to" id="usersoptions"></select>
	<br/><br/>
	<input name="submit" type="submit" id="submit" value="Create Issue" />
	</fieldset>
        </form>
   
	
	
  

<?php include '../footer.php'; ?>
