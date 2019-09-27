<aside class="sidebar">

    <?php
    // J'affiche les widgets associés à ma sidebar qui a pour id primary
    dynamic_sidebar( 'primary' );

    $category_1_wp_query = new WP_Query([
        'category_name' => 'categorie-1',
        'posts_per_page' => 3,
        'orderby' => 'post_date',
        'order' => 'DESC'
    ]);

    if ( $category_1_wp_query->have_posts() ) :
    ?>
    <nav class="menu menu--vertical menu--uppercase menu--font-weight-normal menu--small">
        <h3 class="menu__title">Catégorie 1</h3>
        <ul class="menu__link-list">
            <?php
            while ( $category_1_wp_query->have_posts() ) :
                $category_1_wp_query->the_post();
            ?>
                <li class="menu__link-list__list-item"><a href="<?php the_permalink(); ?>" class="menu__link-list__list-item__link"><?php the_title(); ?></a></li>
            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </ul>
    </nav>
    <?php
    endif;

    $category_2_wp_query = new WP_Query([
        'category_name' => 'categorie-2',
        'posts_per_page' => 3,
        'orderby' => 'post_date',
        'order' => 'DESC'
    ]);

    if ( $category_2_wp_query->have_posts() ) :
    ?>
    <nav class="menu menu--vertical menu--uppercase menu--font-weight-normal menu--small">
        <h3 class="menu__title">Catégorie 2</h3>
        <ul class="menu__link-list">
            <?php
                while ( $category_2_wp_query->have_posts() ) :
                $category_2_wp_query->the_post();
            ?>
                <li class="menu__link-list__list-item"><a href="<?php the_permalink(); ?>" class="menu__link-list__list-item__link"><?php the_title(); ?></a></li>
            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </ul>
    </nav>
    <?php
    endif;
    ?>
    
</aside>
