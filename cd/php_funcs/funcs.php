<?php
class ChlorineDeliveryFuncs
{

	function connectToDB()
	{
		 $dbh = pg_connect("host=127.0.0.1 port=5432 dbname=odk_prod user=postgres password=postgres");
		 if (!$dbh) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbh;    
	}
	function getProgramCode()
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT * FROM  chlorine_delivery.reference_pilots order by id";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getJerricansConsumed($prog_code)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT SUM(cr206) as cl_consumed FROM  
		 chlorine_delivery.dashboard_tbl WHERE cr104 = '".$prog_code."' or cr104_other =  '".$prog_code."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getJerricansDelivered($prog_code)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT SUM(cr205) as cl_consumed FROM  
		 chlorine_delivery.dashboard_tbl WHERE cr104 = '".$prog_code."' or cr104_other =  '".$prog_code."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getTotalWaterpoints($prog_code)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT disp_count FROM  
		 chlorine_delivery.pilot_disp_count WHERE pilot_name = '".$prog_code."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getMonthsRecsActive($prog_code)
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT  total_months_of_chlorine_supply FROM  chlorine_delivery.reference_pilots WHERE  pilot_name  = '".$prog_code."'";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
	function getPilotInfo()
	{
	     $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT * FROM chlorine_delivery.reference_pilots ORDER BY id";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
}




?>