<script>
// Setup our namespace
window.mgf = window.mgf || {};

window.mgf.supports = window.mgf.supports || {};

// Test for LocalStorage support (and space)
window.mgf.supports.localStorage = 'localStorage' in window && (function() {
  try {
    localStorage.setItem("test", "test");
    localStorage.removeItem("test");
    return true;
  } catch(e){
    return false;
  }
}());

// Switch no-js class for js
(function(d){d.className = d.className.replace(/(\s*)no-js(\s*)/, '$1js$2');})(document.documentElement);
</script>

<?php jsvars::output(); ?>
