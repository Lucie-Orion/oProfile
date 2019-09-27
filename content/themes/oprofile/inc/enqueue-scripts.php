<?php

function oprofile_enqueue_styles() {
    wp_enqueue_style(
        'oprofile-style',
        get_theme_file_uri( 'public/css/style.css' )
    );

    $customizer_inline_css = '';

    $footer_background_color = get_theme_mod(
        'oprofile_footer_background_color'
    );

    if ( ! empty( $footer_background_color ) ) {
        $customizer_inline_css .= '
            .footer {
                background-color: ' . $footer_background_color . ';
            }
        ';
    }

    $footer_form_input_background_color = get_theme_mod(
        'oprofile_footer_form_input_background_color'
    );

    if ( ! empty( $footer_form_input_background_color ) ) {
        $customizer_inline_css .= '
            .footer .form__fieldset .field__input {
                background-color: ' . $footer_form_input_background_color . ';
            }
        ';
    }

    wp_add_inline_style(
        'oprofile-style',
        $customizer_inline_css
    );
}

add_action( 'wp_enqueue_scripts', 'oprofile_enqueue_styles' );

function oprofile_enqueue_scripts() {
    wp_enqueue_script(
        'oprofile-script',
        get_theme_file_uri( 'public/js/app.js' ),
        [],
        false,
        true
    );
}

add_action( 'wp_enqueue_scripts', 'oprofile_enqueue_scripts' );
