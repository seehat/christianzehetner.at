var rvlScroll = (function () {
	var fn = {};
	var scrolltimer = null;

	fn.init = function(field, stimer) {
		scrolltimer = stimer;
		fn.onLoad();
	};

	fn.gotoScroll = function() {
		if(localStorage.getItem('rvl-scroll') !== null) {
			$('.rvl-iframe iframe').contents().scrollTop(parseInt(localStorage.getItem('rvl-scroll')));
		}
	};

	fn.onScroll = function() {
		$('.rvl-iframe iframe').contents().scroll(function () {
      fn.setScroll();
		});
	};

	fn.setScroll = function() {
		localStorage.setItem('rvl-scroll', fn.getScroll());
	};

	fn.getScroll = function() {
		return $('.rvl-iframe iframe:last-child').contents().scrollTop();
	};

	fn.onLoad = function() {
		$('.rvl-iframe iframe').load(function(){
      setTimeout(function(){
        fn.gotoScroll();
      }, 500);
			fn.onScroll();
			$(this).unbind();
		});
	};

	return fn;
})();
