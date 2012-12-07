<?php
 include 'php_funcs/funcs.php'; //include all the functions to be used all the pages  

 $obj = new MainFuncs();
$conn = $obj->connectToDB('odk_prod');
$sql = 'select tblb."VALUE" dataa, tref."PART" part, tbin."UNROOTED_FILE_PATH" filename, tbin."CONTENT_TYPE" ct,tbin."_URI" from
  odk_prod."IS016_V4_I109_BN" tbin, odk_prod."IS016_V4_I109_REF" tref, odk_prod."IS016_V4_I109_BLB" tblb where
 tbin."_URI" = tref."_DOM_AURI" and tref."_SUB_AURI" = tblb."_URI" order by tbin."_URI" asc, tref."PART" asc';

 $img = pg_query($conn,$sql);


while($row = pg_fetch_array($img)){
   //echo "sucessful"." ". "<br>";
 header('Content-Type: image/jpeg');
$en=base64_encode(pg_unescape_bytea ( $row['dataa']));
$mime= $row['ct'];
$binary_data='data:' . $mime . ';base64,' . $en ;

 //echo "<img src=".$binary_data." alt=".$row['filename'].">";  
echo $row['dataa'];

}
pg_close($conn);
?>

