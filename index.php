<?php
require_once "controllers/Router.php";
session_start();
$router=new Router();
$router->ReqRoute();
