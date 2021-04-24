<?php 
// middelwares
session_start();
function CheckifAuth(){
    return isset($_SESSION["user_id"]);
}