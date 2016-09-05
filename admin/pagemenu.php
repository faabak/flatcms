<ul>
<li><a href="javascript:createPage()"><i class='material-icons'>&#xE148;&nbsp;</i>New page</a></li>
</ul>
<ul>

<?php
  if ($handle = opendir('pages'))
    {
    while (false !== ($entry = readdir($handle)))
      {
      if ($entry != "." && $entry != "..")
        {
        $entry = preg_replace('/\\.[^.\\s]{3,4}$/', '', $entry);
        echo("<li>");
        if ($entry == $CurrentPage or $entry == $_GET["p"])
          {
          echo("<a href='index.php?p={$entry}' style='background-color:#f8f8f8;width:110px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden'><i class='material-icons'>&#xE051;&nbsp;</i>{$entry}</a>");
          }
        else
          {
          echo("<a href='index.php?p={$entry}' style='width:110px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden'><i class='material-icons'>&#xE051;&nbsp;</i>{$entry}</a>");
          }

        // Load page-actions

        echo("<a href='index.php?sp=editor&p={$entry}' style='width:15px;margin-left:5px'><i class='material-icons'>&#xE254;&nbsp;</i></a>");
        if ($entry != "home")
          {
          echo("<a href='javascript:deletePage(\"{$entry}\")' style='width:15px;margin-left:5px'><i class='material-icons'>&#xE872;&nbsp;</i></a>");
          }
        else
          {
          echo("<a style='width:15px;margin-left:5px'><i class='material-icons' style='color:#808080'>&#xE872;&nbsp;</i></a>");
          }
        echo("</li>");
        }
      }
    }
?>

</ul>