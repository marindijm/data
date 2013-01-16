<<<<<<< HEAD
<?php
	/* File : Rest.inc.php
	 * Author : Arun Kumar Sekar
	*/
	class REST {
		
		public $_allow = array();
		public $json_content_type = "application/json";
		public $xml_content_type = "application/xml";
		public $_request = array();
		 
		private $_method = "";		
		private $_code = 200;
		
		public function __construct(){
			$this->inputs();
		}
		
		public function get_referer(){
			return $_SERVER['HTTP_REFERER'];
		}
		
		public function response($data,$status,$format){
			$this->_code = ($status)?$status:200;
			$this->set_headers($format);
			echo $data;
			exit;
		}
		
		private function get_status_message(){
			$status = array(
						100 => 'Continue',  
						101 => 'Switching Protocols',  
						200 => 'OK',
						201 => 'Created',  
						202 => 'Accepted',  
						203 => 'Non-Authoritative Information',  
						204 => 'No Content',  
						205 => 'Reset Content',  
						206 => 'Partial Content',  
						300 => 'Multiple Choices',  
						301 => 'Moved Permanently',  
						302 => 'Found',  
						303 => 'See Other',  
						304 => 'Not Modified',  
						305 => 'Use Proxy',  
						306 => '(Unused)',  
						307 => 'Temporary Redirect',  
						400 => 'Bad Request',  
						401 => 'Unauthorized',  
						402 => 'Payment Required',  
						403 => 'Forbidden',  
						404 => 'Not Found',  
						405 => 'Method Not Allowed',  
						406 => 'Not Acceptable',  
						407 => 'Proxy Authentication Required',  
						408 => 'Request Timeout',  
						409 => 'Conflict',  
						410 => 'Gone',  
						411 => 'Length Required',  
						412 => 'Precondition Failed',  
						413 => 'Request Entity Too Large',  
						414 => 'Request-URI Too Long',  
						415 => 'Unsupported Media Type',  
						416 => 'Requested Range Not Satisfiable',  
						417 => 'Expectation Failed',  
						500 => 'Internal Server Error',  
						501 => 'Not Implemented',  
						502 => 'Bad Gateway',  
						503 => 'Service Unavailable',  
						504 => 'Gateway Timeout',  
						505 => 'HTTP Version Not Supported');
			return ($status[$this->_code])?$status[$this->_code]:$status[500];
		}
		
		public function get_request_method(){
			return $_SERVER['REQUEST_METHOD'];
		}
		
		private function inputs()
		{
	$obj = new MainFuncs(); 
			switch($this->get_request_method()){
				case "POST":
					$this->_request = $obj->sanitize($_POST);
					break;
				case "GET":
				   $this->_request = $obj->sanitize($_GET);
					break;
				case "DELETE":
					$this->_request = $obj->sanitize($_GET);
					break;
				case "PUT":
					parse_str(file_get_contents("php://input"),$this->_request);
					$this->_request = $obj->sanitize($this->_request);
					break;
				default:
					$this->response('',406);
					break;
			}
		}	
		
		private function set_headers($format){
			header("HTTP/1.1 ".$this->_code." ".$this->get_status_message());
			//header("Content-Type:".$this->_content_type);
			if($format =='json')
			{
			   header("Content-Type:".$this->json_content_type);
			}
			else
			{
			   header("Content-Type:".$this->xml_content_type);
			}
		}
	}	
=======
<?php
	/* File : Rest.inc.php
	 * Author : Arun Kumar Sekar
	*/
	class REST {
		
		public $_allow = array();
		public $json_content_type = "application/json";
		public $xml_content_type = "application/xml";
		public $_request = array();
		 
		private $_method = "";		
		private $_code = 200;
		
		public function __construct(){
			$this->inputs();
		}
		
		public function get_referer(){
			return $_SERVER['HTTP_REFERER'];
		}
		
		public function response($data,$status,$format){
			$this->_code = ($status)?$status:200;
			$this->set_headers($format);
			echo $data;
			exit;
		}
		
		private function get_status_message(){
			$status = array(
						100 => 'Continue',  
						101 => 'Switching Protocols',  
						200 => 'OK',
						201 => 'Created',  
						202 => 'Accepted',  
						203 => 'Non-Authoritative Information',  
						204 => 'No Content',  
						205 => 'Reset Content',  
						206 => 'Partial Content',  
						300 => 'Multiple Choices',  
						301 => 'Moved Permanently',  
						302 => 'Found',  
						303 => 'See Other',  
						304 => 'Not Modified',  
						305 => 'Use Proxy',  
						306 => '(Unused)',  
						307 => 'Temporary Redirect',  
						400 => 'Bad Request',  
						401 => 'Unauthorized',  
						402 => 'Payment Required',  
						403 => 'Forbidden',  
						404 => 'Not Found',  
						405 => 'Method Not Allowed',  
						406 => 'Not Acceptable',  
						407 => 'Proxy Authentication Required',  
						408 => 'Request Timeout',  
						409 => 'Conflict',  
						410 => 'Gone',  
						411 => 'Length Required',  
						412 => 'Precondition Failed',  
						413 => 'Request Entity Too Large',  
						414 => 'Request-URI Too Long',  
						415 => 'Unsupported Media Type',  
						416 => 'Requested Range Not Satisfiable',  
						417 => 'Expectation Failed',  
						500 => 'Internal Server Error',  
						501 => 'Not Implemented',  
						502 => 'Bad Gateway',  
						503 => 'Service Unavailable',  
						504 => 'Gateway Timeout',  
						505 => 'HTTP Version Not Supported');
			return ($status[$this->_code])?$status[$this->_code]:$status[500];
		}
		
		public function get_request_method(){
			return $_SERVER['REQUEST_METHOD'];
		}
		
		private function inputs()
		{
	$obj = new MainFuncs(); 
			switch($this->get_request_method()){
				case "POST":
					$this->_request = $obj->sanitize($_POST);
					break;
				case "GET":
				   $this->_request = $obj->sanitize($_GET);
					break;
				case "DELETE":
					$this->_request = $obj->sanitize($_GET);
					break;
				case "PUT":
					parse_str(file_get_contents("php://input"),$this->_request);
					$this->_request = $obj->sanitize($this->_request);
					break;
				default:
					$this->response('',406);
					break;
			}
		}	
		
		private function set_headers($format){
			header("HTTP/1.1 ".$this->_code." ".$this->get_status_message());
			//header("Content-Type:".$this->_content_type);
			if($format =='json')
			{
			   header("Content-Type:".$this->json_content_type);
			}
			elseif($format =='xml')
			{
			   header("Content-Type:".$this->xml_content_type);
			}
			else
			{
				 header("Content-Type:text/plain");
			}
		}
	}	
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
?>