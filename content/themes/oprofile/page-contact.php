<?php

// Template pour le formulaire de contact
// To do

get_header();

if ( have_posts() ) :
    the_post();
?>

    <main>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </main>
    
<?php
endif;

get_footer();