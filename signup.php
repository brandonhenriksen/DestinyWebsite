<?php error_reporting(-1); ini_set('display_errors', 1); ini_set('html_errors', 1);

//
include 'header.php';
include "database.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['Gamertag']))
    {
        $exists = $db->query("SELECT * FROM `user` WHERE name = '" . $_POST['Gamertag'] . "'");

        $exists = $exists->fetch();

        if(empty($exists))
        {
            if($db->exec("insert into USER VALUES('". test_input($_POST['Gamertag']) ."') ")){
                $saved = true;
            }
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
    <div class="row">

    <div class="columns small-12">

        <div class ="intro text-center">

<!--            --><?php //if(isset($thanks)): ?>

                <h1>Sign Up</h1>




                <form action="signup.php" method="POST">

                    <div class ="row">

                        <label class="sFormLabel error" for="Gamertag">PSN ID:
                            </label>
                    </div>

                    <div class ="row">
                        <div class="large-12 columns">
                            <label class="sFormLabel error" for="Gamertag">
                                <input type = "text" id = "Gamertag" name="Gamertag" class ="gamertagSubmit" autofocus>
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
                        <div class="large-6 columns">
                            <label class="sFormLabel error">Days Available
                                <select>
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

                        <div class="large-6 columns">
                            <label class="sFormLabel error">Times Available
                                <select>
                                    <option DISABLED>Placeholder for Slider</option>

                                </select>
                            </label>
                        </div>
                        
                    </div>

                    <div class="large-12 columns">
                        <button type="submit" class="button radius roundButton">Submit</button>
                    </div>
                </form>

<!--            --><?php //elseif(isset($saved) && $saved): ?>

<!--                <h2>Thanks!</h2>-->

<!--            --><?php //endif; ?>

        </div>

    </div>
</div>


<?php include 'footer.php'; ?>