<?php
session_start();
session_unset();
Session_destroy();
header("Location: ../landingPage.html");
?>