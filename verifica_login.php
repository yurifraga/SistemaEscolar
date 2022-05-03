<?php
if(!$_SESSION['user']){
    header('Location:/escola/view/home.php');
}