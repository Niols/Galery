<?php

require_once (INC_DIR . 'load_image.php');
require_once (INC_DIR . 'save_image.php');

/**
 * thumbify
 *
 * Given a path in PHOTOS_DIR, this function make sure there exist a big and a
 * small thumb for this path in BIG_THUMBS_DIR and SMALL_THUMBS_DIR.
 */

function thumbify ($path)
{
  // If the given path is invalid
  if (!file_exists (PHOTOS_DIR . $path))
    return false;

  // If the thumbs are already existing
  if (file_exists (SMALL_THUMBS_DIR . $path) &&
      file_exists (BIG_THUMBS_DIR . $path))
    return true;

  // Make sure the directories exist
  if (!file_exists (dirname (SMALL_THUMBS_DIR . $path)))
    mkdir (dirname (SMALL_THUMBS_DIR . $path), DIR_MODE, true);
  if (!file_exists (dirname (BIG_THUMBS_DIR . $path)))
    mkdir (dirname (BIG_THUMBS_DIR . $path), DIR_MODE, true);

  $img = load_image (PHOTOS_DIR . $path);

  $w = imagesx ($img);
  $h = imagesy ($img);

  if (!file_exists (SMALL_THUMBS_DIR . $path))
  {
    // New width and height
    if ( SMALL_THUMBS_WIDTH / SMALL_THUMBS_HEIGHT >= $w / $h )
    {
      $nh = SMALL_THUMBS_HEIGHT;
      $nw = floor( $w * ( SMALL_THUMBS_HEIGHT / $h ) );
    }
    else
    {
      $nw = SMALL_THUMBS_WIDTH;
      $nh = floor( $h * ( SMALL_THUMBS_WIDTH / $w ) );
    }

    $tmp_img = imagecreatetruecolor ($nw, $nh);
    imagecopyresized ($tmp_img, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
    
    save_image ($tmp_img, SMALL_THUMBS_DIR . $path);
  }

  if (!file_exists (BIG_THUMBS_DIR . $path))
  {
    // New width and height
    if ( BIG_THUMBS_WIDTH / BIG_THUMBS_HEIGHT >= $w / $h )
    {
      $nh = BIG_THUMBS_HEIGHT;
      $nw = floor( $w * ( BIG_THUMBS_HEIGHT / $h ) );
    }
    else
    {
      $nw = BIG_THUMBS_WIDTH;
      $nh = floor( $h * ( BIG_THUMBS_WIDTH / $w ) );
    }

    $tmp_img = imagecreatetruecolor ($nw, $nh);
    imagecopyresized ($tmp_img, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
    
    save_image ($tmp_img, BIG_THUMBS_DIR . $path);
  }

  return true;
}