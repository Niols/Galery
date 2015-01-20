<?php

/**
* get_ext
*
* Return the lowercase extension of the gven path.
*/

function get_ext ($path)
{
  return strtolower (pathinfo ($path, PATHINFO_EXTENSION));
}