<?php
/*
Template Name: Home
@package Khana
 */

get_header();?>

 <main>

        <div id="map"></div>

        <div class="selectedres">
            <div class="resta">

                <div class="resimg">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/restimg.jpg">
                </div>

                <div class="rescont">
                    <h1 class="title">Restaurant Name</h1>
                    
                    <div class="mdc-layout-grid max-width left-align">
                        <div class="cuisine mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                            <div class="subtit">Cuisine</div>
                            <div class="subval">italian</div>
                        </div>
                        <div class="hours mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                            <div class="subtit">Hours</div>
                            <div class="subval">12pm - 11pm</div>
                        </div>
                    </div>
                    <div class="mdc-layout-grid max-width left-align">
                        <div class="distance mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                            <div class="subtit2">
                                <i class="material-icons">&#xE8B4;</i> 0.8 km
                            </div>
                        </div>
                        <div class="moreinfo mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                            <div class="subtit2">
                                <a href="#">More info<i class="material-icons morearrow">&#xE5CC;</i></a>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>

        </div>

    </main>

<?php
get_footer();