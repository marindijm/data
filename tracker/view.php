<?php 
if(!isset($_SESSION))
 {
     session_start();
    $_SESSION['headertype'] = 'is_tr';
 }

include '../header.php';


$jsonurl = "http://localhost/data/rest/issues/getissues";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
 ?>
<div id="container">
 <div class="top_header">View Issue(s)</div>
 
  <br/>
  <br/>	
   <br/>
  <br/>	
  
  <div class="issue_tbl">
  <table>
  <thead>
  <tr>
    <th scope="col">Issue ID</th>
    <th scope="col">Waterpoint ID</th>
    <th scope="col">Waterpoint Name</th>
    <th scope="col">Issue</th>
    <th scope="col">Owner</th>
    <th scope="col">Resolved</th>
  </tr>
  </thead>
  <tbody>
  <?php
 foreach($json_output as $issue)
{
    ?>
  <tr>
    <td><?php echo $issue->issueid;?></td>
    <td><?php echo  $issue->waterpointid;?></td>
    <td><?php echo $issue->waterpoint_name;?></td>
    <td><?php echo  $issue->issuetype;?></td>
    <td><?php echo $issue->owner;?></td>
    <td><input name="resolved" type="checkbox" value="<?php echo $issue->status;?>"/></td>
  </tr>
 <?php } ?>
  </tbody>
</table>

  </div>
</div>
<?php include '../footer.php'; ?>