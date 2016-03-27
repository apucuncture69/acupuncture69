<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Acupuncture</title>
  <link rel="stylesheet" type="text/css" href="public/style/main_style.css" />
  <link rel="stylesheet" type="text/css" href="public/style/main_style_small_device.css" media="screen and (max-width: 1280px)"/>
  <link rel="stylesheet" type="text/css" href="public/style/{$module_name}.css" />
  <meta charset="UTF-8">
</head>

<body>
  {include file="view/acu_header.tpl"}
  <div id="main_content" role="main">
    <div id="main_content_top"></div>
    <div id="main_content_tiles">
      {include file="view/$module_name.tpl"}
    </div>
  </div>

  <footer>
    <p>© 2016 Brat Breton Collinet Decoster - All Rights Reserved</p>
  </footer>

  <script src="http://code.jquery.com/jquery-2.2.2.js" integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE=" crossorigin="anonymous"></script>
  <script src="public/js/sha256/scripts/qunit.js" type="text/javascript"></script>
  <script src="public/js/sha256/scripts/sha256.jquery.debug.js" type="text/javascript"></script>
  <script src="public/js/acu_main.js" type="text/javascript"></script>
  <script src="public/js/{$module_name}.js" type="text/javascript"></script>
</body>

</html>
