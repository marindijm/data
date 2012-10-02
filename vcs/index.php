<?php
include 'php_funcs/funcs.php';
$obj = new VCSTBL(); 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>DSW VCS Information</title>
<meta name="description" content="dashboard">
<meta name="keywords" content="oaf">
<meta charset="utf-8">
<meta name="robots" content="index,follow">


<!-- link to neccessary files -->
<link href="images/dsw_logo_sc.png" rel="SHORTCUT ICON">
<link href="css/main.css" rel="stylesheet">



<body>

<div id="container">
   <img name="logo" src="images/dsw_logo_small.png"  alt="DSW Logo" id="img_logo">
	
	<table id="vcs_rep">
	<thead>
  <tr>
   		<th scope="col">vcs002</th>
		<th scope="col">vcs003</th>
		<th scope="col">vcs004</th>
		<th scope="col">vcs005</th>
		<th scope="col">vcs006</th>
		<th scope="col">vcs007</th>
		<th scope="col">instruction_instruction1_1</th>
		<th scope="col">instruction_instruction1_2</th>
		<th scope="col">instruction_instruction1_3</th>
		<th scope="col">vcs011</th>
		<th scope="col">vcs011_other</th>
		<th scope="col">vcs013</th>
		<th scope="col">t016</th>
		<th scope="col">t016_other</th>
		<th scope="col">t017_1</th>
		<th scope="col">t017_1_other</th>
		<th scope="col">t017_2</th>
		<th scope="col">t017_2_other</th>
		<th scope="col">t017_3</th>
		<th scope="col">t017_3_other</th>
		<th scope="col">t017_4</th>
		<th scope="col">t017_4_other</th>
		<th scope="col">t017_5</th>
		<th scope="col">t017_5_other</th>
		<th scope="col">t017_6</th>
		<th scope="col">t017_6_other</th>
		<th scope="col">t017_7</th>
		<th scope="col">t017_7_other</th>
		<th scope="col">t017_8</th>
		<th scope="col">t017_8_other</th>
		<th scope="col">t017_9</th>
		<th scope="col">t017_9_other</th>
		<th scope="col">t017_10</th>
		<th scope="col">t017_10_other</th>
		<th scope="col">t017_11</th>
		<th scope="col">t017_11_other</th>
		<th scope="col">t017_12</th>
		<th scope="col">t017_12_other</th>
		<th scope="col">t017_13</th>
		<th scope="col">t017_13_other</th>
		<th scope="col">t017_14</th>
		<th scope="col">t017_14_other</th>
		<th scope="col">t017_15</th>
		<th scope="col">t017_15_other</th>
		<th scope="col">t017_16</th>
		<th scope="col">t017_16_other</th>
		<th scope="col">t017_17</th>
		<th scope="col">t017_17_other</th>
		<th scope="col">t017_18</th>
		<th scope="col">t017_18_other</th>
		<th scope="col">t017_19</th>
		<th scope="col">t017_19_other</th>
		<th scope="col">t017_20</th>
		<th scope="col">t017_20_other</th>
		<th scope="col">t017_21</th>
		<th scope="col">t017_21_other</th>
		<th scope="col">t017_22</th>
		<th scope="col">t017_22_other</th>
		<th scope="col">t017_23</th>
		<th scope="col">t017_23_other</th>
		<th scope="col">t017_24</th>
		<th scope="col">t017_24_other</th>
		<th scope="col">t017_25</th>
		<th scope="col">t017_25_other</th>
		<th scope="col">t017_26</th>
		<th scope="col">t017_26_other</th>
		<th scope="col">t017_27</th>
		<th scope="col">t017_27_other</th>
		<th scope="col">t017_28</th>
		<th scope="col">t017_28_other</th>
		<th scope="col">t017_29</th>
		<th scope="col">t017_29_other</th>
		<th scope="col">t017_30</th>
		<th scope="col">t017_30_other</th>
		<th scope="col">t017_31</th>
		<th scope="col">t017_31_other</th>
		<th scope="col">t017_32</th>
		<th scope="col">t017_32_other</th>
		<th scope="col">t017_33</th>
		<th scope="col">t017_33_other</th>
		<th scope="col">t017_34</th>
		<th scope="col">t017_34_other</th>
		<th scope="col">t017_35</th>
		<th scope="col">t017_35_other</th>
		<th scope="col">t017_36</th>
		<th scope="col">t017_36_other</th>
		<th scope="col">t017_37</th>
		<th scope="col">t017_37_other</th>
		<th scope="col">t017_38</th>
		<th scope="col">t017_38_other</th>
		<th scope="col">t017_39</th>
		<th scope="col">t017_39_other</th>
		<th scope="col">t017_40</th>
		<th scope="col">t017_40_other</th>
		<th scope="col">t017_41</th>
		<th scope="col">t017_41_other</th>
		<th scope="col">s1_comments</th>
		<th scope="col">villagelder_vcs101</th>
		<th scope="col">villagelder_vcs102</th>
		<th scope="col">villagelder_vcs103</th>
		<th scope="col">villagelder_vcs104</th>
		<th scope="col">villagelder_vcs105</th>
		<th scope="col">villagelder_vcs106</th>
		<th scope="col">villagelder_vcs107</th>
		<th scope="col">villagelder_vcs108</th>
		<th scope="col">villagelder_vcs109</th>
		<th scope="col">instruction1_4</th>
		<th scope="col">vcs201</th>
		<th scope="col">gender_instruction1_5</th>
		<th scope="col">gender_vcs202a</th>
		<th scope="col">gender_vcs202b</th>
		<th scope="col">age_instruction1_6</th>
		<th scope="col">age_vcs203a</th>
		<th scope="col">age_vcs203b</th>
		<th scope="col">challenges1_vcs204a</th>
		<th scope="col">challenges1_vcs204b</th>
		<th scope="col">instruction1_7</th>
		<th scope="col">village_contact1_vcs205a</th>
		<th scope="col">village_contact1_vcs205b</th>
		<th scope="col">village_contact1_vcs205b_other</th>
		<th scope="col">village_contact10_vcs214a</th>
		<th scope="col">village_contact10_vcs214b</th>
		<th scope="col">village_contact10_vcs214b_other</th>
		<th scope="col">village_contact2_vcs206a</th>
		<th scope="col">village_contact2_vcs206b</th>
		<th scope="col">village_contact2_vcs206b_other</th>
		<th scope="col">village_contact3_vcs207a</th>
		<th scope="col">village_contact3_vcs207b</th>
		<th scope="col">village_contact3_vcs207b_other</th>
		<th scope="col">village_contact4_vcs208a</th>
		<th scope="col">village_contact4_vcs208b</th>
		<th scope="col">village_contact4_vcs208b_other</th>
		<th scope="col">village_contact5_vcs209a</th>
		<th scope="col">village_contact5_vcs209b</th>
		<th scope="col">village_contact5_vcs209b_other</th>
		<th scope="col">village_contact6_vcs210a</th>
		<th scope="col">village_contact6_vcs210b</th>
		<th scope="col">village_contact6_vcs210b_other</th>
		<th scope="col">village_contact7_vcs211a</th>
		<th scope="col">village_contact7_vcs211b</th>
		<th scope="col">village_contact7_vcs211b_other</th>
		<th scope="col">village_contact8_vcs212a</th>
		<th scope="col">village_contact8_vcs212b</th>
		<th scope="col">village_contact8_vcs212b_other</th>
		<th scope="col">village_contact9_vcs213a</th>
		<th scope="col">village_contact9_vcs213b</th>
		<th scope="col">village_contact9_vcs213b_other</th>
		<th scope="col">s3_comments</th>
  </tr>
  </thead>  
   <tbody>
 
			    <?php
				 // iterate over result set
		 // print each row
		  $result = $obj->getVCSInfo();//get the ssm results		
		 while ($row = pg_fetch_array($result)) {
		          ?>   
       <tr>
  		<td><?php echo  $row['vcs002']; ?></td>
		<td><?php echo  $row['vcs003']; ?></td>
		<td><?php echo  $row['vcs004']; ?></td>
		<td><?php echo  $row['vcs005']; ?></td>
		<td><?php echo  $row['vcs006']; ?></td>
		<td><?php echo  $row['vcs007']; ?></td>
		<td><?php echo  $row['instruction_instruction1_1']; ?></td>
		<td><?php echo  $row['instruction_instruction1_2']; ?></td>
		<td><?php echo  $row['instruction_instruction1_3']; ?></td>
		<td><?php echo  $row['vcs011']; ?></td>
		<td><?php echo  $row['vcs011_other']; ?></td>
		<td><?php echo  $row['vcs013']; ?></td>
		<td><?php echo  $row['t016']; ?></td>
		<td><?php echo  $row['t016_other']; ?></td>
		<td><?php echo  $row['t017_1']; ?></td>
		<td><?php echo  $row['t017_1_other']; ?></td>
		<td><?php echo  $row['t017_2']; ?></td>
		<td><?php echo  $row['t017_2_other']; ?></td>
		<td><?php echo  $row['t017_3']; ?></td>
		<td><?php echo  $row['t017_3_other']; ?></td>
		<td><?php echo  $row['t017_4']; ?></td>
		<td><?php echo  $row['t017_4_other']; ?></td>
		<td><?php echo  $row['t017_5']; ?></td>
		<td><?php echo  $row['t017_5_other']; ?></td>
		<td><?php echo  $row['t017_6']; ?></td>
		<td><?php echo  $row['t017_6_other']; ?></td>
		<td><?php echo  $row['t017_7']; ?></td>
		<td><?php echo  $row['t017_7_other']; ?></td>
		<td><?php echo  $row['t017_8']; ?></td>
		<td><?php echo  $row['t017_8_other']; ?></td>
		<td><?php echo  $row['t017_9']; ?></td>
		<td><?php echo  $row['t017_9_other']; ?></td>
		<td><?php echo  $row['t017_10']; ?></td>
		<td><?php echo  $row['t017_10_other']; ?></td>
		<td><?php echo  $row['t017_11']; ?></td>
		<td><?php echo  $row['t017_11_other']; ?></td>
		<td><?php echo  $row['t017_12']; ?></td>
		<td><?php echo  $row['t017_12_other']; ?></td>
		<td><?php echo  $row['t017_13']; ?></td>
		<td><?php echo  $row['t017_13_other']; ?></td>
		<td><?php echo  $row['t017_14']; ?></td>
		<td><?php echo  $row['t017_14_other']; ?></td>
		<td><?php echo  $row['t017_15']; ?></td>
		<td><?php echo  $row['t017_15_other']; ?></td>
		<td><?php echo  $row['t017_16']; ?></td>
		<td><?php echo  $row['t017_16_other']; ?></td>
		<td><?php echo  $row['t017_17']; ?></td>
		<td><?php echo  $row['t017_17_other']; ?></td>
		<td><?php echo  $row['t017_18']; ?></td>
		<td><?php echo  $row['t017_18_other']; ?></td>
		<td><?php echo  $row['t017_19']; ?></td>
		<td><?php echo  $row['t017_19_other']; ?></td>
		<td><?php echo  $row['t017_20']; ?></td>
		<td><?php echo  $row['t017_20_other']; ?></td>
		<td><?php echo  $row['t017_21']; ?></td>
		<td><?php echo  $row['t017_21_other']; ?></td>
		<td><?php echo  $row['t017_22']; ?></td>
		<td><?php echo  $row['t017_22_other']; ?></td>
		<td><?php echo  $row['t017_23']; ?></td>
		<td><?php echo  $row['t017_23_other']; ?></td>
		<td><?php echo  $row['t017_24']; ?></td>
		<td><?php echo  $row['t017_24_other']; ?></td>
		<td><?php echo  $row['t017_25']; ?></td>
		<td><?php echo  $row['t017_25_other']; ?></td>
		<td><?php echo  $row['t017_26']; ?></td>
		<td><?php echo  $row['t017_26_other']; ?></td>
		<td><?php echo  $row['t017_27']; ?></td>
		<td><?php echo  $row['t017_27_other']; ?></td>
		<td><?php echo  $row['t017_28']; ?></td>
		<td><?php echo  $row['t017_28_other']; ?></td>
		<td><?php echo  $row['t017_29']; ?></td>
		<td><?php echo  $row['t017_29_other']; ?></td>
		<td><?php echo  $row['t017_30']; ?></td>
		<td><?php echo  $row['t017_30_other']; ?></td>
		<td><?php echo  $row['t017_31']; ?></td>
		<td><?php echo  $row['t017_31_other']; ?></td>
		<td><?php echo  $row['t017_32']; ?></td>
		<td><?php echo  $row['t017_32_other']; ?></td>
		<td><?php echo  $row['t017_33']; ?></td>
		<td><?php echo  $row['t017_33_other']; ?></td>
		<td><?php echo  $row['t017_34']; ?></td>
		<td><?php echo  $row['t017_34_other']; ?></td>
		<td><?php echo  $row['t017_35']; ?></td>
		<td><?php echo  $row['t017_35_other']; ?></td>
		<td><?php echo  $row['t017_36']; ?></td>
		<td><?php echo  $row['t017_36_other']; ?></td>
		<td><?php echo  $row['t017_37']; ?></td>
		<td><?php echo  $row['t017_37_other']; ?></td>
		<td><?php echo  $row['t017_38']; ?></td>
		<td><?php echo  $row['t017_38_other']; ?></td>
		<td><?php echo  $row['t017_39']; ?></td>
		<td><?php echo  $row['t017_39_other']; ?></td>
		<td><?php echo  $row['t017_40']; ?></td>
		<td><?php echo  $row['t017_40_other']; ?></td>
		<td><?php echo  $row['t017_41']; ?></td>
		<td><?php echo  $row['t017_41_other']; ?></td>
		<td><?php echo  $row['s1_comments']; ?></td>
		<td><?php echo  $row['villagelder_vcs101']; ?></td>
		<td><?php echo  $row['villagelder_vcs102']; ?></td>
		<td><?php echo  $row['villagelder_vcs103']; ?></td>
		<td><?php echo  $row['villagelder_vcs104']; ?></td>
		<td><?php echo  $row['villagelder_vcs105']; ?></td>
		<td><?php echo  $row['villagelder_vcs106']; ?></td>
		<td><?php echo  $row['villagelder_vcs107']; ?></td>
		<td><?php echo  $row['villagelder_vcs108']; ?></td>
		<td><?php echo  $row['villagelder_vcs109']; ?></td>
		<td><?php echo  $row['instruction1_4']; ?></td>
		<td><?php echo  $row['vcs201']; ?></td>
		<td><?php echo  $row['gender_instruction1_5']; ?></td>
		<td><?php echo  $row['gender_vcs202a']; ?></td>
		<td><?php echo  $row['gender_vcs202b']; ?></td>
		<td><?php echo  $row['age_instruction1_6']; ?></td>
		<td><?php echo  $row['age_vcs203a']; ?></td>
		<td><?php echo  $row['age_vcs203b']; ?></td>
		<td><?php echo  $row['challenges1_vcs204a']; ?></td>
		<td><?php echo  $row['challenges1_vcs204b']; ?></td>
		<td><?php echo  $row['instruction1_7']; ?></td>
		<td><?php echo  $row['village_contact1_vcs205a']; ?></td>
		<td><?php echo  $row['village_contact1_vcs205b']; ?></td>
		<td><?php echo  $row['village_contact1_vcs205b_other']; ?></td>
		<td><?php echo  $row['village_contact10_vcs214a']; ?></td>
		<td><?php echo  $row['village_contact10_vcs214b']; ?></td>
		<td><?php echo  $row['village_contact10_vcs214b_other']; ?></td>
		<td><?php echo  $row['village_contact2_vcs206a']; ?></td>
		<td><?php echo  $row['village_contact2_vcs206b']; ?></td>
		<td><?php echo  $row['village_contact2_vcs206b_other']; ?></td>
		<td><?php echo  $row['village_contact3_vcs207a']; ?></td>
		<td><?php echo  $row['village_contact3_vcs207b']; ?></td>
		<td><?php echo  $row['village_contact3_vcs207b_other']; ?></td>
		<td><?php echo  $row['village_contact4_vcs208a']; ?></td>
		<td><?php echo  $row['village_contact4_vcs208b']; ?></td>
		<td><?php echo  $row['village_contact4_vcs208b_other']; ?></td>
		<td><?php echo  $row['village_contact5_vcs209a']; ?></td>
		<td><?php echo  $row['village_contact5_vcs209b']; ?></td>
		<td><?php echo  $row['village_contact5_vcs209b_other']; ?></td>
		<td><?php echo  $row['village_contact6_vcs210a']; ?></td>
		<td><?php echo  $row['village_contact6_vcs210b']; ?></td>
		<td><?php echo  $row['village_contact6_vcs210b_other']; ?></td>
		<td><?php echo  $row['village_contact7_vcs211a']; ?></td>
		<td><?php echo  $row['village_contact7_vcs211b']; ?></td>
		<td><?php echo  $row['village_contact7_vcs211b_other']; ?></td>
		<td><?php echo  $row['village_contact8_vcs212a']; ?></td>
		<td><?php echo  $row['village_contact8_vcs212b']; ?></td>
		<td><?php echo  $row['village_contact8_vcs212b_other']; ?></td>
		<td><?php echo  $row['village_contact9_vcs213a']; ?></td>
		<td><?php echo  $row['village_contact9_vcs213b']; ?></td>
		<td><?php echo  $row['village_contact9_vcs213b_other']; ?></td>
		<td><?php echo  $row['s3_comments']; ?></td>
    </tr>
  <?php		
			 }    	
		 pg_free_result($result);       
		
		 ?>
  </tbody>
</table>
<br/>
<br/>
<br/>
<a href="#" class="export_rpt" onClick="tableToExcel('vcs_rep', 'VCS Report')">Export VCS Report To Excel</a>
	
</div>
<script src="js_funcs/jquery.min.js" type="text/javascript"></script>
<script src="js_funcs/export.js" type="text/javascript"></script>

</body>
</html>
