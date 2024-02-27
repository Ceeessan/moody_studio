<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>
    <?php wp_body_open(); ?>
    <header>
        <div class="top-menu">
            <div>
                <a href="/"><span class="logo">MOODY STUDIO</span></a>
            </div>
            <div>
                <?php
                $header_menu = array(
                    'theme_location' => 'main_menu',
                    'menu_id' => 'main-menu', 
                    'container' => 'nav',
                    'container_class' => 'primary-menu-container',
                );
                wp_nav_menu($header_menu);
                ?>
            </div>
        </div>

        <div class="content-menu">
            <?php
            $header_menu = array(
                'theme_location' => 'primary_menu', 
                'menu_id' => 'primary-menu',
                'container' => 'nav',
                'container_class' => 'primary-menu-container', 
            );
            wp_nav_menu($header_menu);
            ?>
        </div>
    </header>



