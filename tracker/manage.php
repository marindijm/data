<?php 
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }

include '../header.php'; ?>
<div id="container">
 <div class="top_header">Manage Issues</div>
 
  <br/>
  <br/>	
   <br/>
  <br/>	
  
</div>
<?php include '../footer.php'; ?>