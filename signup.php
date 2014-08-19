<?php error_reporting(-1); ini_set('display_errors', 'On'); ini_set('html_errors', 1);

include 'header.php';
include "database.php";

//if post request
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //if post request has value 'Gamertag'
    if(!empty($_POST['Gamertag']))
    {
        //try-catch block for database actions, they throw exceptions
        try{

            $statement = $db->prepare("SELECT count(*) FROM user WHERE name = :gamertag");
            $statement->bindValue(':gamertag', $_POST['Gamertag']);
            $statement->execute();

            if($statement->fetchColumn() != 0){

                $gamertagErr = "* PSN ID already exists!";

            }else{

                $statement = $db->prepare("insert into user VALUES(:gamertag)");
                $statement->bindValue(':gamertag', $_POST['Gamertag']);
                $statement->execute();

            }

        }catch(PDOException $e) {

            echo 'Exception -> ';
            var_dump($e->getMessage());

        }

    }else if(empty($_POST['Gamertag'])) {

        $gamertagErr = "* PSN ID is required";

    }

}

?>

<div class="container moon-background">
    <div class="row ">

    <div class="columns small-12 text-center">

        <div class ="intro">

            <h1>Sign Up</h1>

            <form action="signup.php" method="POST">

                <div class ="input-wrapper">

                    <label class="sFormLabel error" for="Gamertag">PSN ID:
                        <input type = "text" id = "Gamertag" name="Gamertag" class ="gamertagSubmit" autofocus>
                        <?php if(isset($gamertagErr)): ?><small class="error"><?php echo $gamertagErr;?></small><?php endif; ?>
                    </label>

                </div>

            </form>

        </div>

    </div>
</div>


<?php include 'footer.php'; ?>