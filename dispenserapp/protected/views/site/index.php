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
		<li class="stat-count"><span>
                        <?php 
                        $baseUrl = Yii::app()->baseUrl; 
                        $num  = 10;
                        echo CHtml::link($num,$baseUrl.'/index.php?r=issues/index' ); ?>
                        
                    </span><span>Unassigned </span></li>
		
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