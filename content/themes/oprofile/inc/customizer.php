<?php
// Customizer du thème oProfile

function oprofile_customize_register( $wp_customize )
{
    
    $wp_customize->add_panel(
        'oprofile_theme_configuration',
        [
            'title'    => 'Configuration du thème oProfile',
            'priority' => 1
        ]
    );

    // Footer section
    $wp_customize->add_section(
        'oprofile_footer',
        [
            'panel' => 'oprofile_theme_configuration',
            'title' => 'Footer'
        ]
    );

    $wp_customize->add_setting( 'oprofile_footer_active' );

    $wp_customize->add_control(
        'oprofile_footer_active',
        [
            'section' => 'oprofile_footer',
            'type'    => 'checkbox',
            'label'   => 'Activer le footer'
        ]
    );

    $oprofile_footer_background_color_options = [];

    if ( defined( 'OPROFILE_THEME_FOOTER_DEFAULT_BACKGROUND_COLOR' ) ) {
        $oprofile_footer_background_color_options['default'] = OPROFILE_THEME_FOOTER_DEFAULT_BACKGROUND_COLOR;
    }

    $wp_customize->add_setting(
        'oprofile_footer_background_color',
        $oprofile_footer_background_color_options
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'oprofile_footer_background_color',
            [
                'section' => 'oprofile_footer',
                'label'   => 'Couleur de fond',
                // 'mode' => 'hue',
            ]
        )
    );

    $oprofile_footer_form_input_background_color_options = [];

    if ( defined( 'OPROFILE_THEME_FOOTER_DEFAULT_FORM_INPUT_BACKGROUND_COLOR' ) ) {
        $oprofile_footer_form_input_background_color_options['default'] = OPROFILE_THEME_FOOTER_DEFAULT_FORM_INPUT_BACKGROUND_COLOR;
    }

    $wp_customize->add_setting(
        'oprofile_footer_form_input_background_color',
        $oprofile_footer_form_input_background_color_options
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'oprofile_footer_form_input_background_color',
            [
                'section' => 'oprofile_footer',
                'label'   => 'Couleur de fond des champs du formulaire'
            ]
        )
    );

    $wp_customize->add_setting(
        'oprofile_footer_contact_email',
        [
            'default' => 'kaplan@oprofile.local',
            'sanitize_callback' => 'oprofile_sanitize_email',
            // 'validate_callback' => 'oprofile_validate_email'
        ]
    );

    $wp_customize->add_control(
        'oprofile_footer_contact_email',
        [
            'section' => 'oprofile_footer',
            'type'    => 'email',
            'label'   => 'Adresse e-mail de contact'
        ]
    );


    // Homepage section
    $wp_customize->add_section(
        'oprofile_homepage',
        [
            'panel' => 'oprofile_theme_configuration',
            'title' => 'Page d\'accueil'
        ]
    );

    $wp_customize->add_setting(
        'oprofile_homepage_last_posts_count',
        [
            'default' => 6
        ]
    );

    $wp_customize->add_control(
        'oprofile_homepage_last_posts_count',
        [
            'section' => 'oprofile_homepage',
            'label'   => 'Nombre d\'articles de blog',
            'type'    => 'number',
            'input_attrs' => [
                'min'  => 2,
                'max'  => 12,
                'step' => 2
            ]
        ]
    );

    $wp_customize->add_setting( 'oprofile_homepage_intermediate_page' );

    $wp_customize->add_control(
        'oprofile_homepage_intermediate_page',
        [
            'section'     => 'oprofile_homepage',
            'type'        => 'dropdown-pages',
            'label'       => 'Page intermédiaire',
            'description' => 'Le contenu à afficher entre les derniers articles et les compétences'
        ]
    );
}
add_action( 'customize_register', 'oprofile_customize_register' );


function oprofile_validate_email( $validity, $value ) {
    $email = trim( $value );

    if ( ! empty( $email ) ) {
        if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            $validity->add(
                'invalid_email',
                'L\'adresse e-mail n\'est pas valide'
            );
        }
    }

    return $validity;
}

function oprofile_sanitize_email( $value ) {
    return filter_var( $value, FILTER_SANITIZE_EMAIL );
}
