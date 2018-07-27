<?php if($_mode != 3) { ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo HOME; ?>public/images/favicon.png"/>

    <?php if(isset($title)) {
      echo '<title>'.$title.'</title>';
    } else {
      echo '<title>'.DEFAULT_TITLE.'</title>';
    } ?>

    <link href="<?php echo HOME; ?>public/css/libs/normalize.css" rel="stylesheet">
    <link href="<?php echo HOME; ?>public/css/libs/bootstrap-grid.css" rel="stylesheet">
    <link href="<?php echo HOME; ?>public/css/design.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {
          families: ['Material Icons']
        }
      });
    </script>

    <script>
      var HOME = "<?php echo HOME; ?>";
    </script>
  </head>
  <body>

    <?php if($_mode != 2) { ?>


      <main>
    <?php } ?>

<?php } ?>
