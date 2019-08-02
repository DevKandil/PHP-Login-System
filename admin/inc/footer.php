

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo $js; ?>jquery-3.4.0.min.js"></script>
  <script src="<?php echo $js; ?>bootstrap.min.js"></script>
  <script src="<?php echo $js; ?>main.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <!-- wow.js -->
  <script src="<?php echo $js; ?>wow.min.js"></script>
  <script>
      new WOW().init();
  </script>

</body>

</html>
