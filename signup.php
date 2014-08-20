<?php error_reporting(-1); ini_set('display_errors', 'On'); ini_set('html_errors', 1);

include 'header.php';
include "database.php";

//if post request
if($_SERVER['REQUEST_METHOD'] === 'POST'){


    //if post request has value 'PSN_ID'
    if(!empty($_POST['PSN_ID']))
    {
        //try-catch block for database actions, they throw exceptions
        try{

            $statement = $db->prepare("SELECT count(*) FROM user WHERE name = :gamertag");
            $statement->bindValue(':PSN_ID', $_POST['PSN_ID']);
            $statement->execute();

            if($statement->fetchColumn() != 0){

                $gamertagErr = "* PSN ID already exists!";

            }else {

                $statement = $db->prepare("insert into user VALUES(:gamertag)");
                $statement->bindValue(':PSN_ID', $_POST['PSN_ID']);
                $statement->execute();

            }
        }catch(PDOException $e) {

        echo 'Exception -> ';
        var_dump($e->getMessage());

        }


    }else if(empty($_POST['PSN_ID'])) {

        $gamertagErr = "* PSN ID is required";

    }

}

?>

<div class="container moon-background">
    <div class="row">

    <div class="columns small-12">

        <div class ="intro text-center">




                <h1>Sign Up</h1>




                <form action="signup.php" method="POST">

                    <div class ="row">

                        <label class="sFormLabel error" for="PSN_ID">PSN ID:
                            </label>
                    </div>

                    <div class ="row">
                        <div class="large-12 columns">
                            <label class="sFormLabel error" for="PSN_ID">
                                <input type ="text" id = "PSN_ID" name="PSN_ID" class ="psnSubmit">
                                <?php if(isset($gamertagErr)): ?><small class="error"><?php echo $gamertagErr;?></small><?php endif; ?>
                            </label>
                        </div>
                    </div>

                    <div class ="row">
                        <div class="large-12 columns">
                            <label class="sFormLabel error">Availability:</label>
                        </div>
                    </div>

                    <div class ="row">
                        <div class="large-3 columns availSelect">
                            <label class="sFormLabel error">Days Available
                                <select class="small">
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                            </label>
                        </div>

                        <div class="large-3 columns availSelect">
                            <label class="sFormLabel error">Times Available
                                <select class="small">
                                    <option DISABLED>Placeholder for Slider</option>

                                </select>
                            </label>
                        </div>
                        
                    </div>


                </form>
            <div class="large-12 columns">
                <button type="submit" class="button radius roundButton">Submit</button>
            </div>
        </div>

    </div>
</div>


<?php include 'footer.php'; ?>