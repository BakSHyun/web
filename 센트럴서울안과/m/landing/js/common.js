$(document).ready(function () {

	/* 메인 비주얼 */
	var mv_auto_bxslider = $('.mv_inner').bxSlider({
		mode: 'horizontal',
		controls:false,
		auto:true,
		pager:true,
		//pagerCustom: '#mv-bx-pager',
		adaptiveHeight: true,
		pause:5000,
		onSliderLoad: function () {
			$('.mv_wrap .bx-pager a').click(function () {
				var i = $(this).data('slide-index');
				mv_auto_bxslider.goToSlide(i);
				mv_auto_bxslider.stopAuto();
				mv_auto_bxslider.startAuto();
				return false;
			});
		}
	});
   /* 메인 비주얼 */

	/* GNB 각각의 메뉴 드롭 */
	$('.mainmenu>ul>li>a').mouseover(function() {
		$('.mainmenu>ul>li>ul').hide();
		$(this).next().slideDown('fast');
	});

	$(".mainmenu").mouseleave(function(){
		$(".submenu").hide()
	}) ;
	/* GNB 각각의 메뉴 드롭 */

	/* GNB 전체 메뉴 드롭 */
	$('.head_gnb').mouseover(function(){
		$('.dep2_area').show();
	});
	
	$('.dep2_area').mouseleave(function(){
		$('.dep2_area').hide();
	});
	/* GNB 전체 메뉴 드롭 */

	/*즐겨찾기*/
	$('#bookmark').on('click', function(e) {
		var bookmarkURL = window.location.href;
		var bookmarkTitle = document.title;
		var triggerDefault = false;

		if (window.sidebar && window.sidebar.addPanel) {
			// Firefox version < 23
			window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
		} else if ((window.sidebar && (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)) || (window.opera && window.print)) {
			// Firefox version >= 23 and Opera Hotlist
			var $this = $(this);
			$this.attr('href', bookmarkURL);
			$this.attr('title', bookmarkTitle);
			$this.attr('rel', 'sidebar');
			$this.off(e);
			triggerDefault = true;
		} else if (window.external && ('AddFavorite' in window.external)) {
			// IE Favorite
			window.external.AddFavorite(bookmarkURL, bookmarkTitle);
		} else {
			// WebKit - Safari/Chrome
			alert((navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Cmd' : 'Ctrl') + '+D 키를 눌러 즐겨찾기에 등록하실 수 있습니다.');
		}
		return triggerDefault;
	});
	/*즐겨찾기*/

});