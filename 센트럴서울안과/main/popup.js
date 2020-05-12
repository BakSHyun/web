
$(document).ready(function(){
	var pw= $('#popup_wrap .area');
	/*var id=null;
	pw.find('img').addClass('pngfix');
	function preloadImages() {var c = new Array();$('.pngfix').each( function(j) {c[j] = new Image();c[j].src = this.src;this.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='image',src='"+ this.src +"')";});}preloadImages();
	function move(){pw.animate({top:-10},400);pw.animate({top:10},400);}move();
	function autoPlay(){id = setInterval(function(){move();},300)}autoPlay();
	pw.on("mouseenter",function(e){clearInterval(id); pw.clearQueue();});
	pw.on("mouseleave",function(e){autoPlay();});*/
	pw.find('.close').on("click",function(e){$('#popup_wrap').css({'display':'none'});});
});


