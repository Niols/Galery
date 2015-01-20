<?php

require_once (INC_DIR . 'get_ext.php');
require_once (INC_DIR . 'thumbify.php');
require_once (INC_DIR . 'get_directories.php');
require_once (INC_DIR . 'get_images.php');

if (isset ($_GET['dir']))
  $dir = urldecode ($_GET['dir']);
else
  $dir = '';

// Make sure $dir doesn't contain dangerous ..
if ($dir == '..' || strpos ($dir, '/..') !== false)
  $dir = '';

// Make sure $dir exists and is a directory.
if (!file_exists (PHOTOS_DIR . $dir) || !is_dir (PHOTOS_DIR . $dir))
  $dir = '';

// Make sure $dir is empty or finishes with a slash.
if ($dir != '' && substr($dir, -1) != '/')
  $dir .= '/';

// Echo the path
$chunks = array_filter (explode('/', $dir));
$output = array();
foreach ($chunks as $i => $chunk) {
  $output[] = sprintf (
    '<a href="?dir=%s">%s</a>',
    urlencode (implode ('/', array_slice ($chunks, 0, $i + 1))),
    $chunk);
}
array_unshift ($output, '<a href="?dir=">Home</a>');
echo '<h2>' . implode(' &gt;&gt; ', $output) . '</h2>';

$dirs = get_directories (PHOTOS_DIR . $dir);
foreach ($dirs as $d)
  echo '<div class="dir">
          <a href="?dir='.urlencode ($dir.$d).'" />
            <img src="'.IMGS_DIR.'folder_black.png" alt="dir" />
            <br/>
            '.$d.'
          </a>
        </div>';

$files = get_images (PHOTOS_DIR . $dir);
foreach ($files as $f)
{
  thumbify ($dir.$f);
  echo '<div class="img">
          <a href="?img='.urlencode ($dir.$f).'" />
            <img src="'.SMALL_THUMBS_DIR.$dir.$f.'" alt="img" />
            <br/>
            '.$f.'
          </a>
        </div>';
}
