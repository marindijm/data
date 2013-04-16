	<?php

	class DeliveryPlan
	{
		public $startDate = "";
		public $staffNum = 0;
		public $deliveries =array();
		public $optDeliveries = 0;
		public $endDate = "";
		public $name = "";
		
		function DeliveryPlan($nam, $s, $n, $d, $o, $e)
		{
			$this->name = $nam;
			$this->startDate = $s;
			$this->staffNum = $n;
			$this->deliveries = $d;
			$this->optDeliveries = $o;
			$this->endDate = $e;
		}
		function printDeliveryPlan(){
			echo "<p>" . "<br/>Name:"
			. $this->name  . "<br/>Starts: "
			. $this->startDate . "<br/>Ends: "
			. $this->endDate . "<br/>Staff Number:" 
			. $this->staffNum . "<br/>Optimum Daily Deliveries:" 
			. $this->optDeliveries . "<br/>";
			echo "Num deliveries: ". count($this->deliveries) .  "<br/>";
			echo "<br/>Deliveries:<br/>";
			foreach( $this->deliveries as $d){
				$d->printDelivery();
			}
			
			
		}
	}
	class Delivery
	{
		public $waterpoint;
		public $deliveryDate;
		public $assignedStaff;
		public $numJerricans;
		function Delivery($wpt, $d, $ass)
		{
			$this->waterpoint = $wpt;
			$this->deliveryDate = $d;
			$this->assignedStaff = $ass;
			$this->numJerricans = 4;
		}
		function printDelivery()
		{
			echo  
			"Wpt:" . $this->waterpoint 
			. "\t Date:" . $this->deliveryDate 
			. "\t Staff ID:" . ($this->assignedStaff   +1)
			."\t Jerricans:" . $this->numJerricans. "<br/>"		;
		}	
		
	}

	echo "<pre>start\n";



	 if(isset($_POST['submit']))
	 {

		$numberOfStaff = $_POST['numStaff'];
		$deliveryWaterpoints = $_POST['numWaterpoints'];
		$optDelivery = $_POST['optDelivery'];
		$enteredStartDate = date($_POST['startDate']);
		$deliveries = array();

		$perStaffWpts = $deliveryWaterpoints / $numberOfStaff; 
		$numberOfWaterpoints = 1;
		$endDate = $enteredStartDate;
		for($i = 0; $i < $numberOfStaff; $i ++)//for each staff member
		{
			$start = $enteredStartDate; //first date of delivery	
			$dateCount = 0;		
			for($assignedDel = 0; $assignedDel <  $perStaffWpts ; $assignedDel++){
			
				if($dateCount == 8){
					$dateCount = 0; $start++;
				}
				if($numberOfWaterpoints > $deliveryWaterpoints)
					break;
				$del = new Delivery($numberOfWaterpoints,  $start, $i , 4);
				
				array_push($deliveries, $del);
				
				$numberOfWaterpoints++;
				$dateCount ++;
			}
			
			//get the last start Date (furthest out)
			if($endDate < $start) $endDate = $start;
		}
		//function DeliveryPlan($nam, $s, $n, $d, $o, $e)
		$deliveryPlan = new DeliveryPlan("Delivery Plan - " . date('Y-m-d'), $enteredStartDate, $numberOfStaff,  $deliveries, $optDelivery, $endDate);
		$deliveryPlan->printDeliveryPlan();
		
		
	}
	
	echo "end";
	
?>
