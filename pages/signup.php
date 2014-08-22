<?php

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

        <div class="columns small-12 text-center intro">

            <h1>Sign Up</h1>

            <form ng-submit="submit('/api/addUser')" ng-controller="AvailabilityController">

                <div class ="row">

                    <label class="sFormLabel error" for="PSN_ID">PSN ID:
                    </label>
                </div>

                <div class ="row">
                    <div class="large-4 large-centered columns">
                        <label class="sFormLabel error" for="PSN_ID">
                            <input ng-model="availability.PSN_ID" type ="text" id = "PSN_ID" name="PSN_ID" class ="psnSubmit">
                            <?php if(isset($gamertagErr)): ?><small class="error"><?php echo $gamertagErr;?></small><?php endif; ?>
                        </label>
                    </div>
                </div>

                <div class ="row">
                    <div class="large-12 columns">
                        <label class="sFormLabel error">Availability:</label>
                    </div>
                </div>

                <div class="row daySelect">

                    <h2 class="sFormLabel error">Days Available</h2>

                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.days.monday, smallMainButton: !availability.days.monday}" ng-click="toggleDay('monday')" type="button">Monday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.tuesday, smallMainButton: !availability.days.tuesday}" ng-click="toggleDay('tuesday')" type="button">Tuesday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.wednesday, smallMainButton: !availability.days.wednesday}" ng-click="toggleDay('wednesday')" type="button">Wednesday</button>
                    </div>

                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.days.thursday, smallMainButton: !availability.days.thursday}" ng-click="toggleDay('thursday')" type="button">Thursday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.friday, smallMainButton: !availability.days.friday}" ng-click="toggleDay('friday')" type="button">Friday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.saturday, smallMainButton: !availability.days.saturday}" ng-click="toggleDay('saturday')" type="button">Saturday</button>
                    </div>

                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.days.sunday, smallMainButton: !availability.days.sunday}" ng-click="toggleDay('sunday')" type="button">Sunday</button>
                    </div>

                </div>

                <div class="row availSelect">
                    <label for= "availSelect" class="sFormLabel error">Times Available</label>
                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.times['first'], smallMainButton: !availability.times['first']}" ng-click="toggleTime('first')"  type="button">first</button>
                        <button ng-class="{smallMainButtonActive: availability.times['second'], smallMainButton: !availability.times['second']}" ng-click="toggleTime('second')" type="button">second</button>
                        <button ng-class="{smallMainButtonActive: availability.times['third'], smallMainButton: !availability.times['third']}" ng-click="toggleTime('third')"  type="button">third</button>
                    </div>
                </div>

                <div class="large-12 columns">
                    <button type="submit" class="mainButton">Submit</button>
                </div>

            </form>

        </div>

    </div>

</div>