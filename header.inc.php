<?php

define('VERSION','20140201');
require_once 'config.php';
?>
<!doctype html>
<html>
<head lang="en-US" xml:lang="en-US" xmlns ="http://www.w3.org/1999/xhtml">
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="en">
  <title>DBRL Schedule</title>
  <link rel="stylesheet" href="style.css?<?=VERSION?>" />
  <link rel="stylesheet" href="print.css?<?=VERSION?>" media="print" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
  <script type="text/javascript">
    if (typeof jQuery == 'undefined')
    {
        document.write("<script src='//files.dbrl.org/js/jquery/jquery-1.7.min.js'><"+"/script>");
    }
  </script>
  <script src="jquery.floatheader.min.js"></script>
  <script src="init.js?<?=VERSION?>"></script>
