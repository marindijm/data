<<<<<<< HEAD
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
	array('id'=>4, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
));
?>

<div class="row-fluid">
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="weekly-visit">8,4,6,5,9,10</li>
		<li class="stat-count"><span><?php echo $count ?></span><span>Unassigned </span></li>
		<li class="stat-percent"><span class="text-success stat-percent">20%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="new-visits">2,4,9,1,5,7,6</li>
		<li class="stat-count"><span>89</span><span>Monthly Issues</span></li>
		<li class="stat-percent"><span class="text-error stat-percent">-15%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="unique-visits">200,300,500,200,300,500,1000</li>
		<li class="stat-count"><span>900</span><span>Deliveries</span></li>
		<li class="stat-percent"><span class="text-success stat-percent">10%</span></li>
	  </ul>
	</div>
  </div>
  
</div>

<div class="row-fluid">
	<div class="span6">
	  <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-th-large"></span>Installations Chart',
			'titleCssClass'=>''
		));
		?>
        
        <div class="visitors-chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
	</div><!--/span-->
    <div class="span6">
    	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-th-list"></span> Waterpoints Chart',
			'titleCssClass'=>''
		));
		?>
        
        <div class="pieStats" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
    </div>
	<!--<div class="span2">
    	<input class="knob" data-width="100" data-displayInput=false data-fgColor="#5EB95E" value="35">
    </div>
	<div class="span2">
     	<input class="knob" data-width="100" data-cursor=true data-fgColor="#B94A48" data-thickness=.3 value="29">
    </div>
	<div class="span2">
         <input class="knob" data-width="100" data-min="-100" data-fgColor="#F89406" data-displayPrevious=true value="44">     	
	</div><!--/span-->
</div><!--/row-->

          


<script>
<<<<<<< HEAD
           // document ready function
$(document).ready(function() {

	var divElement = $('div'); //log all div elements

	//circular progrress bar
	$(function () {

		$(".greenCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#9FC569',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })
        $(".redCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#ED7A53',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })
        $(".blueCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#88BBC8',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })

	});

	//------------- Visitor chart -------------//

	if (divElement.hasClass('visitors-chart')) {
	$(function () {
		//some data
		var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
		var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
		//define placeholder class
		var placeholder = $(".visitors-chart");
		//graph options
		var options = {
				grid: {
					show: true,
				    aboveData: true,
				    color: "#3f3f3f" ,
				    labelMargin: 5,
				    axisMargin: 0, 
				    borderWidth: 0,
				    borderColor:null,
				    minBorderMargin: 5 ,
				    clickable: true, 
				    hoverable: true,
				    autoHighlight: true,
				    mouseActiveRadius: 20
				},
		        series: {
		        	grow: {
		        		active: false,
		        		stepMode: "linear",
		        		steps: 50,
		        		stepDelay: true
		        	},
		            lines: {
	            		show: true,
	            		fill: true,
	            		lineWidth: 4,
	            		steps: false
		            	},
		            points: {
		            	show:true,
		            	radius: 5,
		            	symbol: "circle",
		            	fill: true,
		            	borderColor: "#fff"
		            }
		        },
		        legend: { 
		        	position: "ne", 
		        	margin: [0,-25], 
		        	noColumns: 0,
		        	labelBoxBorderColor: null,
		        	labelFormatter: function(label, series) {
					    // just add some space to labes
					    return label+'&nbsp;&nbsp;';
					 }
		    	},
		        yaxis: { min: 0 },
		        xaxis: {ticks:11, tickDecimals: 0},
		        colors: chartColours,
		        shadowSize:1,
		        tooltip: true, //activate tooltip
				tooltipOpts: {
					content: "%s : %y.0",
					shifts: {
						x: -30,
						y: -50
					}
				}
		    };   
	
        	$.plot(placeholder, [ 

        		{
        			label: "Issues Resolved", 
        			data: d1,
        			lines: {fillColor: "#f2f7f9"},
        			points: {fillColor: "#88bbc8"}
        		}, 
        		{	
        			label: "Issues Created", 
        			data: d2,
        			lines: {fillColor: "#fff8f2"},
        			points: {fillColor: "#ed7a53"}
        		} 

        	], options);
	        
    });
    }//end if
});
=======
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
	array('id'=>4, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
));
 $newIssues = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => "date_created >= '".  date('Y-m-d', strtotime('-1 day')) ."'",
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        $newIssuesCount =$newIssues->getItemCount();
        
        $unassignedIssues = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'user_assigned IS NULL',
                       // 'params' => array(':var_assigned' => null),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_resolved DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        $unassignedIssuesCount = $unassignedIssues->getItemCount();
        
?>

<div class="row-fluid">
  <div class="span3 ">
	<div class="stat-block">
            
                <ul>
		<li class="stat-graph inlinebar" id="weekly-visit">8,4,6,5,9,10</li>
		<li class="stat-count"><span>
                        <?php 
                        $baseUrl = Yii::app()->baseUrl; 
                        $num  = $newIssuesCount;
                        echo CHtml::link($num. " New",$baseUrl.'/index.php?r=issues/index' ); ?>
                      
                    </span>Issues</li>
		
	  </ul>
            
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="new-visits">2,4,9,1,5,7,6</li>
		<li class="stat-count"><span>
                         <?php 
                        $baseUrl = Yii::app()->baseUrl; 
                        $num  = $unassignedIssuesCount;
                        echo CHtml::link($num. " Unassiged",$baseUrl.'/index.php?r=issues/index' ); ?>
                    </span>Issues</li>
		
	  </ul>
	</div>
  </div>
  <!--<div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="unique-visits">200,300,500,200,300,500,1000</li>
		<li class="stat-count"><span>900</span><span>Deliveries</span></li>
		<li class="stat-percent"><span class="text-success stat-percent">10%</span></li>
	  </ul>
	</div>
  </div>
 -->
  
</div>

<div class="row-fluid">
	<div class="span6">
	  <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-th-large"></span>Issues Resolution',
			'titleCssClass'=>''
		));
		?>
        
        <div class="visitors-chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
	</div><!--/span-->
    <div class="span6">
   	<!--
    <div class="span2">
 <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-th-list"></span> Waterpoints Chart',
			'titleCssClass'=>''
		));
		?>
        
        <div class="pieStats" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
    </div>
    	<input class="knob" data-width="100" data-displayInput=false data-fgColor="#5EB95E" value="35">
    </div>
	<div class="span2">
     	<input class="knob" data-width="100" data-cursor=true data-fgColor="#B94A48" data-thickness=.3 value="29">
    </div>
	<div class="span2">
         <input class="knob" data-width="100" data-min="-100" data-fgColor="#F89406" data-displayPrevious=true value="44">     	
	</div><!--/span-->
</div><!--/row-->

          


<script>
           // document ready function
$(document).ready(function() {

	var divElement = $('div'); //log all div elements

	//circular progrress bar
	$(function () {

		$(".greenCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#9FC569',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })
        $(".redCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#ED7A53',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })
        $(".blueCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 80,
            'height': 80,
            'fgColor': '#88BBC8',
            'dynamicDraw': true,
            'thickness': 0.2,
            'tickColorizeValues': true
        })

	});

	//------------- Visitor chart -------------//

	if (divElement.hasClass('visitors-chart')) {
	$(function () {
		//some data
		var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
		var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
		//define placeholder class
		var placeholder = $(".visitors-chart");
		//graph options
		var options = {
				grid: {
					show: true,
				    aboveData: true,
				    color: "#3f3f3f" ,
				    labelMargin: 5,
				    axisMargin: 0, 
				    borderWidth: 0,
				    borderColor:null,
				    minBorderMargin: 5 ,
				    clickable: true, 
				    hoverable: true,
				    autoHighlight: true,
				    mouseActiveRadius: 20
				},
		        series: {
		        	grow: {
		        		active: false,
		        		stepMode: "linear",
		        		steps: 50,
		        		stepDelay: true
		        	},
		            lines: {
	            		show: true,
	            		fill: true,
	            		lineWidth: 4,
	            		steps: false
		            	},
		            points: {
		            	show:true,
		            	radius: 5,
		            	symbol: "circle",
		            	fill: true,
		            	borderColor: "#fff"
		            }
		        },
		        legend: { 
		        	position: "ne", 
		        	margin: [0,-25], 
		        	noColumns: 0,
		        	labelBoxBorderColor: null,
		        	labelFormatter: function(label, series) {
					    // just add some space to labes
					    return label+'&nbsp;&nbsp;';
					 }
		    	},
		        yaxis: { min: 0 },
		        xaxis: {ticks:11, tickDecimals: 0},
		        colors: chartColours,
		        shadowSize:1,
		        tooltip: true, //activate tooltip
				tooltipOpts: {
					content: "%s : %y.0",
					shifts: {
						x: -30,
						y: -50
					}
				}
		    };   
	
        	$.plot(placeholder, [ 

        		{
        			label: "Issues Resolved", 
        			data: d1,
        			lines: {fillColor: "#f2f7f9"},
        			points: {fillColor: "#88bbc8"}
        		}, 
        		{	
        			label: "Issues Created", 
        			data: d2,
        			lines: {fillColor: "#fff8f2"},
        			points: {fillColor: "#ed7a53"}
        		} 

        	], options);
	        
    });
    }//end if
});
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
</script>
=======
            $(function() {

                $(".knob").knob({
                    /*change : function (value) {
                        //console.log("change : " + value);
                    },
                    release : function (value) {
                        console.log("release : " + value);
                    },
                    cancel : function () {
                        console.log("cancel : " + this.value);
                    },*/
                    draw : function () {

                        // "tron" case
                        if(this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                , sa = this.startAngle          // Previous start angle
                                , sat = this.startAngle         // Start angle
                                , ea                            // Previous end angle
                                , eat = sat + a                 // End angle
                                , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                                && (sat = eat - 0.3)
                                && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.v);
                                this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    min : 0
                                    , max : 20
                                    , stopper : false
                                    , change : function () {
                                                    if(v > this.cv){
                                                        if(up){
                                                            decr();
                                                            up=0;
                                                        }else{up=1;down=0;}
                                                    } else {
                                                        if(v < this.cv){
                                                            if(down){
                                                                incr();
                                                                down=0;
                                                            }else{down=1;up=0;}
                                                        }
                                                    }
                                                    v = this.cv;
                                                }
                                    });
            });
        </script>
>>>>>>> parent of ae9b68a... server changes
