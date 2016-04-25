<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Acupuncture</title>

  <link rel="stylesheet" type="text/css" href="public/style/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/style/main_style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="public/style/main_style_print.css" media="print">
  <link rel="stylesheet" type="text/css" href="public/style/main_style_small_device.css" media="screen and (max-width: 1280px)">
  {foreach from=$module_name item=module}
    <link rel="stylesheet" type="text/css" href="public/style/{$module}.css">
  {/foreach}
</head>

<body>
  {include file="view/acu_header.tpl"}
  <div id="main_content" role="main">
    <div id="main_content_top"></div>
    <div id="main_content_tiles">
    {foreach from=$module_name item=module}
        {include file="view/$module.tpl"}
    {/foreach}
    </div>
  </div>

  <footer>
    <p>© 2016 Brat Breton Collinet Decoster - All Rights Reserved</p>
  </footer>

  <script src="http://code.jquery.com/jquery-2.2.2.js" integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE=" crossorigin="anonymous"></script>
  <script src="public/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="public/js/sha256/scripts/qunit.js" type="text/javascript"></script>
  <script src="public/js/sha256/scripts/sha256.jquery.debug.js" type="text/javascript"></script>
  <script src="public/js/acu_main.js" type="text/javascript"></script>
  {foreach from=$module_name item=module}
    <script src="public/js/{$module}.js" type="text/javascript"></script>
  {/foreach}
</body>

</html>
