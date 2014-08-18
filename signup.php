<?php error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);


include 'header.php';
include "database.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['Gamertag']))
    {
        $exists = $db->query("SELECT * FROM `user` WHERE name = '" . $_POST['Gamertag'] . "'");

        $exists = $exists->fetch();

        if(empty($exists))
        {
            $db->exec("insert into USER VALUES('". test_input($_POST['Gamertag']) ."') ");
        }else{
            $gamertagErr = "* PSN ID already exists!";
        }

    }else if(empty($_POST['Gamertag'])) {
        $gamertagErr = "* PSN ID is required";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysql_real_escape_string($data);
    return $data;
}

?>

<div class="container moon-background">
    <div class="row ">

    <div class="columns small-12 text-center">

        <div class ="intro">

            <h1>Sign Up</h1>

            <form action="signup.php" method="POST">

                <div class ="input-wrapper">

                    <label class="sFormLabel" for="Gamertag">PSN ID:
                        <input type = "text" id = "Gamertag" name="Gamertag" class ="gamertagSubmit" autofocus>
                        <?php if(isset($gamertagErr)): ?><small class="error"><?php echo $gamertagErr;?></small><?php endif; ?>
                    </label>

                    <div class="large-12 columns">
                        <button type="submit" class="medium button green">Submit</button>
                    </div>

                </div>

            </form>

        </div>

    </div>
</div>


<?php include 'footer.php'; ?>