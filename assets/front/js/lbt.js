$(function(){
	var $ul = $('#lbt ul'),
	    $li = $ul.children('li');
	$ul.width($li.length * 290);
	var timer = setInterval(function(){
        var pos = $ul.position();
        if(pos.left <= - 1450){
        	$ul.css('left',0);
        }
        if(!$ul.is(":animated")){
            $ul.animate({
            	left: "-="+290
            });
        }
	},1000);
});