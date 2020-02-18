<?php
session_start();

unset($_SESSION["username"]);
session_unset();
session_destroy();
// echo "<script language='javascript'>alert('Logging out..')</script>";
header('Refresh: 1;url=index.php');

exit();

?>
?>