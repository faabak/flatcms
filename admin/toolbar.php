<?php

// Identify active CMS page

$activeCmsPage = "";

if (isset($_GET["sp"]) && ($_GET["sp"] == "editor"))
  {
  $activeCmsPage = "editor";
  }

if (isset($_GET["sp"]) && ($_GET["sp"] == "filemanager"))
  {
  $activeCmsPage = "filemanager";
  $CurrentPage = "";
  }

if (isset($_GET["sp"]) && ($_GET["sp"] == "settings"))
  {
  $activeCmsPage = "settings";
  $CurrentPage = "";
  }

if (isset($_GET["sp"]) && ($_GET["sp"] == "info"))
  {
  $activeCmsPage = "info";
  $CurrentPage = "";
  }
?>

<?php
include("topbar.php");
?>

<div class="cmsToolbar" id="cmsSidebar">

<div class="cmsToolbarInner">

<?php
include("pagemenu.php");

echo("<ul>");

if ($activeCmsPage == "filemanager")
  {
  echo("<li><a href='index.php?sp=filemanager' style='background-color:#f8f8f8'><i class='material-icons'>&#xE2C8;&nbsp;</i>Filemanager</a></li>");
  }
else
  {
  echo("<li><a href='index.php?sp=filemanager'><i class='material-icons'>&#xE2C8;&nbsp;</i>Filemanager</a></li>");
  }

if ($activeCmsPage == "settings")
  {
  echo("<li><a href='index.php?sp=settings' style='background-color:#f8f8f8'><i class='material-icons'>&#xE8B8;&nbsp;</i>Settings</a></li>");
  }
else
  {
  echo("<li><a href='index.php?sp=settings'><i class='material-icons'>&#xE8B8;&nbsp;</i>Settings</a></li>");
  }

if ($activeCmsPage == "info")
  {
  echo("<li><a href='index.php?sp=info' style='background-color:#f8f8f8'><i class='material-icons'>&#xE88F;&nbsp;</i>Infocenter</a></li>");
  }
else
  {
  echo("<li><a href='index.php?sp=info'><i class='material-icons'>&#xE88F;&nbsp;</i>Infocenter</a></li>");
  }

echo("</ul>");
?>

</div>

</div>