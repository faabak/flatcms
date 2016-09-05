<?php

// DO THE MAGIC

if (isset($_GET["sp"]) == false)
  {
  echo("<div class='pageBody'>");
  if ($LoggedIn == "true")
    {
    include("admin/toolbar.php");
    echo("<div class='cmsToolbarHolder'>&nbsp;</div>");
    }
  include("sections/header.php");
  include("sections/content.php");
  include("sections/footer.php");
  echo("</div>");
  }
else
  {
  echo("<div class='systemPage'>");
  if ($LoggedIn == "true")
    {
    include("admin/toolbar.php");
    echo("<div style='position:relative;width:100%;height:50px;z-index:700;'>&nbsp;</div>");
    include("admin/systempages/{$_GET["sp"]}.php");
    }
  echo("</div>");
  }

?>