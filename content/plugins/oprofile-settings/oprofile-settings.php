<?php
/*
Plugin Name: oProfile Settings
Author: Lucie-Orion
Author URI: https://github.com/Lucie-Orion
Version: 1.0.0
Description: Le plugin de configuration du site oProfile qui crée les CPT (Custom Post Type) et les Custom Taxonomies
*/

// Sécurisation du plugin
if ( ! defined( 'WPINC' ) ) {
    http_response_code( 404 );
    exit;
}

// Chemin d'accès vers le plugin '__FILE__' (= nom du plugin) et ses fichiers
$plugin_dir_path = plugin_dir_path( __FILE__ );

require $plugin_dir_path . 'includes/class-post-type-project.php';
require $plugin_dir_path . 'includes/class-post-type-skill.php';
require $plugin_dir_path . 'includes/shortcodes.php';

// Instanciation de la classe Post_Type_Project et de la classe Post_Type_Skill
$post_type_project = new Post_Type_Project;
$post_type_skill   = new Post_Type_Skill;

// Activation du plugin
register_activation_hook(
    __FILE__,
    function() use ( $post_type_project, $post_type_skill ) {
        $post_type_project->register_post_type(); 
        $post_type_project->register_taxonomies();
        $post_type_skill->register_post_type();

        flush_rewrite_rules( false );
    }
);

// Désactivation du plugin
register_deactivation_hook(
    __FILE__,
    'oprofile_settings_deactivation'
);

function oprofile_settings_deactivation() {
    unregister_post_type( Post_Type_Project::NAME );
    unregister_taxonomy( Post_Type_Project::TYPE_TAXONOMY_NAME );
    unregister_taxonomy( Post_Type_Project::TECHNOLOGY_TAXONOMY_NAME );
    unregister_post_type( Post_Type_Skill::NAME );

    flush_rewrite_rules( false );
}
