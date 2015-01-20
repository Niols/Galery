<?php

require_once (INC_DIR . 'get_ext.php');
require_once (INC_DIR . 'thumbify.php');
require_once (INC_DIR . 'get_images.php');

if (isset ($_GET['img']))
  $img = urldecode ($_GET['img']);
else
  $img = '';

// Make sure $img doesn't contain dangerous ..
if ($img == '..' || strpos ($img, '/..') !== false)
  $img = '';

// Make sure $img exists and is a file.
if (!file_exists (PHOTOS_DIR . $img) || !is_file (PHOTOS_DIR . $img))
  $img = '';

// Make sure $img finishes with an image extension.
if (!in_array (get_ext ($img), explode ('|', ALLOWED_EXTENSIONS)))
  $img = '';

if ($img != '')
{
  $dir = dirname ($img) . '/';
  $img = basename ($img);

  $imgs = get_images (PHOTOS_DIR . $dir);
  $i = array_search ($img, $imgs);

  thumbify ($dir.$img);
  echo '<div id="img-background"></div>
        <div id="img-container">
          <div id="pop-up">
            <a id="close" href="?dir='.urlencode ($dir).'"></a>
            <img src="'.BIG_THUMBS_DIR . $dir . $img.'" />
            <br/>
            '.$img.'
            <br/>';
  echo ($i == 0 ? 'Previous' : '<a href="?img='.urlencode ($dir.$imgs[$i-1]).'">Previous<a>');
  echo ($i + 1 == count ($imgs) ? 'Next' : '<a href="?img='.urlencode ($dir.$imgs[$i+1]).'">Next</a>');
  echo '  </div>
        </div>';
  $_GET['dir'] = urlencode ($dir);
}