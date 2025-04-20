<?php
session_start();
session_destroy();
header("Location: index.php");
setcookie("items", "", time() - 3600);
