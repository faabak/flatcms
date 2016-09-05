<div class="footer">

Logged in:
<?php
echo("{$LoggedIn}");

if ($LoggedIn == "false")
  {
  echo(" - <a href='admin'>Log in</a>");
  }
?>

</div>