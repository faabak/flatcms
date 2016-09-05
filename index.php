<?php
session_start();
include("config/settings.php");
include("data/boot.php");
include("admin/actions.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>
<?php echo($WebTitle); ?>
</title>
<meta name=viewport content="width=1000">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Code+Pro:400' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin/admin.css" rel="stylesheet">
<?php
include("admin/loadtheme.php");
?>
<link href="config/style.css" rel="stylesheet">
<script src="admin/scripts.js" language="JavaScript"></script>
</head>
<body>

<?php
include("data/pageloader.php");
?>

</body>
</html>