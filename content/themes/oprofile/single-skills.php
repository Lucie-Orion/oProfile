<?php

// Template spécifique pour le CPT skills
// To do

get_header();
?>


<main class="main" style="display: block;">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
            <?php
        endwhile;
    endif;
    ?>
    
</main>

<?php
get_footer();