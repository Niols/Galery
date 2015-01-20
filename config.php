<?php

// Site
define ('TITLE', 'B6 rocks!');
define ('SUBTITLE', 'Galerie de photos');

// Allowed / Unallowed. Nope, we can't
define ('ALLOWED_EXTENSIONS', 'jpg|jpeg|gif|png');
define ('UNALLOWED_FILES', '.|..');

// Directories
define ('INC_DIR', 'inc/');
define ('DATA_DIR', 'data/');
define ('PHOTOS_DIR', 'photos/');
define ('SMALL_THUMBS_DIR', 'thumbs/small/');
define ('BIG_THUMBS_DIR', 'thumbs/big/');
define ('IMGS_DIR', 'imgs/');

define ('DIR_MODE', 0777);

// Sizes (px)
define ('SMALL_THUMBS_HEIGHT', 60);
define ('SMALL_THUMBS_WIDTH', 80);
define ('BIG_THUMBS_HEIGHT', 600);
define ('BIG_THUMBS_WIDTH', 800);

if (!file_exists (SMALL_THUMBS_DIR))
  if (!mkdir (SMALL_THUMBS_DIR, DIR_MODE, true))
    die ('Can\'t create `' . SMALL_THUMBS_DIR . '`.');

if (!file_exists (BIG_THUMBS_DIR))
  if (!mkdir (BIG_THUMBS_DIR, DIR_MODE, true))
    die ('Can\'t create `' . BIG_THUMBS_DIR . '`.');

