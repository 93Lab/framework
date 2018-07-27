<?php if($_mode != 3) { ?>

  <?php if($_mode != 2) { ?>
    </main>
  <?php } ?>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="<?php echo HOME; ?>public/js/common.js"></script>

  <?php if(isset($script)) {
    echo '<script>'.$script.'</script>';
  } ?>
</body>
</html>

<?php } ?>
