<?php
class VCSTBL
{ 
	function connectToDb()
	{
	
		 $dbh = pg_connect("host=127.0.0.1 port=5432 dbname=odk_prod user=postgres password=postgres");
		 if (!$dbh) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbh;  
	}
	function getVCSInfo()
	{
	   $conn = $this->connectToDB();
	   // execute query
		 $sql = "SELECT * FROM vcs.vcs_tbl";
		 $result = pg_query($conn, $sql);
		 if (!$result) {
			 die("Error in SQL query: " . pg_last_error());
		 }       
		 pg_close($conn);
		return $result;
	}
   

}


?>