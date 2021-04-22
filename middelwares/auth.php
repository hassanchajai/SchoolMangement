<?php 
// middelwares
function CheckifAuth(){
    return isset($_SESSION["user_id"]);
}