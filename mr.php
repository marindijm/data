<?php
 //header file
include 'header.php';
 $obj = new MainFuncs(); 
 
$rep = '';
if(@isset($_GET['mc']))//
{
 $rep = $_GET['mc'];
}
else
{
  header("location:reports.php");
}
 ?>


  <div class="mc">

   	 
<?php 
if($rep == 'fc')//fuel consumed
{ 
	$sql = 'SELECT reg_no as "Registration Number",	
	    trim(to_char(mortocyle_database.total_fuel_consumed(reg_no)::double precision,'."'"."999,999,999"."'".')) as "Total Fuel Consumed"        FROM mortocyle_database.details  ORDER BY reg_no ASC';
		//	echo $sql;
	echo  '<div class="top_header">Total Fuel Consumed</div>';
	echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
	echo $obj->SQLResultTable($sql);//print the table
} 
if($rep == 'fc1')//fuel cost
{ 
	$sql = 'SELECT reg_no as "Registration Number",
		   trim(to_char(mortocyle_database.total_fuel_cost(reg_no)::double precision,'."'"."999,999,999"."'".')) as "Total Fuel Cost"  
		    FROM mortocyle_database.details ORDER BY reg_no ASC ';
		//	echo $sql;
	echo  '<div class="top_header">Total Fuel Cost</div>';
		echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
	echo $obj->SQLResultTable($sql);//print the table
} 
if($rep == 'km')//km covered
{ 
	$sql = 'SELECT reg_no as "Registration Number", 
 trim(to_char(mortocyle_database.kilometers_covered(reg_no)::double precision,'."'"."999,999,999"."'".')) AS "Total Kilometres Covered"
  FROM mortocyle_database.details reg_no ORDER BY reg_no ASC';
			//echo $sql;
	echo  '<div class="top_header">Kilometres Covered</div>';
		echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
	echo $obj->SQLResultTable($sql);//print the table
}  
if($rep == 'kml')//km covered per litre
{ 
	$sql = 'SELECT reg_no as "Registration Number",
	mortocyle_database.kilometers_covered(reg_no) as "Total Kilometres",
 mortocyle_database.total_fuel_consumed(reg_no) as "Total Fuel Consumed",
	mortocyle_database.kilometers_per_litre(reg_no) as "Kilometers Per Litre" 
	FROM mortocyle_database.details  ORDER 
BY reg_no ASC';
//echo $sql;
echo  '<div class="top_header">Kilometres Covered Per Litre</div>';
	echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
	echo $obj->SQLResultTable($sql);//print the table
}  
if($rep == 'mc')//maintenance cost
{
	$sql = '
	SELECT reg_no as "Registration Number", 	
	trim(to_char(mortocyle_database.total_maintenance(reg_no)::double precision,'."'"."999,999,999"."'".')) as "Maintenance Cost" 
	FROM mortocyle_database.details  ORDER BY reg_no ASC';
	//echo $sql;
	echo  '<div class="top_header">Maintenance Cost</div>';
		echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
	echo $obj->SQLResultTable($sql);//print the table
}  
if($rep == 'ma')//monthly Analysis
{ 
	$sql = 'SELECT morto_reg_no as "Registration Number",
	        trim(to_char(SUM(fuel_cost_in_kshs),'."'"."999,999.99"."'".')) as "Fuel Cost",
	        trim(to_char(SUM(fuel_quantity),'."'"."999,999.99"."'".')) as "Fuel Quantity",
	        trim(to_char(SUM(kilometers_covered),'."'"."999,999.99"."'".')) as "Kilometres Covered",			
		DATE_PART('."'"."MONTH"."'".',date_refilled_to_full_tank) as "Month", 
		DATE_PART('."'"."YEAR"."'".',date_refilled_to_full_tank) as "Year"
	        FROM mortocyle_database.log 
			GROUP BY morto_reg_no,"Month","Year"
			ORDER BY morto_reg_no,"Month" ASC;';
		//	echo $sql;
		echo  '<div class="top_header">Monthly Analysis</div>';
			echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
		echo $obj->SQLResultTable($sql);//print the table
} 
if($rep == 'd')//mortocyle_database details
{ 
	$sql = 'SELECT reg_no as "Registration Number",  
officebase_location "Location",
 morto_desc_type as "mortocyle_database Description", 
 purch_date as "Purchasing Date", 
       purch_cost as "Purchasing Cost", 
       fuel_card_no as "Fuel Card No",
        staff_incharge1 as "Staff Incharge 1", 
        staff_incharge2 as "Staff Incharge 2", 
        staff_incharge3 as "Staff Incharge 3", 
       engine_number as "Engine Number",
        frame_number as "Frame Number", 
        log_book_number as  "Log Book Number", 
        insurance_provider as "Insurance Provider", 
       to_char(insurance_expiry_date::timestamp, '."'"."Day, DD Mon YYYY"."'".') as "Insurance Expiry Date"
  FROM mortocyle_database.details ORDER BY reg_no ASC';
 // echo $sql;
        echo  '<div class="top_header">Motorcycle Details</div>';
			echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
		echo $obj->SQLResultTable($sql);//print the table
}  
if($rep == 'sum')//summary
{ 
	$sql = 'SELECT reg_no as "Registration Number",
	trim(to_char(mortocyle_database.total_maintenance(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Maintenance Cost",
	trim(to_char(mortocyle_database.total_fuel_cost(reg_no) ::double precision,'."'"."999,999"."'".')) as "Total Fuel Cost",
	trim(to_char(mortocyle_database.total_cost(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Cost",
	trim(to_char(mortocyle_database.kilometers_covered(reg_no)::bigint,'."'"."999,999"."'".')) as "Total Kilometres Covered",
	trim(to_char(mortocyle_database.total_fuel_consumed(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Fuel Consumed",
	trim(to_char(mortocyle_database.kilometers_per_litre(reg_no)::double precision,'."'"."999,999.99"."'".')) as "Total Kilometres Covered Per Litre", 
	trim(to_char(mortocyle_database.shillings_per_litre(reg_no)::double precision,'."'"."999,999.99"."'".')) as "Total Cost Per Kilometre"	 
	FROM mortocyle_database.details GROUP BY reg_no ORDER BY reg_no ASC;
	';
	//echo $sql;
	 echo  '<div class="top_header">Motorcycle Summary</div>';
	 	echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
		echo $obj->SQLResultTable($sql);//print the table
} 
if($rep == 'sum_detail')//summary detail for one mortocyle_database
{ 
	$sql = 'SELECT reg_no as "Registration Number",
	trim(to_char(mortocyle_database.total_maintenance(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Maintenance Cost",
	trim(to_char(mortocyle_database.total_fuel_cost(reg_no) ::double precision,'."'"."999,999"."'".')) as "Total Fuel Cost",
	trim(to_char(mortocyle_database.total_cost(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Cost",
	trim(to_char(mortocyle_database.kilometers_covered(reg_no)::bigint,'."'"."999,999"."'".')) as "Total Kilometres Covered",
	trim(to_char(mortocyle_database.total_fuel_consumed(reg_no)::double precision,'."'"."999,999.99"."'".')) as "Total Fuel Consumed",
	mortocyle_database.kilometers_per_litre(reg_no) as "Total Kilometres Covered Per Litre", 
	 mortocyle_database.shillings_per_litre(reg_no) as "Total Cost Per Kilometre"	 
	FROM mortocyle_database.details GROUP BY reg_no ORDER BY reg_no ASC;
	';
	//echo $sql;
		echo $obj->SQLResultTable($sql);//print the table
}   
if($rep == 'tck')//total cost per kilometre
{ 
	$sql = 'SELECT reg_no as "Registration Number",
	trim(to_char(mortocyle_database.total_maintenance(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Maintenance Cost",
	trim(to_char(mortocyle_database.total_fuel_cost(reg_no) ::double precision,'."'"."999,999"."'".')) as "Total Fuel Cost",
	trim(to_char(mortocyle_database.total_cost(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Cost",
	trim(to_char(mortocyle_database.kilometers_covered(reg_no)::bigint,'."'"."999,999"."'".')) as "Total Kilometres Covered",
	mortocyle_database.shillings_per_litre(reg_no) as "Total Cost Per Kilometre"
	 FROM mortocyle_database.details GROUP BY reg_no ORDER BY reg_no ASC
	';
	 echo  '<div class="top_header">Total Cost Per Kilometre</div>';
	//echo $sql;
		echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
		echo $obj->SQLResultTable($sql);//print the table
}  
if($rep == 'tc')//total cost 
{ 
	$sql = 'SELECT reg_no as "Registration Number",
	trim(to_char(mortocyle_database.total_maintenance(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Maintenance Cost",
	trim(to_char(mortocyle_database.total_fuel_cost(reg_no) ::double precision,'."'"."999,999"."'".')) as "Total Fuel Cost",
	trim(to_char(mortocyle_database.total_cost(reg_no)::double precision,'."'"."999,999"."'".')) as "Total Cost"
	 FROM mortocyle_database.details GROUP BY reg_no ORDER BY reg_no ASC
	';
	//echo $sql;
	 echo  '<div class="top_header">Total Cost</div>';
	 	echo '<br/><a href="#" class="export_rpt" id="exp">Export Report To Excel</a><br/><br/>';
		echo $obj->SQLResultTable($sql);//print the table
} 
?>
<br/>
<br/>
</div>
<?php             
//footer file
include 'footer.php'; ?>