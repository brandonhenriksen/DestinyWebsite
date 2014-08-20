<?php

include 'header.php';
?>
<div class="container moon-background">
    <div class="row ">

    <div class="columns small-12 text-center ">

        <div class ="intro">
            <h1>Welcome to Sinister Divine</h1>

            <p>PS4 Destiny Clan</p>

            <h5>Time Left Until Launch</h5>

            <!-- Countdown Timer -->
            <div class="counter">
                <span>134 <em>days</em></span>
                    <span>12 <em>hours</em></span>
                    <span>50 <em>minutes</em></span>
                    <span>33 <em>seconds</em></span>
            </div>

            <!-- Join Clan Button -->
            <a href="signup.php" class="button radius roundButton">Join Clan</a>

    </div>

  </div> <!-- main end -->

</div> <!-- end intro section -->


    <div class="wrapper">
        <div class="sliderZone">
            <form onsubmit="return false">
                <div class="ui-rangeSlider ui-rangeSlider-withArrows ui-editRangeSlider" style="position: relative;">
                    <div class="ui-rangeSlider-container" style="position: absolute; width: 1457px;">
                        <div class="ui-rangeSlider-innerBar" style="position: absolute; top: 0px; left: 0px; width: 1457px;"></div>
                        <div class="ui-rangeSlider-bar" style="position: absolute; top: 0px; width: 437.09375px; left: 291.41558837890625px;"></div>
                        <div class="ui-rangeSlider-handle ui-rangeSlider-leftHandle" style="position: absolute; top: 0px; left: 291.4093688964844px;">
                            <div class="ui-rangeSlider-handle-inner"></div>
                        </div>
                        <div class="ui-rangeSlider-handle ui-rangeSlider-rightHandle" style="position: absolute; top: 0px; left: 718.5px;">
                            <div class="ui-rangeSlider-handle-inner"></div>
                        </div>
                    </div>
                    <div class="ui-rangeSlider-arrow ui-rangeSlider-leftArrow" style="position: absolute; left: 0px;">
                        <div class="ui-rangeSlider-arrow-inner"></div>
                    </div
                        ><div class="ui-rangeSlider-arrow ui-rangeSlider-rightArrow" style="position: absolute; right: 0px;">
                        <div class="ui-rangeSlider-arrow-inner"></div>
                    </div>
                    <div class="ui-rangeSlider-label ui-rangeSlider-leftLabel" style="position: absolute; display: block; right: 1148.59375px;">
                        <div class="ui-rangeSlider-label-value">
                            <input type="text" class="ui-editRangeSlider-inputValue" name="left">
                        </div>
                        <div class="ui-rangeSlider-label-inner"></div>
                    </div>
                    <div class="ui-rangeSlider-label ui-rangeSlider-rightLabel" style="position: absolute; display: block; right: 721.5px;">
                        <div class="ui-rangeSlider-label-value">
                            <input type="text" class="ui-editRangeSlider-inputValue" name="right">
                        </div>
                        <div class="ui-rangeSlider-label-inner">

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- About Section
================================================== -->



        <h1>Event Calendar</h1>

            <div id="calendar">
                <iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=4nnliefqr3s0deahkgl4rnta1o%40group.calendar.google.com&amp;color=%23875509&amp;ctz=America%2FChicago" style=" border-width:0 " width="900" height="600" frameborder="0" scrolling="no"></iframe>
            </div>







<?php include 'footer.php'; ?>

