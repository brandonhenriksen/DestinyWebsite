<?php error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);


include 'header.php';
include "database.php";

if(!empty($_POST['Gamertag']))
{
    $exists = $db->query("SELECT * FROM `user` WHERE name = '" . $_POST['Gamertag'] . "'");

    $exists = $exists->fetch();

    if(empty($exists))
    {
        $db->exec("insert into USER VALUES('". $_POST['Gamertag'] ."') ");
    }else{
        echo "<p class='error'>Gamertag already exists!</p>";
    }
}

?>

<div id = "main">
    <div id = "mc_embed_signup">

        <form action="signup.php" method="post">
            <label class="gamertagLabel" for="Gamertag">Enter Gamertag:</label>
            <div>
                <input type = "text" id = "Gamertag" name="Gamertag" class ="gamertagSubmit">
            </div>


        </form>


    </div>
</div>


<?php include 'footer.php'; ?>