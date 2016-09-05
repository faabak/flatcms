<div class="content">

<?php

// Write errorlog if any exist

if ($ErrorLog != "")
  {
  echo("<div style='background-color:#f0f0f0;border:1px solid #e0e0e0;padding:5px'>");
  echo("<b>Errors found:</b><br><font color='#ff0000'>{$ErrorLog}</font>");
  echo("</div><br>");
  }

// Load content

include("pages/{$CurrentPage}.php");

?>

</div>