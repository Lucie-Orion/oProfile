<?php

get_header( 'front-page' );

// Custom post type "skill" sur la page d'accueil
if (
    class_exists( 'Post_Type_Skill' )
    && post_type_exists( Post_Type_Skill::NAME )
) :
    $skills_query = new WP_Query([
        'post_type'      => Post_Type_Skill::NAME,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'posts_per_page' => -1
    ]);

    if ( $skills_query->have_posts() ) :
    ?>
    <section class="skills" id="skills">
        <?php
        while ( $skills_query->have_posts() ) :
            $skills_query->the_post();
        ?>
            <div class="skill">
                <h3 class="skill__title"><?php the_title(); ?></h3>
                <p class="skill__description"><?php the_content(); ?></p>
                <i
                    class="skill__icon fa fa-<?= the_field( 'icon' ); ?>"
                    style="
                        background-color: <?php the_field( 'icon_background_color' ); ?>;
                        color: <?php the_field( 'icon_color' ); ?>;"
                ></i>
            </div>
        <?php
        endwhile;

        wp_reset_postdata();
        ?>
    </section>
    <?php
    endif;
endif;

// Articles du blog mis en avant sur la page d'acceuil
$last_posts_count = get_theme_mod(
    'oprofile_homepage_last_posts_count',
    6
);
$last_posts_query = new WP_Query([
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => $last_posts_count
]);

if ( $last_posts_query->have_posts() ) :
?>
<main class="main">
    <?php
    while ( $last_posts_query->have_posts() ) :
        $last_posts_query->the_post();
        get_template_part( 'template-parts/content/post' );
    endwhile;

    wp_reset_postdata();
    ?>
</main>
<?php
endif;

// Affichage d'une page sur la page d'accueil entre les articles et les skills
$intermediate_page_id = get_theme_mod( 'oprofile_homepage_intermediate_page' );

$intermediate_page = get_post( $intermediate_page_id );

if ( ! empty( $intermediate_page ) ) {

    setup_postdata( $intermediate_page );
    ?>
        <div class="intermediate-page"><?php the_content(); ?></div>
        
    <?php
    wp_reset_postdata();
}

get_footer();