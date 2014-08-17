<?php error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);


include 'header.php';
include "database.php";

$gamertagErr = "";
$gamertag = "";


if(!empty($_POST['Gamertag']))
{
    $exists = $db->query("SELECT * FROM `user` WHERE name = '" . $_POST['Gamertag'] . "'");

    $exists = $exists->fetch();

    if(empty($exists))
    {
        $db->exec("insert into USER VALUES('". $_POST['Gamertag'] ."') ");
    }else{
        $gamertagErr = "* PSN ID already exists!";
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['Gamertag'])){
        $gamertagErr = "* PSN ID is required";
    }else{
        $gamertag = test_input($_POST["Gamertag"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}






?>

<div id = "main">
    <div id = "mc_embed_signup">

        <form action="signup.php" method="post">
            <div class ="submitForm">
                <h1>Sign Up</h1>
                <label class="sFormLabel" for="Gamertag">
                   <span>PSN ID:</span><input type = "text" id = "Gamertag" name="Gamertag" class ="gamertagSubmit">
                    <label class="errorLabel"> <?php echo $gamertagErr;?></label>
                    <br/>
                </label>








            </div>




        </form>


    </div>
</div>


<?php include 'footer.php'; ?>