<?php
include("../config/settings.php");
?>

<html>
<head>
<title>FlatCMS login</title>
<meta name=viewport content="width=300">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin.css" rel="stylesheet">
<?php include("loadtheme.php"); ?>
</head>
<body>

<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" style="font-size:inherit">
<tr valign="middle">
<td>

<form action="../index.php" method="post">
<div class="systemPageInner" style="width:200px">

<div style="width:200px;margin:0 auto;text-align:right">
<i class="material-icons" style="vertical-align:middle">person</i>
<input type="text" class="cmsInput" style="vertical-align:middle;width:170px" name="login"><br><br>
<i class="material-icons" style="vertical-align:middle">lock</i>
<input type="password" class="cmsInput" style="vertical-align:middle;width:170px" name="password">
</div><br>

<div style="width:200px;margin:0 auto;text-align:right">
<input type="submit" class="cmsButton" value="Login">
<input type="button" class="cmsButtonGrey" value="Cancel" onclick="window.location='../index.php';">
</div>

</div>
</form>

</td>
</tr>
</table>

</body>
</html>