<?php 
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }

include '../php_funcs/header.php'; ?>
<div id="container">
 <div class="top_header">Manage Issues</div>
 
  <br/>
  <br/>	
   <br/>
  <br/>	
  
</div>
<?php include '../php_funcs/footer.php'; ?>