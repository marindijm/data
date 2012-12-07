<?php
class MainFuncs
{
   public $_domain = 'data.safe-water.org';
   
	function connectToDB($dbname)
	{
		 $dbc = pg_connect("host=127.0.0.1 port=5432 dbname=".$dbname." user=postgres password=postgres");
		 if (!$dbc) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbc;    
	}
	
	function loginUser()
	{
	 
	    $openid = new LightOpenID($this->_domain);
 
		$openid->identity = 'https://www.google.com/accounts/o8/id';
		$openid->required = array(
		  'namePerson/first',
		  'namePerson/last',
		  'contact/email',
		);
	
		$openid->returnUrl = 'http://'.$this->_domain.'/login.php?auth=yes';
		
		return $openid->authUrl();//return the authentication url
	}
	function authenticateUser()
	{
		 $openid = new LightOpenID($this->_domain);
		 
 
		 if ($openid->mode) 
		 {
			if ($openid->mode == 'cancel')
			{
				echo "User has canceled authentication !";
			}
			elseif($openid->validate()) 
			{
				$data = $openid->getAttributes();
				$email = $data['contact/email'];
				$first = $data['namePerson/first'];
				$last = $data['namePerson/last'];
				
				//set the necessary session vars
				$_SESSION['googleidentity'] = $openid->identity;
				$_SESSION['username'] = $first.'  '.$last;
				$_SESSION['fname'] = $first;
				$_SESSION['lname'] = $last;
				
				$this->logUser($openid->identity,$email,date("Y-m-d H:i:s"),session_id(),$first.'  '.$last);//logdetails of user for audit trail purposes
				header("location:index.php");//if not redirect to the login page
			} 
			else 
			{
				echo "The user has not logged in";
			}
		} 
		else {
			echo "Go to index page to log in.";
		}
	}
	
	//chlorine delivery report  functions
	function getProgramCode()
	{
	     // execute query
		 $sql = "SELECT * FROM  chlorine_delivery.reference_pilots order by id";
		 return $this->processCDQueries($sql);
	}
	function getJerricansConsumed($prog_code)
	{
	     // execute query
		 $sql = "SELECT SUM(cr206) as cl_consumed FROM  
		 chlorine_delivery.dashboard_tbl WHERE cr104 = '".$prog_code."' or cr104_other =  '".$prog_code."'";
		 return $this->processCDQueries($sql);
	}
	function getJerricansDelivered($prog_code)
	{
	   // execute query
		 $sql = "SELECT SUM(cr205) as cl_consumed FROM  
		 chlorine_delivery.dashboard_tbl WHERE cr104 = '".$prog_code."' or cr104_other =  '".$prog_code."'";
		 return $this->processCDQueries($sql);
	}
	function getTotalWaterpoints($prog_code)
	{
	      // execute query
		 $sql = "SELECT disp_count FROM  
		 chlorine_delivery.pilot_disp_count WHERE pilot_name = '".$prog_code."'";
		 return $this->processCDQueries($sql);
	}
	function getMonthsRecsActive($prog_code)
	{
	   
	   // execute query
		 $sql = "SELECT  total_months_of_chlorine_supply FROM  chlorine_delivery.reference_pilots WHERE  pilot_name  = '".$prog_code."'";
		return $this->processCDQueries($sql);
	}
	function getPilotInfo()
	{
	    
	   // execute query
		 $sql = "SELECT * FROM chlorine_delivery.reference_pilots ORDER BY id";
		 return $this->processCDQueries($sql);
		
	}
	private function processCDQueries($sql)
	{
	    $conn = $this->connectToDB('odk_prod');
		//die($conn);
	   $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	//spotcheck queries
	function getDashboardVars($schema,$var)
	{
	      // execute query
		 $sql = "SELECT * FROM ".$schema.".dashboard_vars where substr(var_type, 1, 9) = '".$var."' order by id";
		 return $this->processReturnQuery($sql,'odk_prod');
	}
	function calculateDashboardMetrics($schema,$var)
	{
	   
	   // execute query
	     $sql ='';
		if($var == 'total')
		{
		  $sql = "SELECT count(*) as cnt FROM  ".$schema.".new_".$schema."_survey_tbl";
		}
		if($var == 'survey_start')
		{
		  $sql = "SELECT r101 FROM  ".$schema.".new_".$schema."_survey_tbl order by r101 LIMIT 3";
		}
		if($var == 'survey_stop')
		{
		  $sql = "SELECT r101 FROM  ".$schema.".new_".$schema."_survey_tbl order by r101 DESC";
		 
		}
	    if($var == '1')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r210 = '0'";
		}
		if($var == '2')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r210 = '1'";
		}
		if($var == '3' or $var == '4'  or $var == '5' or $var == '6' or $var == '7' or $var == '8' or $var == '9' or $var == '10' 
		     or $var == '11' or $var == '12' or $var == '13'or $var == '14'or $var == '15' or $var == '16' or $var == '17')
		{
		$choiz = pg_fetch_result($this->getSurveyChoice($schema,$var),0);
		  $sql = "select count(*) as rst from (select unnest(string_to_array(r211,' ')) as r211 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r211 ='".$choiz."'";
		}
		if($var == '18')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r209 = '0'";
		}
		if($var == '19')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r212b = '0'";
		}
		if($var == '20')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r213 = '0'";
		}
		if($var == '21')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r210 = '9667y5645t453354'";//immpossibru
		}
		if($var == '22' or $var == '23' or $var == '24' or $var == '25' or $var == '26' or $var == '27')
		{
		$choiz = pg_fetch_result($this->getSurveyChoice($schema,$var),0);
		 $sql = "select count(*) as rst from (select unnest(string_to_array(r218,' ')) as r218 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r218 ='".$choiz."'";
		}
		if($var == '28')
		{
		  $sql = "SELECT  sum(rst) as rst
              FROM( select count(*) as rst from (select unnest(string_to_array(r303,' ')) as r303 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r303 ='7'
		   UNION ALL  select count(*) as rst from (select unnest(string_to_array(r403,' ')) as r403 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r403 ='7') AS tot";
		}
		if($var == '29')
		{
		  $sql = "select count(*) as rst from (select unnest(string_to_array(r303,' ')) as r303 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r303 ='7'";
		}
		if($var == '30')
		{
		 $sql = "select count(*) as rst from (select unnest(string_to_array(r403,' ')) as r403 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r403 ='7'";
		}
		if($var == '31')
		{
		  $sql = "SELECT  sum(rst) as rst
                   FROM( SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r304 = '1'
				    UNION ALL  SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r404 = '1') AS tot";
		}
		if($var == '32')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r304 = '1'";
		}
		if($var == '33')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r404 = '1'";
		}
		if($var == '34')
		{
		   $sql = "SELECT  sum(rst) as rst
                   FROM( SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r305 = '1'
				    UNION ALL  SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r405 = '1') AS tot";
		}
		if($var == '35')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r305 = '1'";
		}
		if($var == '36')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r405 = '1'";
		}
		return $this->processReturnQuery($sql,'odk_prod');
		
	}
	function getSurveyDetails($schema,$var,$selectcolumn,$columnid)
	{
	   
	   // execute query
	     $sql ='';
	
	    if($var == '1')
		{
		  $sql = "select * from ".$schema.".waterpoint_info  
		   inner join ".$schema.".new_".$schema."_survey_tbl on
		   waterpoint_info.".$selectcolumn." = new_".$schema."_survey_tbl.".$columnid."  
		   where new_".$schema."_survey_tbl.r210 = '0' order by ".$selectcolumn."";
		}
		if($var == '2')
		{
		  $sql =  "select * from ".$schema.".waterpoint_info  
		          inner join ".$schema.".new_".$schema."_survey_tbl on
				  waterpoint_info.".$selectcolumn." = new_".$schema."_survey_tbl.".$columnid."  
		          where new_".$schema."_survey_tbl.r210 = '1' order by ".$selectcolumn."";
		}
		if($var == '3' or $var == '4'  or $var == '5' or $var == '6' or $var == '7' or $var == '8' or $var == '9' or $var == '10' 
		     or $var == '11' or $var == '12' or $var == '13'or $var == '14'or $var == '15' or $var == '16' or $var == '17')
		{
		
		  $choiz = pg_fetch_result($this->getSurveyChoice($schema,$var),0);
				  
		  $sql = "select *  from (select ".$columnid.",unnest(string_to_array(r211,' ')) as r211 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob  inner join ".$schema.".waterpoint_info on 
		  disp_prob.".$columnid."  = waterpoint_info.".$selectcolumn." where disp_prob.r211 ='".$choiz."' order by ".$selectcolumn."";
		  
		}
		if($var == '18')
		{
		  $sql = "select * from ".$schema.".waterpoint_info  
		          inner join ".$schema.".new_".$schema."_survey_tbl on 
		          waterpoint_info.".$selectcolumn." = new_".$schema."_survey_tbl.".$columnid."  
		          where r209 = '0' order by ".$selectcolumn."";
		}
		if($var == '19')
		{
		  $sql = "select * from ".$schema.".waterpoint_info  
		          inner join ".$schema.".new_".$schema."_survey_tbl on 
				  waterpoint_info.".$selectcolumn." = new_".$schema."_survey_tbl.".$columnid."  
		          where r212b = '0' order by ".$selectcolumn."";
		}
		if($var == '20')
		{
		  $sql = "select * from ".$schema.".waterpoint_info 
		         inner join ".$schema.".new_".$schema."_survey_tbl on 
				  waterpoint_info.".$selectcolumn." = new_".$schema."_survey_tbl.".$columnid."  
		          where r213 = '0'order by ".$selectcolumn."";
		}
		if($var == '21')
		{
		  $sql = "SELECT count(*) as rst FROM  ".$schema.".new_".$schema."_survey_tbl where r210 = '9667y5645t453354'";//immpossibru
		}
		if($var == '22' or $var == '23' or $var == '24' or $var == '25' or $var == '26' or $var == '27')
		{
		 $choiz = pg_fetch_result($this->getSurveyChoice($schema,$var),0);
		 $sql = "select *  from (select ".$columnid.", unnest(string_to_array(r218,' ')) as r218 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob inner join ".$schema.".waterpoint_info on 
		  disp_prob.".$columnid."   = waterpoint_info.".$selectcolumn." where disp_prob.r218 ='".$choiz."' order by ".$selectcolumn."";
		  }
		if($var == '28')
		{
		  $sql = "SELECT  *
              FROM( select * from (select ".$columnid.", unnest(string_to_array(r303,' ')) as r303 
		      from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r303 ='7'
		      UNION ALL  select *  from (select ".$columnid.", unnest(string_to_array(r403,' ')) as r403 
		      from ".$schema.".new_".$schema."_survey_tbl) disp_prob where r403 ='7') tot inner join ".$schema.".waterpoint_info on 
		      tot.".$columnid."   = waterpoint_info.".$selectcolumn." order by ".$selectcolumn."";
		}
		if($var == '29')
		{
		  $sql = "select * from (select ".$columnid.", unnest(string_to_array(r303,' ')) as r303 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob inner join ".$schema.".waterpoint_info on 
		  disp_prob.".$columnid."   = waterpoint_info.".$selectcolumn." where r303 ='7' order by ".$selectcolumn."";
		}
		if($var == '30')
		{
		 $sql = "select * from (select unnest(string_to_array(r403,' ')) as r403 
		  from ".$schema.".new_".$schema."_survey_tbl) disp_prob inner join ".$schema.".waterpoint_info on 
		  disp_prob.".$columnid."   = waterpoint_info.".$selectcolumn." where r403 ='7' order by ".$selectcolumn."";
		}
		if($var == '31')
		{
		  $sql = "SELECT  *
                   FROM( SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl where r304 = '1'
				    UNION ALL  SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl where r404 = '1') AS tot 
					inner join ".$schema.".waterpoint_info on 
		        tot.".$columnid."   = waterpoint_info.".$selectcolumn." order by ".$selectcolumn."";
		}
		if($var == '32')
		{
		  $sql = "SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl inner join ".$schema.".waterpoint_info on 
		  new_".$schema."_survey_tbl.".$columnid."   = waterpoint_info.".$selectcolumn." where r304 = '1' order by ".$selectcolumn."";
		}
		if($var == '33')
		{
		  $sql = "SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl inner join ".$schema.".waterpoint_info on 
		 new_".$schema."_survey_tbl.".$columnid."   = waterpoint_info.".$selectcolumn." where r404 = '1' order by ".$selectcolumn."";
		}
		if($var == '34')
		{
		   $sql = "SELECT  *
                   FROM( SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl where r305 = '1'
				    UNION ALL  SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl where r405 = '1') AS tot inner join ".$schema.".waterpoint_info on 
		  tot.".$columnid."   = waterpoint_info.".$selectcolumn." order by ".$selectcolumn."";
		}
		if($var == '35')
		{
		  $sql = "SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl  inner join ".$schema.".waterpoint_info on 
		 new_".$schema."_survey_tbl.".$columnid."   = waterpoint_info.".$selectcolumn." where r305 = '1' order by ".$selectcolumn."";
		}
		if($var == '36')
		{
		  $sql = "SELECT * FROM  ".$schema.".new_".$schema."_survey_tbl  inner join ".$schema.".waterpoint_info on 
		 new_".$schema."_survey_tbl.".$columnid."   = waterpoint_info.".$selectcolumn." where r405 = '1' order by ".$selectcolumn."";
		}
		
		return $this->processReturnQuery($sql,'odk_prod');
	}
	function getSurveyChoice($schema,$var)
	{
	    // execute query
		 $sql = "SELECT survey_choice FROM ".$schema.".dashboard_vars where id ='".$var."'";
		 return $this->processReturnQuery($sql,'odk_prod');
	}
	function getMetricDetails($schema,$var)
	{	     
	   // execute query
		 $sql = "SELECT dashboard_var FROM ".$schema.".dashboard_vars where id ='".$var."'";
		 return $this->processReturnQuery($sql,'odk_prod');
	}
	function getRespondentNumber($schema,$var)
	{	    
	   // execute query
		 $sql = "SELECT survey_choice FROM ".$schema.".dashboard_vars where id ='".$var."'";		 
		 return $this->processReturnQuery($sql,'odk_prod');
	}
	function processReturnQuery($sql,$dbname)//query returns result set
	{
	  $conn = $this->connectToDB($dbname);
	   $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 } 
		 pg_close($conn);
	   return $result;
	}
	
	//check if browser is internet explorer
	function getMSIE6() {
       $userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
       if (ereg("msie 6", $userAgent) || ereg("msie 5", $userAgent)) {
               return true;
       }
       return false;
    }
	function genDataset($sql,$filename,$title,$cookieVal)
	{
	
	    ini_set("memory_limit", "-1");
    	ini_set('max_execution_time', 123456);
	   // Create new PHPExcel object		
		$objPHPExcel = new PHPExcel(); 		
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Dispensers For Safe Water")
									 ->setLastModifiedBy("Dispensers For Safe Water")
									 ->setDescription("Dispensers For Safe Water Dataset")
									 ->setKeywords("dsw datasets")
									 ->setCategory("Datasets");		
		// Database with existing object		

		$result = $this-> processReturnQuery($sql,'dsw_db'); 
		
		// First Row (Names)		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$sheet = $objPHPExcel->getActiveSheet();	
		$sheet->setTitle($title);
		
		$col = 0;
		$NumFields = pg_num_fields($result);
		
		/*$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
		$cacheSettings = array( ' memoryCacheSize ' => '80MB');
		PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);	*/	
		
		for ($i=0; $i < $NumFields; $i++)
		{  		
		   $sheet->setCellValueByColumnAndRow($col,1,pg_field_name($result, $i));
		   $col = $col + 1;
			
		}				
		// Other Rows (Data)		
		$i = 2;
	
				
		while ($rw = pg_fetch_row($result))
		{		
			  foreach ($rw as $col=>$dado) $sheet->setCellValueByColumnAndRow ($col,$i,$dado);
			  $i++;
			  		
		}
		//  Define a style to set
		$styleArray = array('font' => array('bold' => true,   )   );
		//  And a range of cells to set it for
		$fromCol = 'A';
		$toCol = $sheet->getColumnDimension($sheet->getHighestColumn())->getColumnIndex();
		$fromRow = 1;
		$toRow = 1;
		$cellRange = $fromCol . $fromRow . ':' . $toCol . $toRow;

		$sheet->getStyle($cellRange)->applyFromArray($styleArray);//bolden the top column



		$toCol++;
		for($i = "A"; $i !== $toCol; $i++) {
			$calculatedWidth = $sheet->getColumnDimension($i)->getWidth();
			$sheet->getColumnDimension($i)->setWidth(abs((int)$calculatedWidth) * 23 );
		}
      
		// Redirect output to a client's web browser (Excel5)
		header("Pragma: public");
		header('Content-Type: application/vnd.ms-excel');		
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
		header("Content-Transfer-Encoding: binary ");		
		header('Cache-Control: max-age=0');		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');	
		$objWriter->save('php://output');	
	}
	function getColumnNames($tableName)
	{
	   $sql = "select column_name from information_schema.columns where table_name='".$tableName."'";	 
	   return $this->processReturnQuery($sql,'dsw_db');
	}
	
	function curl_request($url,  $postdata ) //single custom cURL request.
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, TRUE); 
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
	
		curl_setopt($ch, CURLOPT_URL, $url);
	//$postdata =http_build_query($postdata);
		if ($postdata)
		{
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);   
		}
	
		$response = curl_exec($ch);
	
		curl_close($ch);
	
		return $response;
	}
	function SQLResultTable($sql)
	{
		
		$Table = "";  //initialize table variable
		
		$Table.= "\t<table id="."\"mc_report\"".">\n"; //Open HTML Table
		
		$Result = $this->processReturnQuery($sql,'dsw_db');//
		if(!$Result )
		{
			$Table.= "<tr><td>POSTGRES ERROR: " . $Result . "</td></tr>";
		}
		else
		{
			//Header Row with Field Names
			$NumFields = pg_num_fields($Result);
			$Table.= "\t<thead>\n"; 
			$Table.= "\t\t<tr>\n";
			for ($i=0; $i < $NumFields; $i++)
			{     
				$Table.= "\t\t\t<th>" . pg_field_name($Result, $i) . "</th>\n"; 
			}
			$Table.= "\t\t</tr>\n";
		    $Table.= "\t</thead>\n"; 
			
			$Table.= "\t<tbody>\n"; //add tbody tag
			//Loop thru results
			$RowCt = 0; //Row Counter
			while($Row = pg_fetch_assoc($Result))
			{	
				$Table.= "\t\t<tr>\n";
				//Loop thru each field
				$cellCounter = '0';
				foreach($Row as $field => $value)
				{
				  $cellCounter = $cellCounter + 1;
				      if($cellCounter == 1)//first cell
					  {
					    $Table.= "\t\t\t<td class="."\"align_left\"".">$value</td>\n"; //allgin values left
					  }
					  else
					  {
					    $Table.= "\t\t\t<td class="."\"align_right\"".">$value</td>\n"; //allgin values right
					  }
				
				}
				$Table.= "\t\t</tr>\n";
			}
			
			//$Table.= "\t\t<tr style=\"background-color: #000066; color: #FFFFFF;\"><td colspan='$NumFields'>Query Returned " . pg_num_rows($Result) . " records</td></tr>\n";
			$Table.= "\t</tbody>\n"; //close tbody tag
		}
		$Table.= "\t</table>\n";
		
		return $Table;
	}
	function cleanInput($input) {
 
		  $search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
			'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
			'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		  );
		 
			$output = preg_replace($search, '', $input);
			return $output;
       }
	   function sanitize($input) {
			if (is_array($input)) {
				foreach($input as $var=>$val) {
					$output[$var] = $this->sanitize($val);
				}
			}
			else {
				if (get_magic_quotes_gpc()) {
					$input = stripslashes($input);
				}
				$input  = $this->cleanInput($input);
				$input = strip_tags($input);
				$output = pg_escape_string($input);
			}
			return $output;
	}		
		
	function logUser($openid,$email,$timeloggedin,$sessionid,$username)
	{
	  $sql = "INSERT INTO loggedin(
             username, email, openid_identity, session_id, loggedin, timeloggedin)
             VALUES ('".$this->sanitize($username)."','".$this->sanitize($email)."',
			 '".$this->sanitize($openid)."', '".$this->sanitize($sessionid)."', 'true', '".$this->sanitize($timeloggedin)."')";
	  $result = $this->processReturnQuery($sql,'dsw_db');//

	}
	function logOutUser()
	{
	 $sql = "UPDATE loggedin SET loggedin = 'false', timeloggedout='".date("Y-m-d H:i:s")."' WHERE session_id ='".session_id()."'";
	  $result = $this->processReturnQuery($sql,'dsw_db');//

	}

}

?>