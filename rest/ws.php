<?php
include '../funcs.php';
include 'rest.inc.php';
class API extends REST 
{
    private $pnode ='';
	private $cnode ='';

    function __construct(){
			parent::__construct();			// Init parent contructor
		
    }	

	//Public method for access api.
    //This method dynmically call the method based on the query string
	public function processApi()
	{
	
		$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
		if((int)method_exists($this,$func) > 0)
			$this->$func();
		else
			$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
    }
	private function getWaterpointSummary()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		}
		
		//set the xml nodes just in case xml is requested	
		$this->pnode = 'waterpoints';
		$this->cnode = 'waterpoint';    
		 $sql = "SELECT * FROM waterpoint_summary";	
		 $this->getQueryData($sql);	//get query results	
		 
	}
	private function getTableCount()//get row counts from any of da tables
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
    	  $tbl = $this->_request['tbl'];//request for the sanitized waterpoint id	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'counts';
		$this->cnode = 'count';     
		 $sql = "SELECT count(*) as cnt FROM ".$tbl;		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssueNotResolvedCountByUser()//get row counts from any of da tables
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
    	  $id = $this->_request['id'];//request for the sanitized waterpoint id	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'counts';
		$this->cnode = 'count';     
		 $sql = "SELECT count(*) as cnt FROM issue WHERE user_assigned =".$id." and status = 'false'";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getWaterpoints()//basic waterpoint info apart from view
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'waterpoints';
		$this->cnode = 'waterpoint';     
		 $sql = "SELECT * FROM waterpoints_mobi order by waterpoint_id";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getWaterpointsRecentlySynced()//basic waterpoint info apart from view
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'waterpoints';
		$this->cnode = 'waterpoint';     
		 $sql = "SELECT * FROM waterpoints_mobi where has_been_recently_synced ='true' order by waterpoint_id";		
		 $this->getQueryData($sql);	//get query results	
	}
	
	private function getsublocations()
	{
	       // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'sublocations';
		$this->cnode = 'sublocation';     
		 $sql = "SELECT * FROM sublocations order by sublocation_id";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getvillages()
	{
	        // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }	
		 //set the xml nodes just in case xml is requested	
		$this->pnode = 'villages';
		$this->cnode = 'village';     
		 $sql = "SELECT * FROM villages order by village_id";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getWaterpointDetails()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406,"");
		}   
		//set the xml nodes just in case xml is requested	
		$this->pnode = 'waterpoints';
		$this->cnode = 'waterpoint';        
		 $id = (int)$this->_request['id'];//request for the sanitized waterpoint id		   
		 $sql = "SELECT * FROM waterpoints WHERE waterpoint_id = '".$id."'";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssueTypes()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406,"");
		}   
		//set the xml nodes just in case xml is requested	
		$this->pnode = 'issue_types';
		$this->cnode = 'issue_type';        
		
		 $sql = "SELECT * FROM issuetype";		
		 $this->getQueryData($sql);	//get query results	
	}
	
	private function getRegionalOffices()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406,"");
		}   
		//set the xml nodes just in case xml is requested	
		$this->pnode = 'regional_offices';
		$this->cnode = 'regional_office';        
		
		 $sql = "SELECT * FROM regional_office";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getUsers()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406,"");
		}   
		//set the xml nodes just in case xml is requested	
		$this->pnode = 'users';
		$this->cnode = 'user';        
		   
		 $sql = "SELECT * FROM users";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssues()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }
		  //set the xml nodes just in case xml is requested	
		$this->pnode = 'issues';
		$this->cnode = 'issue';  			    
		 $sql = "SELECT issueid,waterpointid,
				(SELECT waterpoint_name FROM waterpoints WHERE waterpoint_id = waterpointid) AS   waterpoint_name, 
				(SELECT issuetypename FROM issuetype WHERE issuetype.issuetypeid=issue.issuetypeid) AS issuetype, 
				(SELECT username FROM users WHERE user_id=createdby) AS owner, status
				 FROM issue  ORDER BY  issueid";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssueDetails()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }
		 $this->pnode = 'issues';
		$this->cnode = 'issue';  	
		 $id = (int)$this->_request['id'];//request for the sanitized issue id		   
		 $sql = "SELECT * FROM issue WHERE issueid ='".$id."'";
		 $this->getQueryData($sql);	//get query results	
		
	}
	private function getIssuesAssigned()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }
		 $this->pnode = 'issues';
		 $this->cnode = 'issue';  	
		 $id = (int)$this->_request['id'];//request for the sanitized issue id		   
		 $sql = "SELECT issueid, waterpointid,
				(SELECT waterpoint_name FROM waterpoints WHERE waterpoint_id = waterpointid) AS   waterpoint_name, 
				date_created, status, 	(SELECT username FROM users WHERE user_id=user_assigned) AS user_assigned,
				(SELECT issuetypename FROM issuetype WHERE issuetype.issuetypeid=issue.issuetypeid) AS issuetype, 
			 date_resolved,user_comments
				 FROM issue WHERE user_assigned ='".$id."' AND status ='false' ORDER BY  waterpointid";
		 
		 $this->getQueryData($sql);	//get query results	
		
	}
	private function getIssuesByWaterpointID()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406,"");
		 }
		 $this->pnode = 'issues';
		$this->cnode = 'issue';  	
		 $id = (int)$this->_request['id'];//request for the sanitized issue id		   
		 $sql = "SELECT * FROM issue WHERE waterpointid  ='".$id."'";
		 $this->getQueryData($sql);	//get query results	
		
	}
	private function createIssue()
	{
	//first of all sanitize the inputs to prevent code injections
	 $wptid = $this->_request['wptid'];  
	 $createdby = $this->_request['createdby'];  
	 $issuetypeid = $this->_request['issuetypeid'];  
	 $createsourceid = $this->_request['createsourceid'];  
	 $userassigned = $this->_request['userassigned'];  
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
	if($this->get_request_method() != "POST"){
		$this->response('',406,"");
	}	   
	$sql = "INSERT INTO issue(waterpointid, date_created, status, user_assigned,issuetypeid, issuesourceid, createdby)
	   VALUES 
	  ('". $wptid."','".date("Y-m-d H:i:s")."', 'False', '".$userassigned."','". $issuetypeid ."','".$createsourceid."', '".$createdby."');";
	
	$this->setQueryData($sql,"Successfully created issue","Failed to create issue, query was ".$sql);	//set query results	
		 
 	}
	private function setPhoneDetails()
	{
	//first of all sanitize the inputs to prevent code injections
	 $imeinumber = $this->_request['imei'];  
	 $username = $this->_request['username'];
	 $staffid = $this->_request['staffid'];  
	 $email = $this->_request['email'];  
	 $phonemodel = $this->_request['phonemodel'];
	  $phonebrand = $this->_request['phonebrand'];  
	 $androidversion = $this->_request['androidversion'];  
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
	if($this->get_request_method() != "POST"){
		$this->response('',406,"");
	}	   
	$sql = "INSERT INTO phonedetails(imei, username, staffid, email, phonemodel,phonebrand, androidversion, date_updated)
	   VALUES 
	  ('". $imeinumber."','".$username."', '".$staffid."', '".$email."','". $phonemodel ."','".$phonebrand."','".$androidversion."',
	   '".date("Y-m-d H:i:s")."');";
	
	$this->setQueryData($sql,"Successfully posted phone details","Failed to post phone details, query was ".$sql);	//set query results	
		 
 	}
	private function updateWaterpointDetails()
	{
	//first of all sanitize the inputs to prevent code injections
	 $waterpointid = $this->_request['waterpointid'];  
	 $waterpointname = $this->_request['waterpointname'];
	 $dist_name = $this->_request['dist_name'];
	 $div_name = $this->_request['div_name'];   
	 $loc_name = $this->_request['loc_name'];  
	 $subloc_name = $this->_request['subloc_name'];  
	 $vill_name = $this->_request['vill_name'];
	 $directions = $this->_request['directions']; 
	 $landowner_name = $this->_request['lowner']; 
	 $landowner_contact1 = $this->_request['lowner_contact1'];
     $landowner_contact2 = $this->_request['lowner_contact2']; 
	 $nearest_boma_name = $this->_request['nearest_boma_name']; 
	 $nearest_boma_contact1 = $this->_request['nearest_boma_contact1'];
     $nearest_boma_contact2 = $this->_request['nearest_boma_contact2']; 
     $village_elder_name = $this->_request['vill_elder']; 
	 $village_elder_contact1 = $this->_request['vill_contact1'];
     $village_elder_contact2 = $this->_request['vill_contact2']; 
	 $promoter_name = $this->_request['pname']; 
	 $promoter_contact1 = $this->_request['pcontact1'];
     $promoter_contact2 = $this->_request['pcontact2']; 
	 $assistant_promoter_name = $this->_request['assist_pname']; 
	 $assistant_promoter_contact1 = $this->_request['assist_pcontact1'];
     $assistant_promoter_contact2 = $this->_request['assist_pcontact2']; 
	  $staffid = $this->_request['staffid'];  
	 
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
	if($this->get_request_method() != "POST"){
		$this->response('',406,"");
	}	   
	$sql = "UPDATE waterpoints_mobi
       SET waterpoint_name='".$waterpointname."', district_name='".$dist_name."',
       division_name='".$div_name."', location_name='".$loc_name."', sublocation='".$subloc_name."', 
	   village='".$vill_name."', directions='".$directions."',  landowner_name='".$landowner_name."', 
	   landowner_contact1 ='".landowner_contact1."',  landowner_contact2 ='".landowner_contact2."',
	    nearest_boma_name ='".$nearest_boma_name."',   nearest_boma_contact1='". $nearest_boma_contact1."', 
		nearest_boma_contact2 ='". $nearest_boma_contact2."',village_elder_name='". $village_elder_name."',
		 village_elder_contact1='".$village_elder_contact1."', village_elder_contact2='".$village_elder_contact2."', 
       promoter='".$promoter_name."', promoter_contact_1='".$promoter_contact1."', promoter_contact_2='".$promoter_contact2 ."',  assistant_promoter='".$assistant_promoter_name."', assistant_promoter_contact_1='".$assistant_promoter_contact1."', assistant_promoter_contact_2='".$assistant_promoter_contact2."', synced_by= synced_by + '  [".$staffid." - ".date("Y-m-d H:i:s")."]', 
	   has_been_recently_synced ='true'  WHERE waterpoint_id='".$waterpointid."';";
	
	$this->setQueryData($sql,"Successfully updated waterpoint details","Failed to updated waterpoint details, query was ".$sql);	//set query results	
		 
 	}
	
	
	private function resolveIssue()
	{
	//first of all sanitize the inputs to prevent code injections
	 $issueid = $this->_request['issueid']; 
	  $comments = $this->_request['comments'];  
	 $status = "true";  
	 $date_resolved = $this->_request['date_resolved'];  
	$resolvedby = $this->_request['resolved_by'];  
	
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
	if($this->get_request_method() != "POST"){
		$this->response('',406,"");
	}	   
	$sql = "UPDATE issue  SET  status='".$status."', resolvedby='".$resolvedby."', date_resolved='".$date_resolved."', 
       user_comments='".$comments."'   WHERE issueid ='".$issueid."'";
	
	$this->setQueryData($sql,"Successfully marked issue has resolved","Failed to resolve issues, query was ".$sql);	//set query results	
		 
 	}
	private function getQueryData($sql)// use central function to process all queries for gets 
	{
	    $obj = new MainFuncs(); 
	    $query_result = $obj->processReturnQuery($sql,'dsw_db');//
	    if(pg_num_rows($query_result) > 0)
		 {
			$result = array();
			while($rlt = pg_fetch_array($query_result, NULL, PGSQL_ASSOC))
			{
				$result[] = $rlt;
			}
			// If success everythig is good send header as "OK" and return list of users in JSON format
			$returnformat = 'json';
			 $format = (string)@$this->_request['format'];
			 if(!empty($format))
			 {
			   $returnformat = $format;
			 }
			if($returnformat =='json')
			{
			   $this->response($this->json($result), 200,$returnformat);
			}
			else
			{
			   //$this->response($this->genXML($query_result,'issues','issue'), 200,$returnformat);
			   $query_result =  $obj->processReturnQuery($sql,'dsw_db');//
			 //  $this->genXML($query_result);
			 $this->response($this->genXML($query_result,$this->pnode,$this->cnode), 200,$returnformat);
			 }
		  }
		  else
		  {
		      $this->response('',204,'');
		  }
		  pg_close($conn);
	}
	
	private function setQueryData($sql,$successmsg,$errormsg)// use central function to process all queries for posts/puts
	{
	     $obj = new MainFuncs(); 
	    $query_result = $obj->processReturnQuery($sql,'dsw_db');//
	    if($query_result)
		 {
			$success = array('status' => "Post Success", "msg" => $successmsg);
             $this->response($this->json($success),200,"");
		  }
		  else
		  {
		     $error = array('status' => "Post Failure", "msg" => $errormsg.$sql);
              $this->response($this->json($error), 400,"");
		  }
		 pg_close($conn);
	}
	private function genXML($result,$rootnode,$childnode)
	{ 
	   // Create XML document
		$doc = new DomDocument('1.0', 'UTF-8');
		
		// Create root node
		$root = $doc->createElement($rootnode);
		$root = $doc->appendChild($root);
		
		while ($row = pg_fetch_assoc($result)) {
			// add node for each row
		
			$node = $doc->createElement($childnode);
			$node = $root->appendChild($node);
		
			foreach ($row as $column => $value) {
				$columnElement = $doc->createElement($column);
				$columnElement = $node->appendChild($columnElement);
		
				$columnValue = $doc->createTextNode($value);
				$columnValue = $columnElement->appendChild($columnValue);
			}
		
		
		}
	        	
		// Complete XML document
		$doc->formatOutput = true;
		$xmlContent = $doc->saveXML();
		echo $xmlContent;
	}
	/*
	 *	Encode array into JSON
	*/
	private function json($data){
		if(is_array($data)){
			return json_encode($data);
		}
	}
}
	// Initiiate Library
	
	$api = new API;
	$api->processApi();

?>
