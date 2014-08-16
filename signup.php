<?php
include 'header.php';

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
$db = new PDO("mysql:dbname=test;host=" . $url["host"], $url["user"],$url["pass"] );

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