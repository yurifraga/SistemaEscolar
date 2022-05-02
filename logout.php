<?php
session_start();
session_destroy();
header('Location:/escola/view/home.php');