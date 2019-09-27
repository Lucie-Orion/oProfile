<?php

get_header();

if ( have_posts() ) :
?>
    <main class="main">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/post' );
        endwhile;
        ?>
    </main>

<?php
endif;
?>

<?php 

get_footer(); 
?>
