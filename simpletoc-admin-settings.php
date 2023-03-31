<?php 

// Add SimpleTOC global settings page
function simpletoc_add_settings_page() {
    add_options_page(
        __('SimpleTOC Settings', 'simpletoc'),
        __('SimpleTOC', 'simpletoc'),
        'manage_options',
        'simpletoc',
        'simpletoc_settings_page'
    );
}
add_action('admin_menu', 'simpletoc_add_settings_page');

// SimpleTOC settings page content
function simpletoc_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    ?>
    <div class="wrap">
        <h1><?php _e('SimpleTOC Global Settings', 'simpletoc'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('simpletoc_settings');
            do_settings_sections('simpletoc');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register SimpleTOC settings
function simpletoc_register_settings() {
    $wrapper_enabled_filter = apply_filters('simpletoc_wrapper_enabled', null);
    $accordion_enabled_filter = apply_filters('simpletoc_accordion_enabled', null);

    if ($wrapper_enabled_filter === null) {
        register_setting('simpletoc_settings', 'simpletoc_wrapper_enabled');
    }

    if ($accordion_enabled_filter === null) {
        register_setting('simpletoc_settings', 'simpletoc_accordion_enabled');
    }

    add_settings_section(
        'simpletoc_wrapper_section',
        __('Global settings', 'simpletoc'),
        'simpletoc_wrapper_section_callback',
        'simpletoc'
    );

    add_settings_field(
        'simpletoc_wrapper_enabled',
        __('Wrapper div', 'simpletoc'),
        'simpletoc_wrapper_enabled_callback',
        'simpletoc',
        'simpletoc_wrapper_section'
    );

    add_settings_field(
        'simpletoc_accordion_enabled',
        __('Accordion', 'simpletoc'),
        'simpletoc_accordion_enabled_callback',
        'simpletoc',
        'simpletoc_wrapper_section'
    );
}

add_action('admin_init', 'simpletoc_register_settings');

function simpletoc_wrapper_section_callback() {
    $wrapper_enabled_filter = apply_filters('simpletoc_wrapper_enabled', null);
    $accordion_enabled_filter = apply_filters('simpletoc_accordion_enabled', null);

    echo '<p>' . __('Enforce these settings globally, ignoring any block-level configurations.', 'simpletoc') . '</p>';
}

function simpletoc_wrapper_enabled_callback() {
    $wrapper_enabled = get_option('simpletoc_wrapper_enabled', false);

    if (has_filter('simpletoc_wrapper_enabled')) {
        echo '<input type="checkbox" name="simpletoc_wrapper_enabled" id="simpletoc_wrapper_enabled" value="1" checked="checked" disabled="disabled" />';
        echo '<label for="simpletoc_wrapper_enabled" class="description">' . __('Setting controlled by "simpletoc_wrapper_enabled" filter. Remove filter to adjust setting.', 'simpletoc') . '</label>';
    } else {
        echo '<input type="checkbox" name="simpletoc_wrapper_enabled" id="simpletoc_wrapper_enabled" value="1" ' . checked(1, $wrapper_enabled, false) . ' />';
        echo '<label for="simpletoc_wrapper_enabled" class="description">' . __('Additionally adds the role "navigation" and ARIA attributes.', 'simpletoc') . '</label>';
    }
}

function simpletoc_accordion_enabled_callback() {
    $accordion_enabled = get_option('simpletoc_accordion_enabled', false);

    if (has_filter('simpletoc_accordion_enabled')) {
        echo '<input type="checkbox" name="simpletoc_accordion_enabled" id="simpletoc_accordion_enabled" value="1" checked="checked" disabled="disabled" />';
        echo '<label for="simpletoc_accordion_enabled" class="description">' . __('Setting controlled by "simpletoc_accordion_enabled" filter. Remove filter to adjust setting.', 'simpletoc') . '</label>';
    } else {
        echo '<input type="checkbox" name="simpletoc_accordion_enabled" id="simpletoc_accordion_enabled" value="1" ' . checked(1, $accordion_enabled, false) . ' />';
        echo '<label for="simpletoc_accordion_enabled" class="description">' . __('Enables the accordion feature for all SimpleTOC blocks.', 'simpletoc') . '</label>';
    }
}
