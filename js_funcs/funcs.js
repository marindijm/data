// JavaScript Document
//$.noConflict();
$(document).ready(function() {  	
	//call the necessary javascript functions
	$('#pie').exists(function() {
       $.fn.charting();//only call when pie element exists
     });
	$('#img1').exists(function() {
      $.fn.imgEffects();//only call when img1 id exists
    });
	$('#hdr').exists(function() {
        $.fn.fixedHeader();//only call when header element exists
    });
	$('#wpts_id').exists(function() {
        $.fn.wpt_id_autocomplete();//only call when wpt_id element exists
    });
	
	$('#issuetypeoptions').exists(function() {
        $.fn.getssueTypes();
    });
	$('#usersoptions').exists(function() {
       $.fn.getusers();
    });
	$(".challenge").middleBoxButton("The Challenge", "http://www.poverty-action.org/safewater/test/challenge");
	$(".solution").middleBoxButton("The Solution", "http://www.poverty-action.org/safewater/test/solution");
	$(".evidence").middleBoxButton("The Evidence", "http://www.poverty-action.org/safewater/test/evidence");
	$(".models").middleBoxButton("Models Used", "http://www.poverty-action.org/safewater/test/models");
	$(".partners").middleBoxButton("Program Partners", "http://www.poverty-action.org/safewater/test/programsandpartners");
	
});
$.fn.middleBoxButton = function(text, url) {
    var $el, $tempDiv, $tempButton, divHeight = 0;
    return this.hover(function(e) {
    
        $el = $(this).css("border-color", "white");
        divHeight = $el.height() + parseInt($el.css("padding-top")) + parseInt($el.css("padding-bottom"));
                
        $tempDiv = $("<div />", {
            "class": "overlay rounded"
        });
                
        $tempButton = $("<a />", {
            "href": url,
            "text": text,
            "class": "widget-button rounded",
            "css": {
                "top": (divHeight / 2) - 7 + "px"
            }
        }).appendTo($tempDiv);
                
        $tempDiv.appendTo($el);
        
    }, function(e) {
    
        $el = $(this).css("border-color", "#999");
    
        $(".overlay").fadeOut("fast", function() {
            $(this).remove();
        })
    
    });
    
}
$.fn.charting=function()
{
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'pie',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: true
		},
		title: {
			text: 'Dispensers Installed As Of Today'
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					color: '#000000',
					connectorColor: '#000000',
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Dispenser Installation',
			data: [
				['School(MOE)',  11.0],
				['Health Center(MPH)',  Math.round(7,1)],
				{
					name: 'Agricultural Bundling(OAF)',
					y: 60.0,
					sliced: true,
					selected: true
				},
				['Research(WASH,PMI,CFD,Sendhil)',    17.0],
				['Expansion(Tanathi)',     1.0],
				['Local Government(BCC,BMC,LVN,MMC)',   4.0]
			]
		}]
	});
	
}
$.fn.imgEffects=function(){
	 $('#img1').fadeIn().delay(9000).fadeOut(3000);
}
$.fn.fixedHeader=function(){
	    var div = $('#hdr');
        var start = $(div).offset().top;
 
    $.event.add(window, "scroll", function() {
        var top_offset = $(window).scrollTop();
        $(div).css('position',((top_offset)>start) ? 'fixed' : 'static');
        $(div).css('top',((top_offset)>start) ? '0px' : '');

    });
}
$.fn.exists = function(callback) {
  var args = [].slice.call(arguments, 1);

  if (this.length) {
    callback.call(this, args);
  }

  return this;
}
$.fn.showonlyone = function(thechosenone) {
     $('.newboxes').each(function(index) {
          if ($(this).attr("id") == thechosenone) 
		  {
               $(this).show(200);
          }
          else 
		  {
               $(this).hide(600);
          }
     });
}
$.fn.wpt_id_autocomplete = function()
{
	  var waterpoints = [];
	 
		  //change link later to more advance link
		   $.getJSON('http://data.safe-water.org/rest/waterpoints/getwaterpoints', function(data) {	//do a json call to get waterpoint id's 		
				  $.each(data, function(i, obj) {
							waterpoints.push(obj.waterpoint_id );//add waterpoint id's to autocomplete field
				  });
			});
	 
		 
        $( "#wpts_id" ).autocomplete({
            source: waterpoints
        });
	 
}
$.fn.getssueTypes = function()
{	 
	  //change link later to more advance link
	   $.getJSON('http://data.safe-water.org/rest/issues/getissuetypes', function(data) {	//do a json call to get issuetype		
			 var options = $("#issuetypeoptions");
			$.each(data, function() {
				options.append($("<option/>").val(this.issuetypeid).text(this.issuetypename));
			});
		});
       /* $.getJSON('http://data.safe-water.org/rest/issues/getusers', function(data) {	//do a json call to get issuetype		
			 var options = $("#usersoptions");
			$.each(result, function() {
				options.append($("<option />").val(this.ImageFolderID).text(this.Name));
			});
		});*/
}
$.fn.getusers= function()
{	 
	  //change link later to more advance link	 
       $.getJSON('http://data.safe-water.org/rest/issues/getusers', function(data) {	//do a json call to get users	
			 var options = $("#usersoptions");
			$.each(data, function() {
				options.append($("<option />").val(this.user_id).text(this.username));
			});
		});
}

