<?php
session_start();
require_once("connect.php");
session_unset("stuid");
session_destroy();
header("location:index.php");
?>
