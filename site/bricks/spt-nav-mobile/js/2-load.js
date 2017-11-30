$(function() {
  window.mgf.responsivenav = responsiveNav(".c-nav-mobile", { // Selector
    animate: true, // Boolean: Use CSS3 transitions, true or false
    transition: 284, // Integer: Speed of the transition, in milliseconds
    customToggle: "js-responsive-nav-toggle", // Selector: Specify the ID of a custom toggle
    openPos: "relative", // String: Position of the opened nav, relative or static
    navClass: "c-nav-mobile", // String: Default CSS class. If changed, you need to edit the CSS too!
    jsClass: "js", // String: 'JS enabled' class which is added to  element
    init: function(){}, // Function: Init callback
    open: function(){}, // Function: Open callback
    close: function(){} // Function: Close callback
  });
});
