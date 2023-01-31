<?php

require_once '../autoload.php';

date_default_timezone_set('America/Argentina/Mendoza');

if(!session_id()) {
    session_start();
}

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=Cart::getInstance();
}

if(!isset($_SESSION["conversation"])){
    $_SESSION["conversation"] = new Conversation();
}

new App();
