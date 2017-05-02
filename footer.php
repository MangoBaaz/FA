<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Khana
 */

?>

<footer class="bun">

        <div class="bbar mdc-layout-grid max-width">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                <button class="mdc-button"><i class="material-icons active">near_me</i>Nearby</button>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                <button id="default-dialog-activation" class="mdc-button"><i class="material-icons">tune</i>Filters</button>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                <button class="mdc-button"><i class="material-icons">chrome_reader_mode</i>Guides</button>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                <button class="mdc-button"><i class="material-icons">whatshot</i>Trending</button>
            </div>
        </div>

</footer>

<aside id="mdc-dialog-default"
          style="visibility:hidden;"
    	  class="mdc-dialog"
    	  role="alertdialog"
    	  aria-hidden="true"
    	  aria-labelledby="mdc-dialog-default-label"
    	  aria-describedby="mdc-dialog-default-description">
    	  <div class="mdc-dialog__surface">
    	    
    	    <section id="mdc-dialog-default-description" class="mdc-dialog__body">
    	      
              <div class="filters">

            <section>
                <h3>Location</h3>

                <span>Use Current Location</span>

                <select class="mdc-select mdc-elevation--z1">
                    <option value="" default selected>Select City</option>
                    <option value="Karachi">Karachi</option>
                    <option value="Lahore">Lahore</option>
                    <option value="Islamabad">Islamabad</option>
                </select>

            </section>

            <section>
                <h3>Cuisine</h3>

                <span class="chip">chinese</span>
                <span class="chip">pizza</span>
                <span class="chip">seafood</span>
                <span class="chip">Pakistani</span>
                <span class="chip">fastfood</span>
                <span class="chip">bar bq</span>
                 <span class="chip">italian</span>
                <span class="chip">cafe/bakery</span>

            </section>

            <section>
                <h3>Other</h3>

                <label class="label--checkbox">
                    <input type="checkbox" class="checkbox">
                        Valet Parking
                </label>

                <label class="label--checkbox">
                    <input type="checkbox" class="checkbox">
                        Is Open
                </label>

                <label class="label--checkbox">
                    <input type="checkbox" class="checkbox">
                        Free Wifi
                </label>

                <label class="label--checkbox">
                    <input type="checkbox" class="checkbox">
                        Smoking
                </label>

            </section>

            <section class="center">
                <button class="mdc-button mdc-button--raised mdc-button--primary">Apply Filters</button>
            </section>

        </div>

    	    </section>

    	  </div>
    	  <div class="mdc-dialog__backdrop"></div>
    	</aside>

<script type="text/javascript" src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<script defer async type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANeFQfT-GthfUyUg1XqZdhdJiZJr0_dIA"></script>
<script defer async type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/key.js"></script>
<?php wp_footer(); ?>
</body>
</html>
