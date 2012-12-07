<?php
ob_start();
include 'php_funcs/funcs.php'; //include all the functions to be used all the pages 
include 'php_funcs/PHPExcel.php';	
$obj = new MainFuncs();

// Initiate cache
/*$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
$cacheSettings = array( 'memoryCacheSize' => '32MB');
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);*/


if(@isset($_GET['ds']))//self server calls
{
   $ds = $_GET['ds'];
   
   if($ds == 'summary')
   { 
      $sql = "SELECT * FROM waterpoint_summary"; 
	  $cookieVal = $_GET['dl_cookie'];	
	  $obj->genDataset($sql,'DSW Waterpoint Summary','Waterpoint Summary',$cookieVal);

   }
      if($ds == 'cd')
   { 
      $sql = 'SELECT * FROM chlorine_recs ORDER BY "Date Of Delivery"  DESC'; 
	  $cookieVal = $_GET['dl_cookie'];
	  $obj->genDataset($sql,'DSW Chlorine Delivery Records','Chlorine Delivery Records',$cookieVal);
   }
    if($ds == 'misc')
   { 
      $sql = "SELECT * FROM waterpoint_misc"; 
	   $cookieVal = $_GET['dl_cookie'];
	  $obj->genDataset($sql,'DSW Miscellanous Information','Miscellanous Information',$cookieVal);
   }
  setcookie("fileDownloadToken", trim($cookieVal), time()+3600,"/");
}
else
{
   header("location:datasets.php");
}
ob_flush();
?>