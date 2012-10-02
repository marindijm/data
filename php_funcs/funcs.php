<?php
class MainFuncs(
{
   
	function connectToDB()
	{
		 $dbh = pg_connect("host=127.0.0.1 port=5432 dbname=odk_prod user=postgres password=postgres");
		 if (!$dbh) {
			 die("Error in connection: " . pg_last_error());
		 }
		 return $dbh;    
	}
	
}

?>