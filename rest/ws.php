<?php
require_once("rest.inc.php");
class API extends REST 
{
     function __construct(){
			parent::__construct();				// Init parent contructor
		
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
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM waterpoint_summary";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results		
		 pg_close($conn);
		 
	}
	private function getWaterpointContacts()
	{
	     // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM waterpoint_contacts";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results	
		 pg_close($conn);
	}
	private function getWaterpointDetails()
	{
	  	if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
       
		 $id = (int)$this->_request['id'];//request for the sanitized waterpoint id	
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM waterpoint_summary WHERE waterpoint_id = '".$id."'";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results	
		 pg_close($conn);
	}
	private function getWaterpointContactDetails()
	{
	    // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
		 $id = (int)$this->_request['id'];//request for the sanitized waterpoint id	
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM waterpoint_contacts WHERE waterpoint_id = '".$id."'";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results	
		 pg_close($conn);
	}
	private function getPromoterInfo()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 
		 //relevant query
		 pg_close($conn);
	}
	private function getInstallationInfo()
	{
	 
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	    $conn = $this->connectToDB();
		 
		 //relevant query
		 pg_close($conn);
	}
	private function getSpotcheckInfo()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 pg_close($conn);
	}
	private function getCommunitySurveyInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 pg_close($conn);
	}
	private function getCemInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 pg_close($conn);
	}
	private function getHouseHoldInfo()
	{
	 // Cross validation if the request method is GET else it will return "Not Acceptable" status
		if($this->get_request_method() != "GET"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 pg_close($conn);
	}
	private function getIssues()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }		
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM issue";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results	
		 pg_close($conn);
	}
	private function getIssueDetails()
	{
	   // Cross validation if the request method is GET else it will return "Not Acceptable" status
		 if($this->get_request_method() != "GET"){
			$this->response('',406);
		 }
		 $id = (int)$this->_request['id'];//request for the sanitized issue id	
	     $conn = $this->connectToDB();
		 $sql = "SELECT * FROM issue WHERE issueid ='".$id."'";
		 $query_result = pg_query($conn, $sql);
		 $this->getQueryData($query_result);	//get query results	
		 pg_close($conn);
	}
	private function createIssue($waterpointid,$createdby,$issuetypeid,$createsourceid)
	{
	 // Cross validation if the request method is POST else it will return "Not Acceptable" status
		if($this->get_request_method() != "POST"){
			$this->response('',406);
		}
	     $conn = $this->connectToDB();
		 pg_close($conn);
 	}
	private function getQueryData($query_result)// for gets only
	{
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

