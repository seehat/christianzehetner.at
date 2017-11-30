
    <!-- Photoswipe -->
    <?php echo photoswipe(); ?>

    <?php echo snippet('js');  ?>
    <?php echo js('files/js/site' . c::get('assets.suffix') . '.js', true) ?>

    <!-- http://cookie-bar.eu -->
    <script async type="text/javascript" src="//cdn.jsdelivr.net/cookie-bar/1/cookiebar-latest.min.js?theme=grey&tracking=1&thirdparty=1&remember=60"></script>

    <?php echo ga(); ?>

  </body>
</html>
