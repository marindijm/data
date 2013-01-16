<?php 
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }

include '../header.php'; ?>

 <div class="top_header">Issue Tracker Reports</div>

  
</div>
<?php include '../footer.php'; ?>