<?php
if(!$_SESSION['user']){
    header('Location:Location:/escola/view/home.php');
}