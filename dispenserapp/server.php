<?php
$page = @$_GET['page']; // get the requested page
$limit = @$_GET['rows']; // get how many rows we want to have into the grid
$sidx = @$_GET['sidx']; // get index row - i.e. user click to sort
$sord = @$_GET['sord']; // get the direction
if(!$sidx) $sidx = 1;

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
if($totalrows) {
	$limit = $totalrows;
}

// connect to the database
 $dbc = pg_connect("host=127.0.0.1 port=5432 dbname=dsw_db user=postgres password=postgres");
		 if (!$dbc) {
			 die("Error in connection: " . pg_last_error());
		 }


$result = pg_query($dbc,"SELECT COUNT(*) as cnt FROM   waterpoint_summary ");
$row = pg_fetch_array($result,NULL, PGSQL_ASSOC);
$count = $row['cnt'];
if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
if ($limit<0) $limit = 0;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
if ($start<0) $start = 0;
$SQL = 'SELECT "Waterpoint ID" as wptid, "Waterpoint Name" as wptname, "Program Code" as pcode, "District Name" as dname, 
       "Division Name" as dvname, "Location Name" as lname
  FROM waterpoint_summary
 ORDER BY '.$sidx.'  '. $sord .' LIMIT  '.$limit.' OFFSET '.$start.';';
		//die($SQL );		
$result =  pg_query($dbc, $SQL );


@$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = pg_fetch_array($result,NULL, PGSQL_ASSOC)) {
    $responce->rows[$i]['id']=$row['wptid'];
    $responce->rows[$i]['cell']=array($row['wptid'],$row['wptname'],$row['pcode'],
	$row['dname'],$row['dvname'],$row['lname'],"");
    $i++;
} 
pg_close($dbc);

header("Content-Type:application/json");     
echo json_encode($responce);

?>