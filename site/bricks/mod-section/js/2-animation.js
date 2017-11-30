
$(function() {

  var $window = $(window),
      $body = $('body');

  $body.removeClass('is-loading');

});

$('.o-section')
  .scrollex({
    top:		'30vh',
    bottom:		'30vh',
    delay:		50,
    initialize:	function() {
      //$(this).addClass('is-inactive');
    },
    terminate:	function() {
      $(this).removeClass('is-inactive');
    },
    enter:		function() {
      $(this).removeClass('is-inactive');
    },
    leave:		function() {

      var $this = $(this);

      if ($this.hasClass('onscroll-bidirectional'))
        $this.addClass('is-inactive');

    }
});
