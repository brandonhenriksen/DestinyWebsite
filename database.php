<?php
if($_SERVER['SERVER_ADDR'] == '127.0.0.1'){
    $db = new PDO("mysql:dbname=test;host=localhost", "root", "root" );
}else{
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db = new PDO("mysql:dbname=heroku_fed372fd9c9f881;host=" . $url["host"], $url["user"],$url["pass"] );
}