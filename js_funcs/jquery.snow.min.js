/**
 * jquery.snow - jQuery Snow Effect Plugin
 *
 * Available under MIT licence
 *
 * @version 1 (21. Jan 2012)
 * @author Ivan Lazarevic
 * @requires jQuery
 * @see http://workshop.rs
 *
 * @params minSize - min size of snowflake, 10 by default
 * @params maxSize - max size of snowflake, 20 by default
 * @params newOn - frequency in ms of appearing of new snowflake, 500 by default
 * @params flakeColor - color of snowflake, #FFFFFF by default
 * @example $.fn.snow({ maxSize: 200, newOn: 1000 });
 */
(function(a){a.fn.snow=function(b){var c=a('<div id="flake" />').css({position:"absolute",top:"-50px"}).html("&#10052;"),d=a(document).height(),e=a(document).width(),f={minSize:10,maxSize:20,newOn:500},b=a.extend({},f,b);var g=setInterval(function(){var f=Math.random()*e-100,g=.5+Math.random(),h=b.minSize+Math.random()*b.maxSize,i=d-40,j=f-100+Math.random()*200,k=d*10+Math.random()*5e3;c.clone().appendTo("body").css({left:f,opacity:g,"font-size":h}).animate({top:i,left:j,opacity:.2},k,"linear",function(){a(this).remove()})},b.newOn)}})(jQuery)