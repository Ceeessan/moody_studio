<?php
//Om du inte är på admin-sidan, körs inte koden
if(is_admin() == false){
    return;
}
// Lägger till menyalternativet "Butik" i dashboard under "Settings"
function moody_studio_add_settings(){
    add_submenu_page(
        'options-general.php',
        "Butik",
        "Butik",
        "edit_pages",
        "butik",
        "moody_studio_add_settings_callback"
    );
}

function moody_studio_add_settings_callback(){
    ?>
        <div class="wrap">
            <h2>Footerinställningar</h2>
            <form action="options.php" method="post">
                <?php
                    settings_fields("butik");
                    do_settings_sections("butik");
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}

add_action('admin_menu', 'moody_studio_add_settings');

// Registrerar inställningar tillgängliga på sidan "Butik"
function moody_studio_add_settings_init(){
    add_settings_section(
        "butik_general",
        "General",
        "moody_studio_add_settings_section_general",
        "butik"
    );
    register_setting(       
        "butik",
        "store_message"
    );
    add_settings_field(
        "store_message",
        "Store Message",
        "moody_studio_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_message",
            "option_type" => "text"
        )
    );

    register_setting(
        "butik",
        "store_address"
    );
    add_settings_field(
        "store_address",
        "Store Address",
        "moody_studio_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_address",
            "option_type" => "text"
        )
        );
        register_setting(
            "butik",
            "store_phonenumber"
        );
        add_settings_field(
            "store_phonenumber",
            "Store Phonenumber",
            "moody_studio_section_setting",
            "butik",
            "butik_general",
            array(
                "option_name" => "store_phonenumber",
                "option_type" => "text"
            )
            );
            register_setting(
                "butik",
                "store_contact"
            );
            add_settings_field(
                "store_contact",
                "Store Contact",
                "moody_studio_section_setting",
                "butik",
                "butik_general",
                array(
                    "option_name" => "store_contact",
                    "option_type" => "text"
                )
                );
                register_setting(
                    "butik",
                    "blog_message"
                );
                add_settings_field(
                    "blog_message",
                    "Blog Message",
                    "moody_studio_section_setting",
                    "butik",
                    "butik_general",
                    array(
                        "option_name" => "blog_message",
                        "option_type" => "text"
                    )
                    );
                register_setting(
                    "butik",
                    "blog_message"
                );
                add_settings_field(
                    "copyright_message",
                    "Copyright Message",
                    "moody_studio_section_setting",
                    "butik",
                    "butik_general",
                    array(
                        "option_name" => "copyright_message",
                        "option_type" => "text"
                    )
                    );
          
     // Lägger till inställningar för rea-bannern
     add_settings_section(
        "butik_sale_banner",
        "Sale Banner",
        "moody_studio_add_sale_banner_section",
        "butik"
    );
    register_setting(
        "butik",
        "sale_banner_message"
    );
    register_setting(
        "butik",
        "display_sale_banner"
    );
    add_settings_field(
        "sale_banner_message",
        "Sale Banner Message",
        "moody_studio_section_setting",
        "butik",
        "butik_sale_banner",
        array(
            "option_name" => "sale_banner_message",
            "option_type" => "text"
        )
    );
    add_settings_field(
        "display_sale_banner",
        "Display Sale Banner",
        "moody_studio_display_sale_banner_setting",
        "butik",
        "butik_sale_banner"
    );
}


add_action('admin_init', 'moody_studio_add_settings_init');







// Ritar ut sektionen "general" beskrivning
function moody_studio_add_settings_section_general(){
    echo "<p>Generella inställningar för butiken</p>";
}

//Ritar ut inställningsfält
function moody_studio_section_setting($args){
    $option_name = $args["option_name"];
    $option_type = $args["option_type"];
    $option_value = get_option($args["option_name"]);
    echo '<input type="' . $option_type . '" id="' . $option_name . '" name="' . $option_name . '"    value="'. $option_value .'"/>';
}


// Ritar ut sektionen för rea-bannern
function moody_studio_add_sale_banner_section(){
    echo "<p>Inställningar för rea-bannern</p>";
}

// Ritar ut inställningsfältet för att välja om rea-bannern ska visas eller inte
function moody_studio_display_sale_banner_setting(){
    $option_name = "display_sale_banner";
    $option_value = get_option($option_name);
    echo '<input type="checkbox" id="' . $option_name . '" name="' . $option_name . '" value="1" ' . checked(1, $option_value, false) . '/>';
}