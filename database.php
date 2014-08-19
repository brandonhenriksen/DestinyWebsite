<?php
if(gethostname() === 'homestead'){
    $db = new PDO("mysql:dbname=homestead;host=localhost", "homestead", "secret" );

}elseif($_SERVER['SERVER_ADDR'] == '127.0.0.1'){
    $db = new PDO("mysql:dbname=test;host=localhost", "root", "root" );

}else{
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db = new PDO("mysql:dbname=heroku_fed372fd9c9f881;host=" . $url["host"], $url["user"],$url["pass"] );
}

//set to throw exceptions
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );