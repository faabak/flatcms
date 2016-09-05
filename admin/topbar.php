<div class="cmsTopbar">

<ul>
<?php
if (isset($_GET["sp"]) == false)
  {
  echo("<li><a href='#' onclick='javascript:toggleSidebar()'><i class='material-icons'>&#xE051;&nbsp;</i>{$WebTitle}</a></li>");
  }
else
  {
  echo("<li><a href='index.php'><i class='material-icons'>&#xE051;&nbsp;</i>{$WebTitle}</a></li>");
  }
?>



</ul>

<ul style="float:right">
<li><a href="index.php?logout=true" style="width:auto"><i class="material-icons">&#xE898;&nbsp;</i>Log out</a></li>
</ul>

</div>