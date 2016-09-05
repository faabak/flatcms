<?php

// Load folder

$gjeldendemappe=".";

if (isset($_GET['f']))
  {
  $gjeldendemappe="{$_GET['f']}";
  }


// Take care of uploaded file

if (isset($_FILES['fileToUpload']))
  {
  $target_path = $gjeldendemappe . "/" . basename($_FILES['fileToUpload']['name']);
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path);
  }


// Deletes file

if (isset($_GET['deletefile']))
  {
  if (file_exists($gjeldendemappe . "/" . $_GET['deletefile']))
    {
    unlink($gjeldendemappe . "/" . $_GET['deletefile']);
    }
  }


// Deletes folder

if (isset($_GET['deletefolder']))
  {
  $dirToDel = $gjeldendemappe . "/" . $_GET['deletefolder'];
  $q = count(glob("$dirToDel/*")) == 0;
  if ($q)
    {
    rmdir($gjeldendemappe . "/" . $_GET['deletefolder']);
    }
  else
    {
    echo("<script language='javascript'> alert('Folder is not empty!'); </script>");
    }
  }


// Creates folder

if (isset($_POST['newFolder']))
  {
  if (!file_exists($gjeldendemappe . "/" . $_POST['newFolder']))
    {
    mkdir($gjeldendemappe . "/" . $_POST['newFolder']);
    }
  else
    {
    echo("<script language='javascript'> alert('Folder already exist!'); </script>");
    }
  }


// Konvertere bytes

function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

?>

<div class="systemPageInner" style="min-width:670px;margin-left:270px;margin-right:20px">
<h2 style="float:left;color:<?php echo($CmsColor);?>"><i class="material-icons" style="vertical-align:middle;font-size:inherit">&#xE2C8;</i> File Manager</h2><br><br>

<table border=0 cellspacing=5 cellpadding=0 width=100%>
<tr valign='middle'>

<td>
<?php

// Mappelinje

echo("Current folder: ");
$mappesamling=split("/",$gjeldendemappe);
$mappestring="";
foreach ($mappesamling as $mappebit)
  {
  if ($mappestring=="")
    {
    $mappestring="{$mappebit}";
    }
  else
    {
    $mappestring="{$mappestring}/{$mappebit}";
    }

  if ($mappebit==".")
    {
    echo("<a href='index.php?sp=filemanager&f={$mappestring}'>Root</a> / ");
    }
  else
    {
    echo("<a href='index.php?sp=filemanager&f={$mappestring}'>{$mappebit}</a> / ");
    }
  }
echo("</td>");

echo("<form action='index.php?sp=filemanager&f={$gjeldendemappe}' method='post' id='createFolderForm'>");
echo("<td width=80 align='right'>");
echo("<input type='button' value='Add Folder..' onclick='createFolder()' class='cmsButton'>");
echo("<input type='hidden' name='f' value='{$gjeldendemappe}'>");
echo("<input type='hidden' name='newFolder' id='newFolder'>");
echo("</td>");
echo("</form>");

echo("<form enctype='multipart/form-data' action='index.php?sp=filemanager&f={$gjeldendemappe}' method='post' id='uploadForm'>");
echo("<td width=80 align='right'>");
echo("<input type='button' value='Upload File..' onclick='uploadFile()' class='cmsButton'>");
echo("<input type='hidden' name='f' value='{$gjeldendemappe}'>");
echo("<input type='file' name='fileToUpload' id='fileToUpload' onchange='document.all.uploadForm.submit()' style='display:none'>");
echo("</td>");
echo("</form>");
?>

<td width=40 align="right">
<input type="reset" class="cmsButtonGrey" value="Close" onclick="window.location='index.php';">
</td>

</tr></table>

</div>

<div class="systemPageInner" style="min-width:670px;margin-left:270px;margin-right:20px">
<table border=0 cellspacing=0 cellpadding=10 width=100%>
<tr valign="top">
<td width="30%">

<table border=0 cellspacing=0 cellpadding=10 width=100%>
<tr><td>Folders</td><td width="16px">&nbsp;</td></tr>
<?php

// List mapper

$aapnemappe=opendir($gjeldendemappe);
while (($mappe = readdir($aapnemappe)) !== false)
  {
  if ($mappe!="." && $mappe!="..")
    {
    if (is_dir("{$gjeldendemappe}/{$mappe}"))
      {
      echo("<tr valign='middle' onmouseover='this.style.backgroundColor=\"#f0f0f0\";' onmouseout='this.style.backgroundColor=\"initial\";'>");
      echo("<td>");
      echo("<a href='index.php?sp=filemanager&f={$gjeldendemappe}/{$mappe}' style='text-overflow:ellipsis;white-space:nowrap;overflow:hidden'><i class='material-icons' style='vertical-align:middle;margin-right:5px;font-size:inherit'>&#xE2C7;</i>{$mappe}</a></td>");
      echo("<td style='width:16px' align='right'>");
      echo("<a href='javascript:confirmNavigate(\"index.php?sp=filemanager&f={$gjeldendemappe}&deletefolder={$mappe}\",\"Are you sure you want to delete this folder?\")' alt='Delete'><i class='material-icons' style='vertical-align:middle;font-size:inherit'>&#xE872;</i></a></td>");
      echo("</tr>");
      }
    }
  }
closedir($aapnemappe);

?>
</table>
</td>

<td width="70%">

<table border=0 cellspacing=0 cellpadding=10 width=100%>
<tr><td>Files</td><td align="right">Size</td><td width="75px">&nbsp;</td></tr>

<?php


// List filer

$aapnemappe=opendir($gjeldendemappe);

while ($filer=readdir($aapnemappe))
  {
  if ($filer!="." && $filer!="..")
    {
      if (is_file("{$gjeldendemappe}/{$filer}"))
      {
      $picturelink = "&#xE24D;";

      $filnavn = $gjeldendemappe."/".$filer;
      $filendelse = pathinfo($filnavn, PATHINFO_EXTENSION);

      if ($filendelse == "png" || $filendelse == "bmp" || $filendelse == "gif" || $filendelse == "jpg")
        {
        $picturelink = "&#xE3F4;";
        }

      if ($filendelse == "exe" || $filendelse == "bat")
        {
        $picturelink = "&#xE069;";
        }

      if ($filendelse == "txt")
        {
        $picturelink = "&#xE873;";
        }

      if ($filendelse == "js")
        {
        $picturelink = "&#xE873;";
        }

      if ($filendelse == "css")
        {
        $picturelink = "&#xE3B7;";
        }

      if ($filendelse == "php" || $filendelse == "htm" || $filendelse == "html" || $filendelse == "php3")
        {
        $picturelink = "&#xE051;";
        }

      $filstorrelse = filesize("{$gjeldendemappe}/{$filer}");
      $filstorrelse = formatBytes($filstorrelse);

      echo("<tr valign='middle' onmouseover='this.style.backgroundColor=\"#f0f0f0\";' onmouseout='this.style.backgroundColor=\"initial\";'>");
      echo("<td>");
      echo("<a href='{$gjeldendemappe}/{$filer}' target='_blank' style='text-overflow:ellipsis;white-space:nowrap;overflow:hidden'><i class='material-icons' style='vertical-align:middle;margin-right:5px;font-size:inherit'>{$picturelink}</i>{$filer}</a></td>");
      echo("<td style='width:100px' align='right'>");
      echo("{$filstorrelse}</td>");
      echo("<td style='width:50px' align='right'>");
      if ($filendelse == "php" || $filendelse == "htm" || $filendelse == "html" || $filendelse == "php3" || $filendelse == "css" || $filendelse == "js")
        {
        $thefolderpath = str_replace("./" ,"", $gjeldendemappe);
        echo("<a href='index.php?sp=editor&editfile={$thefolderpath}/{$filer}' alt='Edit' style='margin-right:20px'><i class='material-icons' style='vertical-align:middle;font-size:inherit'>&#xE254;</i></a>");
        }
      echo("<a href='javascript:confirmNavigate(\"index.php?sp=filemanager&f={$gjeldendemappe}&deletefile={$filer}\",\"Are you sure you want to delete this file?\")' alt='Delete'><i class='material-icons' style='vertical-align:middle;font-size:inherit'>&#xE872;</i></a></td>");
      echo("</tr>");
      }
    }
  }
closedir($aapnemappe);

?>

</table>
</td>

</tr>
</table>
</div>