<?php error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);


include 'header.php';


if($_SERVER['SERVER_ADDR'] == '127.0.0.1'){
    $db = new PDO("mysql:dbname=test;host=localhost", "root", "root" );
}else{
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db = new PDO("mysql:dbname=heroku_fed372fd9c9f881;host=" . $url["host"], $url["user"],$url["pass"] );
}

$exists = $db->query("SELECT * FROM `user` WHERE name = '" . $_GET['Gamertag'] . "'");

$exists = $exists->fetch();

if(empty($exists))
{
    $db->exec("insert into USER VALUES('". $_GET['Gamertag'] ."') ");
}else{
    echo "gamertag already exists!";
}
?>

<div id = "main">
    <div id = "mc_embed_signup">

        <form action="signup.php">
            <label>Gamertag
            <input type = "text" name = "Gamertag">
            </label>
        </form>


    </div>
</div>


<?php include 'footer.php'; ?>