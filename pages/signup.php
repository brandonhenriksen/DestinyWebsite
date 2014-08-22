

<div class="container moon-background" ng-controller="AvailabilityController">

    <div class="row">

        <div ng-if="success" class="successMessage">Thanks</div>

        <div class="columns small-12 text-center intro" ng-if="!success">

            <h1>Sign Up</h1>

            <form ng-submit="submit('/api/addUser')">

                <div class ="row">

                    <label class="sFormLabel error" for="psn_name">PSN ID:
                    </label>
                </div>

                <div class ="row">
                    <div class="large-4 large-centered columns">
                        <label class="sFormLabel error" for="psn_name">
                            <input ng-model="availability.psn_name" type ="text" id = "psn_name" name="psn_name" class ="psnSubmit">
                        </label>
                    </div>
                </div>

                <div class ="row errorMessage" >

                    <div class="large-4 large-centered columns" ng-if="error">
                        <span>{{error}}</span>
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
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(1) > -1, smallMainButton: availability.days.indexOf(1) === -1}" ng-click="toggleDay(1)" type="button">Monday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(2) > -1, smallMainButton: availability.days.indexOf(2) === -1}" ng-click="toggleDay(2)" type="button">Tuesday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(3) > -1, smallMainButton: availability.days.indexOf(3) === -1}" ng-click="toggleDay(3)" type="button">Wednesday</button>
                    </div>

                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(4) > -1, smallMainButton: availability.days.indexOf(4) === -1}" ng-click="toggleDay(4)" type="button">Thursday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(5) > -1, smallMainButton: availability.days.indexOf(5) === -1}" ng-click="toggleDay(5)" type="button">Friday</button>
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(6) > -1, smallMainButton: availability.days.indexOf(6) === -1}" ng-click="toggleDay(6)" type="button">Saturday</button>
                    </div>

                    <div class ="row">
                        <button ng-class="{smallMainButtonActive: availability.days.indexOf(7) > -1, smallMainButton: availability.days.indexOf(7) === -1}" ng-click="toggleDay(7)" type="button">Sunday</button>
                    </div>

                </div>

                <div class="row availSelect">
                    <label for= "availSelect" class="sFormLabel error">Times Available</label>
                    <div class ="row">

                        <button ng-class="{smallMainButtonActive: availability.times.indexOf(1) > -1, smallMainButton: availability.times.indexOf(1) === -1}" ng-click="toggleTime(1)"  type="button">5pm-8pm</button>
                        <button ng-class="{smallMainButtonActive: availability.times.indexOf(2) > -1, smallMainButton: availability.times.indexOf(2) === -1}" ng-click="toggleTime(2)" type="button">8pm-11pm</button>
                        <button ng-class="{smallMainButtonActive: availability.times.indexOf(3) > -1, smallMainButton: availability.times.indexOf(3) === -1}" ng-click="toggleTime(3)"  type="button">11pm-2am</button>
                    </div>
                </div>

                <div class="large-12 columns">
                    <button type="submit" class="mainButton">Submit</button>
                </div>

            </form>

        </div>

    </div>

</div>