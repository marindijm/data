<?php
require_once("rest.inc.php");
class API extends REST 
{
    function __construct(){
			parent::__construct();			// Init parent contructor
		
    }	
	function connectToDB()
	{
		 $dbc = pg_connect("host=127.0.0.1 port=5432 dbname=dsw_db user=postgres password=postgres");
		 if (!$dbc) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbc;    
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
			$this->response('',406);
		}	    
		 $sql = "SELECT * FROM waterpoint_summary";	
		 $this->getQueryData($sql);	//get query results	
		 
	}
	private function getWaterpointContacts()
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }	   
		 $sql = "SELECT * FROM waterpoint_contacts";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getWaterpointDetails()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406);
		}       
		 $id = (int)$this->_request['id'];//request for the sanitized waterpoint id		   
		 $sql = "SELECT * FROM waterpoint_summary WHERE waterpoint_id = '".$id."'";		
		 $this->getQueryData($sql);	//get query results	
	}
	private function getWaterpointContactDetails()
	{
	    // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
		 $id = (int)$this->_request['id'];//request for the sanitized waterpoint id		
		 $sql = "SELECT * FROM waterpoint_contacts WHERE waterpoint_id = '".$id."'";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getPromoterInfo()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getInstallationInfo()
	{
	 
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getSpotcheckInfo()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getCommunitySurveyInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	      $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getCemInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getHouseHoldInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $sql = "";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssues()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }			    
		 $sql = "SELECT * FROM issue";
		 $this->getQueryData($sql);	//get query results	
	}
	private function getIssueDetails()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
		 $id = (int)$this->_request['id'];//request for the sanitized issue id		   
		 $sql = "SELECT * FROM issue WHERE issueid ='".$id."'";
		 $this->getQueryData($sql);	//get query results	
		
	}
	private function getIssueDetailsByWaterpointID()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
		 $id = (int)$this->_request['id'];//request for the sanitized issue id		   
		 $sql = "SELECT * FROM issue WHERE waterpointid  ='".$id."'";
		 $this->getQueryData($sql);	//get query results	
		
	}
	private function createIssue()
	{
	
	 $wptid = $this->_request['wptid'];  
	 $createdby = $this->_request['createdby'];  
	 $issuetypeid = $this->_request['issuetypeid'];  
	 $createsourceid = $this->_request['createsourceid'];  
	 $userassigned = $this->_request['userassigned'];  
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
	if($this->get_request_method() != "POST"){
		$this->response('',406);
	}	   
	$sql = "INSERT INTO issue(waterpointid, date_time_created, status, user_assigned,issuetypeid, issuesourceid, createdby)
	   VALUES 
	  ('". $wptid."','".date("Y-m-d H:i:s")."', 'False', '".$userassigned."','". $issuetypeid ."','".$createsourceid."', '".$createdby."');";
	
	$this->setQueryData($sql,"Successfully created issue","Failed to create issue, query was ");	//set query results	
		 
 	}
	private function getQueryData($sql)// use central function to process all queries for gets 
	{
	    $conn = $this->connectToDB();
	    $query_result = pg_query($conn, $sql);
	    if(pg_num_rows($query_result) > 0)
		 {
			$result = array();
			while($rlt = pg_fetch_array($query_result, NULL, PGSQL_ASSOC))
			{
				$result[] = $rlt;
			}
			// If success everythig is good send header as "OK" and return list of users in JSON format
			$this->response($this->json($result), 200);
		  }
		  else
		  {
		      $this->response('',204);
		  }
		  pg_close($conn);
	}
	private function setQueryData($sql,$successmsg,$errormsg)// use central function to process all queries for posts/puts
	{
	    $conn = $this->connectToDB();
	    $query_result = pg_query($conn, $sql);
	    if($query_result)
		 {
			$success = array('status' => "Post Success", "msg" => $successmsg);
             $this->response($this->json($success),200);
		  }
		  else
		  {
		     $error = array('status' => "Post Failure", "msg" => $errormsg.$sql);
              $this->response($this->json($error), 400);
		  }
		 pg_close($conn);
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

