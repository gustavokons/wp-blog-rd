<?php

function display_tagmanager_element() { ?>
    <input type="text" name="tag_manager" id="tag_manager" value="<?php echo get_option('tag_manager'); ?>" /> <?php
}

function display_token_rd_element() { ?>
    <input type="text" name="token_rd" id="token_rd" value="<?php echo get_option('token_rd'); ?>" /> <?php
}

function display_token_rd_latam_element() { ?>
    <input type="text" name="token_rd_latam" id="token_rd_latam" value="<?php echo get_option('token_rd_latam'); ?>" /> <?php
}

function display_theme_panel_fields() {
    add_settings_section('section', 'Configurações Gerais', null, 'theme-options');

    add_settings_field('tag_manager', 'Tag Manager ID', 'display_tagmanager_element', 'theme-options', 'section');
    add_settings_field('token_rd', 'Token RD Station', 'display_token_rd_element', 'theme-options', 'section');
    add_settings_field('token_rd_latam', 'Token RD Station Conta LATAM', 'display_token_rd_latam_element', 'theme-options', 'section');

    register_setting('section', 'tag_manager');
    register_setting('section', 'token_rd');
    register_setting('section', 'token_rd_latam');
}
add_action('admin_init', 'display_theme_panel_fields');

function theme_settings_page() { ?>
    <div class="wrap">
        <h1>Configuração do tema</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('section');
                do_settings_sections('theme-options');
                submit_button();
            ?>
        </form>
    </div> <?php
}

function add_theme_menu_item() {
    add_menu_page('Configuração do tema', 'Configuração do tema', 'manage_options', 'theme-panel', 'theme_settings_page', null, 99);
}
add_action('admin_menu', 'add_theme_menu_item');
