<!DOCTYPE html>
<html>

<head>
  <title>Acupuncture</title>
  <link rel="stylesheet" type="text/css" href="public/style/main_style.css" />
  <link rel="stylesheet" type="text/css" href="public/style/{$module_name}.css" />
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
</head>

<body>
  {include file="view/acu_header.tpl"}
  <div id="main_content">
    <div id="main_content_top"></div>
    <div id="main_content_tiles">
      {include file="view/$module_name.tpl"}
    </div>
  </div>

  <footer>
    <p>© 2016 Brat Breton Collinet Decoster - All Rights Reserved</p>
  </footer>
</body>

<script src="http://code.jquery.com/jquery-2.2.2.js" integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE=" crossorigin="anonymous"></script>
<script src="public/js/{$module_name}.js" type="text/javascript"></script>

</html>
