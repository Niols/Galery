<?php

require 'config.php';

?>

<!DOCTYPE html>

<html lang="fr">

  <head>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="http://niols.net/81-columns.css" />
    <link rel="stylesheet" type="text/css" href="design.css" />

    <title><?php echo TITLE; ?></title>

  </head>

  <body>

    <ul class="menu right align-right">
      <li><a href="..">Back</a></li>
    </ul>
    <h1><a href=".."><?php echo TITLE; ?></a></h1>
    <?php echo SUBTITLE; ?>
    <hr/>

    <?php require 'show_img.php'; ?>
    <?php require 'show_dir.php'; ?>

    <hr/>

    Page calculée en <?php echo (microtime (true) - $_SERVER['REQUEST_TIME_FLOAT']); ?>s.
    
  </body>
</html>