<?php
class DashboardFuncs
{

	function connectToDB()
	{
		 $dbh = pg_connect("host=127.0.0.1 port=5432 dbname=odk_prod user=postgres password=postgres");
		 if (!$dbh) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbh;    
	}
	function getDashboardVars()
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT * FROM oaf.dashboard_vars where substr(var_type, 1, 9) = 'spotcheck' order by id";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function calculateDashboardMetrics($var)
	{
	   
	   // execute query
	     $sql ='';
		if($var == 'total')
		{
		  $sql = "SELECT count(*) as cnt FROM  oaf.new_oaf_survey_tbl";
		}
		if($var == 'survey_start')
		{
		  $sql = "SELECT r101 FROM  oaf.new_oaf_survey_tbl order by r101 LIMIT 1";
		}
	    if($var == '1')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r210 = '0'";
		}
		if($var == '2')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r210 = '1'";
		}
		if($var == '3' or $var == '4'  or $var == '5' or $var == '6' or $var == '7' or $var == '8' or $var == '9' or $var == '10' 
		     or $var == '11' or $var == '12' or $var == '13'or $var == '14'or $var == '15' or $var == '16' or $var == '17')
		{
		$choiz = pg_fetch_result($this->getSurveyChoice($var),0);
		  $sql = "select count(*) as rst from (select unnest(string_to_array(r211,' ')) as r211 
		  from oaf.new_oaf_survey_tbl) disp_prob where r211 ='".$choiz."'";
		}
		if($var == '18')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r209 = '0'";
		}
		if($var == '19')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r212b = '0'";
		}
		if($var == '20')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r213 = '0'";
		}
		if($var == '21')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r210 = '9667y5645t453354'";//immpossibru
		}
		if($var == '22' or $var == '23' or $var == '24' or $var == '25' or $var == '26' or $var == '27')
		{
		$choiz = pg_fetch_result($this->getSurveyChoice($var),0);
		 $sql = "select count(*) as rst from (select unnest(string_to_array(r218,' ')) as r218 
		  from oaf.new_oaf_survey_tbl) disp_prob where r218 ='".$choiz."'";
		}
		if($var == '28')
		{
		  $sql = "SELECT  sum(rst) as rst
              FROM( select count(*) as rst from (select unnest(string_to_array(r303,' ')) as r303 
		  from oaf.new_oaf_survey_tbl) disp_prob where r303 ='7'
		   UNION ALL  select count(*) as rst from (select unnest(string_to_array(r403,' ')) as r403 
		  from oaf.new_oaf_survey_tbl) disp_prob where r403 ='7') AS tot";
		}
		if($var == '29')
		{
		  $sql = "select count(*) as rst from (select unnest(string_to_array(r303,' ')) as r303 
		  from oaf.new_oaf_survey_tbl) disp_prob where r303 ='7'";
		}
		if($var == '30')
		{
		 $sql = "select count(*) as rst from (select unnest(string_to_array(r403,' ')) as r403 
		  from oaf.new_oaf_survey_tbl) disp_prob where r403 ='7'";
		}
		if($var == '31')
		{
		  $sql = "SELECT  sum(rst) as rst
                   FROM( SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r304 = '1'
				    UNION ALL  SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r404 = '1') AS tot";
		}
		if($var == '32')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r304 = '1'";
		}
		if($var == '33')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r404 = '1'";
		}
		if($var == '34')
		{
		   $sql = "SELECT  sum(rst) as rst
                   FROM( SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r305 = '1'
				    UNION ALL  SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r405 = '1') AS tot";
		}
		if($var == '35')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r305 = '1'";
		}
		if($var == '36')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r405 = '1'";
		}
		 $conn = $this->connectToDB();
		if($sql <> '')
		{
			 $result = pg_query($conn, $sql);
			 if (!$result) {
				 die("Error in SQL query: " . pg_last_error());
			 }
		 }       
		 pg_close($conn);
		return $result;
	}
	function getSurveyDetails($var)
	{
	   
	   // execute query
	     $sql ='';
	
	    if($var == '1')
		{
		  $sql = "select * from oaf.waterpoint_info  inner join oaf.new_oaf_survey_tbl on waterpoint_info.quiz_id = new_oaf_survey_tbl.r108
		          where new_oaf_survey_tbl.r210 = '0' order by quiz_id";
		}
		if($var == '2')
		{
		  $sql =  "select * from oaf.waterpoint_info  inner join oaf.new_oaf_survey_tbl on waterpoint_info.quiz_id = new_oaf_survey_tbl.r108
		          where new_oaf_survey_tbl.r210 = '1' order by quiz_id";
		}
		if($var == '3' or $var == '4'  or $var == '5' or $var == '6' or $var == '7' or $var == '8' or $var == '9' or $var == '10' 
		     or $var == '11' or $var == '12' or $var == '13'or $var == '14'or $var == '15' or $var == '16' or $var == '17')
		{
		
		  $choiz = pg_fetch_result($this->getSurveyChoice($var),0);
				  
		  $sql = "select *  from (select r108 ,unnest(string_to_array(r211,' ')) as r211 
		  from oaf.new_oaf_survey_tbl) disp_prob  inner join oaf.waterpoint_info on 
		  disp_prob.r108 = waterpoint_info.quiz_id where disp_prob.r211 ='".$choiz."' order by quiz_id";
		  
		}
		if($var == '18')
		{
		  $sql = "select * from oaf.waterpoint_info  inner join oaf.new_oaf_survey_tbl on waterpoint_info.quiz_id = new_oaf_survey_tbl.r108
		          where r209 = '0' order by quiz_id";
		}
		if($var == '19')
		{
		  $sql = "select * from oaf.waterpoint_info  inner join oaf.new_oaf_survey_tbl on waterpoint_info.quiz_id = new_oaf_survey_tbl.r108
		          where r212b = '0' order by quiz_id";
		}
		if($var == '20')
		{
		  $sql = "select * from oaf.waterpoint_info  inner join oaf.new_oaf_survey_tbl on waterpoint_info.quiz_id = new_oaf_survey_tbl.r108
		          where r213 = '0'order by quiz_id";
		}
		if($var == '21')
		{
		  $sql = "SELECT count(*) as rst FROM  oaf.new_oaf_survey_tbl where r210 = '9667y5645t453354'";//immpossibru
		}
		if($var == '22' or $var == '23' or $var == '24' or $var == '25' or $var == '26' or $var == '27')
		{
		 $choiz = pg_fetch_result($this->getSurveyChoice($var),0);
		 $sql = "select *  from (select r108 , unnest(string_to_array(r218,' ')) as r218 
		  from oaf.new_oaf_survey_tbl) disp_prob inner join oaf.waterpoint_info on 
		  disp_prob.r108 = waterpoint_info.quiz_id where disp_prob.r218 ='".$choiz."' order by quiz_id";
		  }
		if($var == '28')
		{
		  $sql = "SELECT  *
              FROM( select * from (select r108, unnest(string_to_array(r303,' ')) as r303 
		  from oaf.new_oaf_survey_tbl) disp_prob where r303 ='7'
		   UNION ALL  select *  from (select r108, unnest(string_to_array(r403,' ')) as r403 
		  from oaf.new_oaf_survey_tbl) disp_prob where r403 ='7') tot inner join oaf.waterpoint_info on 
		  tot.r108 = waterpoint_info.quiz_id order by quiz_id";
		}
		if($var == '29')
		{
		  $sql = "select * from (select r108, unnest(string_to_array(r303,' ')) as r303 
		  from oaf.new_oaf_survey_tbl) disp_prob inner join oaf.waterpoint_info on 
		  disp_prob.r108 = waterpoint_info.quiz_id where r303 ='7' order by quiz_id";
		}
		if($var == '30')
		{
		 $sql = "select * from (select unnest(string_to_array(r403,' ')) as r403 
		  from oaf.new_oaf_survey_tbl) disp_prob inner join oaf.waterpoint_info on 
		  disp_prob.r108 = waterpoint_info.quiz_id where r403 ='7' order by quiz_id";
		}
		if($var == '31')
		{
		  $sql = "SELECT  *
                   FROM( SELECT * FROM  oaf.new_oaf_survey_tbl where r304 = '1'
				    UNION ALL  SELECT * FROM  oaf.new_oaf_survey_tbl where r404 = '1') AS tot inner join oaf.waterpoint_info on 
		  tot.r108 = waterpoint_info.quiz_id order by quiz_id";
		}
		if($var == '32')
		{
		  $sql = "SELECT * FROM  oaf.new_oaf_survey_tbl inner join oaf.waterpoint_info on 
		  new_oaf_survey_tbl.r108 = waterpoint_info.quiz_id where r304 = '1' order by quiz_id";
		}
		if($var == '33')
		{
		  $sql = "SELECT * FROM  oaf.new_oaf_survey_tbl inner join oaf.waterpoint_info on 
		 new_oaf_survey_tbl.r108 = waterpoint_info.quiz_id where r404 = '1' order by quiz_id";
		}
		if($var == '34')
		{
		   $sql = "SELECT  *
                   FROM( SELECT * FROM  oaf.new_oaf_survey_tbl where r305 = '1'
				    UNION ALL  SELECT * FROM  oaf.new_oaf_survey_tbl where r405 = '1') AS tot inner join oaf.waterpoint_info on 
		  tot.r108 = waterpoint_info.quiz_id order by quiz_id";
		}
		if($var == '35')
		{
		  $sql = "SELECT * FROM  oaf.new_oaf_survey_tbl  inner join oaf.waterpoint_info on 
		 new_oaf_survey_tbl.r108 = waterpoint_info.quiz_id where r305 = '1' order by quiz_id";
		}
		if($var == '36')
		{
		  $sql = "SELECT * FROM  oaf.new_oaf_survey_tbl  inner join oaf.waterpoint_info on 
		 new_oaf_survey_tbl.r108 = waterpoint_info.quiz_id where r405 = '1' order by quiz_id";
		}
		 $conn = $this->connectToDB();
		if($sql <> '')
		{
			 $result = pg_query($conn, $sql);
			 if (!$result) {
				 die("Error in SQL query: " . pg_last_error());
			 }
		 }       
		 pg_close($conn);
		return $result;
	}
	function getSurveyChoice($var)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT survey_choice FROM oaf.dashboard_vars where id ='".$var."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getMetricDetails($var)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT dashboard_var FROM oaf.dashboard_vars where id ='".$var."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getRespondentNumber($var)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT survey_choice FROM oaf.dashboard_vars where id ='".$var."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}




}




?>