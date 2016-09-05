<?php

// Initialize variables

$LoggedIn = "false";
$ErrorLog = "";
$CurrentPage = "home";

// Check if login form filled in

if (isset($_POST["login"]) && isset($_POST["password"]))
  {
  if ($_POST["login"] == $AdminLogin && $_POST["password"] == $AdminPassword)
    {
    $_SESSION["FlatCmsAdmin"] = $AdminLogin;
    $LoggedIn = "true";
    }
  else
    {
    $ErrorLog .= "- Login unsuccessful - Check your username and password.\n<br>";
    }
  }

// Check if session exists

if (isset($_SESSION["FlatCmsAdmin"]) && $_SESSION["FlatCmsAdmin"]==$AdminLogin)
  {
  $LoggedIn = "true";
  }

// Check if logout is requested

if (isset($_GET['logout']))
  {
  if ($_GET['logout'] == "true")
   {
   session_unset();
   $LoggedIn = "false";
   }
  }

// Load page

if (isset($_GET["p"]))
  {
  $CurrentPage = $_GET["p"];
  }

?>