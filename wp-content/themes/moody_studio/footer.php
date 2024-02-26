<footer>


<section>

<div class="footer-container">
<div class="urban-container">
            <span> 
                <h3 class="urban-text">URBAN OUTFITTERS</h3>
                
            <div class="settings-text">

                <p class="lorem-ipsum-text"><?php echo get_option('store_message'); ?></p>

                <p class="address-text"><?php echo get_option('store_address'); ?></p>

                <p class="phonenumber-text"><?php echo get_option('store_phonenumber'); ?></p>

                <p class="contact-text"><?php echo get_option('store_contact'); ?></p>
            </div>

            <div class="icons">
            <?php
                $menu = array(
                    'theme_location' => 'footer_urban',
                    'menu_id' => 'footer_urban',
                    'container' => 'nav',
                    'container_class' => 'menu'
                );
                wp_nav_menu($menu);
                ?>
            </div>
     
            </span>
        </div>

</div>
</section>


<?php wp_footer(); ?>

</footer>


</body>
</html>