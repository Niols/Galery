<?php

/**
 * save_image
 *
 * Call the image* function after a matching on the file extension.
 */

function save_image ($img, $path)
{
  $ext = pathinfo ($path, PATHINFO_EXTENSION);
  $ext = strtolower ($ext);
  switch ($ext)
  {
    case 'jpg': return imagejpeg ($img, $path);
    case 'jpeg': return imagejpeg ($img, $path);
    case 'gif': return imagegif ($img, $path);
    case 'png': return imagepng ($img, $path);
    default: throw Exception ('save_image: non supported extension `'.$ext.'`');
  }
}