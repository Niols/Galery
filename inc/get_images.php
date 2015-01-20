<?php

require (INC_DIR . 'get_ext.php');

/**
 * get_images
 *
 * Return all image names inside the path
 */
function get_images ($path)
{
  $imgs = scandir ($path);
  $imgs = array_diff ($imgs, explode ('|', UNALLOWED_FILES));
  $imgs = array_filter ($imgs,
			function ($file) use ($path) {
                          return is_file ($path . '/' . $file);
                        });
  $imgs = array_filter ($imgs,
			function ($file) {
                          $ext = get_ext ($file);
                          $allowed_exts = explode ('|', ALLOWED_EXTENSIONS);
                          return in_array ($ext, $allowed_exts);
                        });
  sort ($imgs, SORT_NATURAL|SORT_FLAG_CASE);
  return $imgs;
}