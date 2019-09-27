<?php

// Création d'un shortcode link
if ( ! function_exists( 'oprofile_shortcode_link' ) ) {
    function oprofile_shortcode_link( $atts, $content = '' ) {

        $atts = shortcode_atts(
            [
                'url'   => 'https://github.com/Lucie-Orion',
                'class' => 'button',
                'type'  => 'new-tab'
            ],
            $atts
        );

        if ( ! filter_var( $atts['url'], FILTER_VALIDATE_URL ) ) {
            return '<span style="color: red;">L\'URL du shortcode n\'est pas valide</span>';
        }

        $target_attr = '';

        if ( isset( $atts['type'] ) ) {
            switch ( $atts['type'] ) {
                case 'new-tab':
                    $target_attr = '_blank';
                    break;
                case 'current-page':
                    $target_attr = '_self';
                    break;
                default:
                    return '<span style="color: red;">Le type du shortcode n\'est pas valide. Valeurs possibles : new-tab, current-page</span>';
            }
        }

        if ( empty( $content ) ) {
            $content = 'Lien';
        }

        return '<a class="' . $atts['class'] . '" target="' . $target_attr .  '" href="' . $atts['url'] . '">' . $content . '</a>';
    }
}

add_shortcode( 'link', 'oprofile_shortcode_link' );
