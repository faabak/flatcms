<form action="index.php?sp=settings" method="post">

<div class="systemPageInner" style="width:670px;margin-left:270px">
<h2 style="float:left;color:<?php echo($CmsColor);?>"><i class="material-icons" style="vertical-align:middle;font-size:inherit">&#xE8B8;</i> Settings</h2><br><br><br>

<div>Web Title:
<?php
echo("<input type='text' name='webTitle' value='{$WebTitle}' class='cmsInput' style='float:right'>");
?>
</div><br>

<div>Admin Login:
<?php
echo("<input type='hidden' name='adminLogin' value='{$AdminLogin}'><span style='float:right'>{$AdminLogin}</span>");
?>
</div><br>

<div>Admin Password:
<?php
echo("<input type='hidden' name='adminPassword' value='{$AdminPassword}'><span style='float:right'>{$AdminPassword}</span>");
?>
</div><br>

<div>CMS color:
<?php
echo("<input type='text' name='cmsColor' value='{$CmsColor}' class='cmsInput' style='float:right'>");
?>
</div><br>

<div>Admin Font (supports Google fonts):
<?php
echo("<input type='text' name='cmsFont' value='{$CmsFont}' class='cmsInput' style='float:right'>");
?>
</div><br><br>

<div style="float:right">
<input type="hidden" name="saveSettings" value="true">
<input type="submit" class="cmsButton" value="Save">&nbsp;
<input type="reset" class="cmsButtonGrey" value="Close" onclick="window.location='index.php';">
</div><br><br>

</div>

</form>