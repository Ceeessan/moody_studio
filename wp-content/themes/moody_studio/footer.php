<footer>
<?php wp_footer(); ?>

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

        <div class="shopping-container">
            <span>
                <h3 class="shopping-text">SHOPPING</h3>
                <?php
                $menu = array(
                    'theme_location' => 'footer_shopping',
                    'menu_id' => 'footer_shopping',
                    'container' => 'nav',
                    'container_class' => 'menu'
                );
                wp_nav_menu($menu);
                ?>
            </span>
        </div>

        <div class="more-container">
            <span>
                <h3 class="more-text">MORE LINK</h3>
                <?php
                $menu = array(
                    'theme_location' => 'footer_more',
                    'menu_id' => 'footer_more',
                    'container' => 'nav',
                    'container_class' => 'menu'
                );
                wp_nav_menu($menu);
                ?>
            </span>
        </div>

        <div class=blog-container>
            <span>
                <h3 class=blog-text> FROM THE BLOG</h3>
                <?php
                $menu = array(
                    'theme_location' => 'footer_blog',
                    'menu_id' => 'footer_blog',
                    'container' => 'nav',
                    'container_class' => 'menu'
                );
                wp_nav_menu($menu);
                ?>

<div class="date-container">
<div class="today1">
<?php
// Dagens datum
$today_day = date('j');
echo $today_day;
?>
</div>

<div class="month1">
<?php
// Dagens månad
$today_month = date('F');
echo $today_month;
?>
</div>
</div>
<p class="blog-text"><?php echo get_option('blog_message'); ?></p>
<p class="comments1"> 3 comments </p>



<div class="date-container">
<div class="today2">
<?php
// Morgondagens datum
$tomorrow_date = date('j', strtotime('+1 day'));
echo $tomorrow_date;
?>
</div>

<div class="month2">
<?php
// Morgondagens månad
$tomorrow_month = date('F', strtotime('+1 day'));
echo $tomorrow_month;
?>
</div>
</div>
<p class="blog-text"><?php echo get_option('blog_message'); ?></p>
<p class="comments2"> 3 comments </p>





            </span>
        </div>
</div>

<div class="copyright-container">
<p class="copyright-text"><?php echo get_option('copyright_message'); ?> </p>
</div>

</section>




</footer>


</body>
</html>