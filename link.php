<?php
include 'php_funcs/funcs.php'; //include all the functions to be used all the pages 
include 'php_funcs/openid.php';
 $obj = new MainFuncs();//initialize the functions class
 echo $obj->loginUser();//return open id url
?>