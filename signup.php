<?php
include 'header.php';

$db = new PDO("mysql:dbname=test;host=localhost", "root", "root" );

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