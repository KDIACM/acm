<?php
if (!isset($_SESSION['admin']['user_id'])) {
  if ($_SERVER['QUERY_STRING'] == '')
    $_SESSION['requested_url'] = $_SERVER['PHP_SELF'];
  else
    $_SESSION['requested_url'] = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];

 header("Location:login.php");
}
else
{
  if (isset($_SESSION['requested_url']))
    unset($_SESSION['requested_url']);
}
?>