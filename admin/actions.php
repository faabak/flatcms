<?php

// Create page

if (isset($_GET["createPage"]))
  {
  if (file_exists("pages/{$_GET["createPage"]}.php") != true)
    {
    $createPageHandler = fopen("pages/{$_GET["createPage"]}.php", 'w');

    if ($createPageHandler == true)
      {
      $CurrentPage = $_GET["createPage"];
      }
    else
      {
      $ErrorLog .= "- Could not create file \"pages/{$_GET["createPage"]}.php\". Might be some file access issues..";
      $CurrentPage = "home";
      }
    fclose($createPageHandler);
    }
  else
    {
    $ErrorLog .= "- Could not create file \"pages/{$_GET["createPage"]}.php\". The file already exist.";
    }
  }


// Delete page

if (isset($_GET["deletePage"]))
  {
  $deletePageHandler = unlink("pages/{$_GET["deletePage"]}.php");
  if ($deletePageHandler == false)
    {
    $ErrorLog .= "- Could not delete file \"pages/{$_GET["deletePage"]}.php\". It might already been deleted..";
    }
  fclose($deletePageHandler);
  }


// Save page

if (isset($_POST["saveContent"]) && isset($_POST["savePage"]))
  {
  $fileContent = $_POST["saveContent"];
  $fileName = $_POST["savePage"];
  $saveFile = fopen("pages/{$fileName}.php", "w");

  if ($saveFile == true)
    {
    $saveProcess = fwrite($saveFile, $fileContent);
    if ($saveProcess == false)
      {
      $ErrorLog .= "- Could not write to file.";
      }
    }
  else
    {
    $ErrorLog .= "- Could not open file for writing.";
    }

  fclose($saveFile);
  $CurrentPage = $fileName;
  }

// Save file

if (isset($_POST["saveContent"]) && isset($_POST["saveFile"]))
  {
  $fileContent = $_POST["saveContent"];
  $fileName = $_POST["saveFile"];
  $saveFile = fopen("{$fileName}", "w");

  if ($saveFile == true)
    {
    $saveProcess = fwrite($saveFile, $fileContent);
    if ($saveProcess == false)
      {
      $ErrorLog .= "- Could not write to file.";
      }
    }
  else
    {
    $ErrorLog .= "- Could not open file for writing.";
    }

  fclose($saveFile);
  echo("<script>window.location='index.php?sp=filemanager';</script>");
  }

// Save settings

if (isset($_POST["saveSettings"]) && ($_POST["saveSettings"]=="true"))
  {
  $CmsColor = $_POST["cmsColor"];
  $CmsFont = $_POST["cmsFont"];
  $WebTitle = strip_tags($_POST["webTitle"]);
  $AdminLogin = $_POST["adminLogin"];
  $AdminPassword = $_POST["adminPassword"];
  $SettingsContent = "<?php\r\n\r\n";
  $SettingsContent .= "\$AdminLogin = \"{$AdminLogin}\";\r\n";
  $SettingsContent .= "\$AdminPassword = \"{$AdminPassword}\";\r\n";
  $SettingsContent .= "\$WebTitle = \"{$WebTitle}\";\r\n";
  $SettingsContent .= "\$CmsColor = \"{$CmsColor}\";\r\n";
  $SettingsContent .= "\$CmsFont = \"{$CmsFont}\";\r\n";
  $SettingsContent .= "\r\n\r\n?>";
  $saveFile = fopen("config/settings.php", "w");

  if ($saveFile == true)
    {
    
    $saveProcess = fwrite($saveFile, $SettingsContent);
    if ($saveProcess == false)
      {
      $ErrorLog .= "- Could not write to file.";
      }
    }
  else
    {
    $ErrorLog .= "- Could not open file for writing.";
    }

  fclose($saveFile);
  }

?>