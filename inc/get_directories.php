<?php

/**
 * get_directories
 *
 * Return all directories names inside the path.
 */
function get_directories ($path)
{
  $dirs = scandir ($path);
  $dirs = array_diff ($dirs, explode ('|', UNALLOWED_FILES));
  $dirs = array_filter ($dirs,
			function ($dir) use ($path) {
                          return is_dir ($path . '/' . $dir);
                        });
  sort ($dirs, SORT_NATURAL|SORT_FLAG_CASE);
  return $dirs;
}