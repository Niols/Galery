<?php

/**
 * load_image
 *
 * Call the imagecreatefrom* function after a matching on the file extension.
 */

function load_image ($path)
{
  $ext = pathinfo ($path, PATHINFO_EXTENSION);
  $ext = strtolower ($ext);
  switch ($ext)
  {
    case 'jpg': return imagecreatefromjpeg ($path);
    case 'jpeg': return imagecreatefromjpeg ($path);
    case 'gif': return imagecreatefromgif ($path);
    case 'png': return imagecreatefrompng ($path);
    default: throw Exception ('load_image: non supported extension `'.$ext.'`');
  }
}