<?php

class Post_Type_Skill
{
    const NAME = 'skill';

    // Appel de la méthode register_post_type à l'exécution du hook init
    public function __construct()
    {
        add_action(
            'init',
            [ $this, 'register_post_type' ]
        );
    }

    // Construction du post type 'skill'
    public function register_post_type()
    {
        register_post_type(
            self::NAME,
            [
                'labels' => [
                    'name'               => 'Compétences',
                    'singular_name'      => 'Compétence',
                    'add_new_item'       => 'Ajouter une nouvelle compétence',
                    'edit_item'          => 'Editer la compétence',
                    'new_item'           => 'Nouvelle compétence',
                    'view_item'          => 'Voir la compétence',
                    'view_items'         => 'Voir les compétences',
                    'search_items'       => 'Rechercher des compétences',
                    'not_found'          => 'Aucune compétence trouvée',
                    'not_found_in_trash' => 'Aucune compétence trouvée dans la corbeille',
                    'all_items'          => 'Toutes les compétences',
                    'archives'           => 'Archives des compétences'
                ],
                'public'        => false,
                'show_ui'       => true,
                'hierarchical'  => false,
                'menu_position' => 26,
                'menu_icon'     => 'dashicons-awards',
                'supports'      => [
                    'title',
                    'editor',
                    'custom-fields',
                    'page-attributes'
                ],
                'has_archive'  => false,
                'can_export'   => true,
                'show_in_rest' => true
            ]
        );
    }
}
