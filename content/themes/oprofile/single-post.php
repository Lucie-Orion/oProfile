<?php

// Template pour un post
// To do

get_header();

if ( have_posts() ) :
    the_post();
    ?>
    
        <article <?php post_class('single-post'); ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
            <h1 class="single-post__title"><?php the_title(); ?></h1>
            <div class="single-post__text"><?php the_content(); ?></div>
        </article>
    
    <?php
endif;

get_footer();
