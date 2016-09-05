<?php
if (isset($_GET["sp"]) != true)
  {
?>
<li><a href="javascript:createPage()"><i class='material-icons'>&#xE148;&nbsp;</i>New page</a></li>

<?php

if (isset($_GET["sp"]) == false)
  {
  echo("<li><a href='index.php?sp=editor&p={$CurrentPage}'><i class='material-icons'>&#xE86F;&nbsp;</i>Editor</a></li>");
  echo("<li><a href='index.php?p={$CurrentPage}'><i class='material-icons'>&#xE5D5;&nbsp;</i>Refresh</a></li>");
  if ($CurrentPage != "home")
    {
    echo("<li><a href='javascript:deletePage(\"{$CurrentPage}\")'><i class='material-icons'>&#xE872;&nbsp;</i>Delete</a></li>");
    }
  }

?>
<?php
  }
?>