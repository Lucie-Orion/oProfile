<?php

class Post_Type_Project
{
    const NAME = 'project';
    const TYPE_TAXONOMY_NAME = 'project_type';
    const TECHNOLOGY_TAXONOMY_NAME = 'project_technology';

    // Appel des méthodes register_post_type et register_taxonomies à l'exécution du hook init
    public function __construct()
    {
        add_action(
            'init',
            [ $this, 'register_post_type' ]
        );

        add_action(
            'init',
            [ $this, 'register_taxonomies' ]
        );
    }

    // Construction du post type 'project'
    public function register_post_type()
    {
        register_post_type(
            self::NAME,
            [
                'labels' => [
                    'name'               => 'Projets',
                    'singular_name'      => 'Projet',
                    'add_new_item'       => 'Ajouter un nouveau projet',
                    'edit_item'          => 'Editer le projet',
                    'new_item'           => 'Nouveau projet',
                    'view_item'          => 'Voir le projet',
                    'view_items'         => 'Voir les projets',
                    'search_items'       => 'Rechercher des projets',
                    'not_found'          => 'Aucun projet trouvé',
                    'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille',
                    'all_items'          => 'Tous les projets',
                    'archives'           => 'Archives des projets'
                ],
                'public'        => true,
                'hierarchical'  => true,
                'menu_position' => 4,
                'menu_icon'     => 'dashicons-portfolio',
                'supports'      => [
                    'title',
                    'editor',
                    'author',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                    'page-attributes'
                ],
                'has_archive'  => true,
                'can_export'   => true,
                'show_in_rest' => true,
            ]
        );
    }

    // Construction des taxonomies 'Types' et 'Technologies' pour le Post type 'project'
    public function register_taxonomies()
    {
        register_taxonomy(
            self::TYPE_TAXONOMY_NAME,
            self::NAME,
            [
                'labels' => [
                    'name'                       => 'Types',
                    'singular_name'              => 'Type',
                    'all_items'                  => 'Tous les types',
                    'edit_item'                  => 'Editer un type',
                    'view_item'                  => 'Voir un type',
                    'update_item'                => 'Mise à jour d\'un type',
                    'add_new_item'               => 'Ajouter un nouveau type',
                    'new_item_name'              => 'Nom du nouveau type',
                    'search_items'               => 'Rechercher des types',
                    'popular_items'              => 'Types populaires',
                    'separate_items_with_commas' => 'Séparer les types avec une virgule',
                    'add_or_remove_items'        => 'Ajouter ou supprimer un type',
                    'choose_from_most_used'      => 'Choisir un type parmi les plus utilisés',
                    'not_found'                  => 'Aucun type trouvé',
                    'back_to_items'              => 'Retour aux types',
                    'parent_item'                => 'Type parent',
                    'parent_item_colon'          => 'Type parent :',
                ],
                'public'       => true,
                'hierarchical' => true,
                'show_in_rest' => true,
            ]
        );

        register_taxonomy(
            self::TECHNOLOGY_TAXONOMY_NAME,
            self::NAME,
            [
                'labels' => [
                    'name'                       => 'Technologies',
                    'singular_name'              => 'Technologie',
                    'all_items'                  => 'Toutes les technologies',
                    'edit_item'                  => 'Editer une technologie',
                    'view_item'                  => 'Voir une technologie',
                    'update_item'                => 'Mise à jour d\'une technologie',
                    'add_new_item'               => 'Ajouter une nouvelle technologie',
                    'new_item_name'              => 'Nom de la nouvelle technologie',
                    'search_items'               => 'Rechercher des technologies',
                    'popular_items'              => 'Technologies populaires',
                    'separate_items_with_commas' => 'Séparer les technologies avec une virgule',
                    'add_or_remove_items'        => 'Ajouter ou supprimer une technologie',
                    'choose_from_most_used'      => 'Choisir une technologie parmi les plus utilisées',
                    'not_found'                  => 'Aucune technologie trouvée',
                    'back_to_items'              => 'Retour aux technologies'
                ],
                'public'       => true,
                'show_in_rest' => true,
                'hierarchical' => false
            ]
        );
    }
}
