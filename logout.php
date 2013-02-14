<?php
    session_start();

//unset ($_SESSION['login']);
session_destroy();
session_unset();
header ("Location: login.php");

?>