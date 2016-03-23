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
    <div id="footer_top">
    </div>
    <div id="footer_content">
      <p>© 2016 Brat Breton Collinet Decoster - All Rights Reserved</p>
    </div>
  </footer>
</body>

</html>
