<?php

// Template spécifique à la page d'archive du CPT project
// To do

get_header();

?>

<main class="main" style="display: block;">
    <h1>Tous les projets</h1>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>

            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Lire la suite</a>
            </article>
         
            <?php
        endwhile;
    endif;
    ?>

</main>

<?php

get_footer();