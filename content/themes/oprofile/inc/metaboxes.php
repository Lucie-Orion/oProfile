<?php

// Metaboxe
// Attention : décommenter le lien dans le fichier functions.php pour l'activer

function oprofile_skill_icon_metabox( $post_type, $post ) {
    if (
        
        class_exists( 'Post_Type_Skill' )
        && post_type_exists( Post_Type_Skill::NAME )
    )
     {

        add_meta_box(
            'oprofile_skill_icon',      // Unique ID
            'Configuration de l\'icône',// Box title
            'oprofile_skill_icon_html', // Content callback, must be of type callable
            null,                       // Post type
            'side'                      // Context (box position)
        );
        add_action( 'admin_enqueue_scripts', 'enqueue_font_awesome_style' );
    }
}
add_action('add_meta_boxes', 'oprofile_skill_icon_metabox', 10, 2);
function enqueue_font_awesome_style() {
    wp_enqueue_style(
        'font-awesome',
        'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
    );
}

function oprofile_skill_icon_html( $post ) {
    $selected_icon_name = get_post_meta($post->ID, 'icon', true);
    $icon_list = [
        'arrow-right',
        'bullhorn',
        'code',
        'graduation-cap',
        'heart',
        'user'
    ];
?>
    <label for="oprofile_icon_name_field">Icône</label>
    <select name="oprofile_icon_name_field" id="oprofile_icon_name_field" class="postbox">
        <option disabled selected style="display: none;">Sélectioner une icône</option>
        <?php foreach ( $icon_list as $icon_name ) : ?>
        <option
            value="<?= $icon_name; ?>"
            <?php if ( $icon_name === $selected_icon_name ) : ?>
            selected
            <?php endif; ?>
        ><?= $icon_name; ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function oprofile_save_skill_icon( $post_id )
{
    if (array_key_exists('oprofile_icon_name_field', $_POST)) {
        update_post_meta(
            $post_id,
            'icon',
            $_POST['oprofile_icon_name_field']
        );
    }
}
add_action( 'save_post', 'oprofile_save_skill_icon' );