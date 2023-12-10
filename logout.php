<?php
session_start();
session_destroy();
header("Location: /pet911/appointment/home.php");

exit;