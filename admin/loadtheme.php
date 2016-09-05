<?php
$friendlyFontName = str_replace(" ","+",$CmsFont);

echo("<link href='https://fonts.googleapis.com/css?family={$friendlyFontName}:400,700' rel='stylesheet' type='text/css'>");

echo("<style>");

echo(".cmsToolbar, .cmsTopbar, .cmsPagebar, .systemPage, body ");
echo("{font-family:'{$CmsFont}','Open Sans','Helvetica','Arial';} ");

echo("a ");
echo("{color:");
echo($CmsColor);
echo("} ");

echo(".cmsTopbar ");
echo("{background-color:");
echo($CmsColor);
echo("} ");

echo(".cmsToolbar li a i ");
echo("{color:");
echo($CmsColor);
echo("} ");

echo(".cmsToolbar ul li a:hover ");
echo("{color:");
echo($CmsColor);
echo("} ");

echo(".cmsButton ");
echo("{background-color:");
echo($CmsColor);
echo("} ");

echo("</style>");
?>