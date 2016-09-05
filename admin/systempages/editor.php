<form action="index.php" method="post">

<div class="systemPageInner" style="min-width:670px;margin-left:270px;margin-right:20px">
<?php
echo("<h2 style='float:left;color:{$CmsColor}'><i class='material-icons' style='vertical-align:middle;font-size:inherit'>&#xE86F;</i> Editor: {$CurrentPage}</h2>");
if (isset($_GET["p"]) == true)
  {
  echo("<input type='hidden' name='savePage' value='{$CurrentPage}'>");
  }
if (isset($_GET["editfile"]) == true)
  {
  echo("<input type='hidden' name='saveFile' value='{$_GET["editfile"]}'>");
  }
?>

<div style="float:right">
<?php
echo("<input type='submit' class='cmsButton' value='Save & Close'>&nbsp;");
if (isset($_GET["p"]) == true)
  {
  echo("<input type='reset' class='cmsButtonGrey' value='Discard' onclick='window.location=\"index.php?p={$CurrentPage}\";'>");
  }
if (isset($_GET["editfile"]) == true)
  {
  echo("<input type='reset' class='cmsButtonGrey' value='Discard' onclick='window.location=\"index.php?sp=filemanager\";'>");
  }
?>
</div><br><br><br>

<textarea onkeyup="expandEditor()" id="editorArea" class="cmsInput cmsEditor" name="saveContent">
<?php
if (isset($_GET["p"]) == true)
  {
  echo(file_get_contents("pages/{$CurrentPage}.php"));
  }
if (isset($_GET["editfile"]) == true)
  {
  echo(file_get_contents($_GET["editfile"]));
  }
?>
</textarea>
<script>
expandEditor();
</script><br>

</div>

</form>