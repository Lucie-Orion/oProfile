<?php
/*
Plugin Name: oRedirectTo
Author: Lucie Gibert Merino
Author URI: https://github.com/O-clock-Orion
Version: 1.0.0
Description: Un plugin de redirection de contenus pour le classic editor de WordPress
*/

// Sécurity to verify if we are in WordPress
if ( ! defined( 'WPINC' ) ) {
    http_response_code( 404 );
    exit;
}

// Verify if the url is valid
add_filter(
    'acf/validate_value/name=redirect_url',
    'oredirectto_validate_url',
    5, // Priority (the lower it is, the sooner the treatment will be done)
    4 // The number of parameters that the callback function handles
);

function oredirectto_validate_url($valid, $value, $field, $input) {
    if (
        ! $valid
        || empty( $value )
    ) { // If the value is already considered invalid or empty, we do not check
        return $valid;
    }

    // If the URL is not valid, send error message
    if ( ! filter_var( $value, FILTER_VALIDATE_URL ) ) {
        $valid = 'L\'URL de redirection n\'est pas une URL valide';
    }

    return $valid;
}

// Verify if the permalink is valid end isn't the same that the current post
add_filter(
    'acf/validate_value/name=redirect_url',
    'oredirectto_validate_redirect_url',
    10,
    4
);

function oredirectto_validate_redirect_url($valid, $value, $field, $input) {
    if (
        ! $valid
        || empty( $value )
    ) {
        return $valid;
    }

    if ( ! empty( $_POST['post_ID'] ) ) {
        // I retrieve the permalink from the article I'm editing
        $current_url = get_permalink( $_POST['post_ID'] ); 

        if ( $current_url === $value ) {
            // The redirect URL is the same as the permalink of our content => error message
            $valid = 'L\'URL de redirection ne peut pas être identique au permalien de l\'article';
        }
    }

    return $valid;
}

/*
TO DO :
Bug de validation des données avec ACF en utilisant Gutenberg : faire une recherche !!!
*/

// Make the redirection with ACF's field
add_action( 'template_redirect', 'oredirectto_redirect' );

function oredirectto_redirect() {
    if ( is_single() ) { // I check that I am on a page of a blog post
        $redirect_url = get_field( 'redirect_url' ); // I retrieve the redirection URL

        /*
        // Without ACF :
        $redirect_url = get_post_meta(
            get_the_ID(),
            'redirect_url',
            true
        );
        */


        if ( ! empty( $redirect_url ) ) { // I test if the URL is not empty
            wp_redirect( $redirect_url ); // I redirect
        }
    }
}
