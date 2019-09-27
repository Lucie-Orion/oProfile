<?php

// Template part de la bannière qui s'affiche sur la page d'accueil

if ( is_front_page() ) :
    if ( have_posts() ) :
        the_post();
        ?>
            <section class="banner" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                <div class="banner__container">
                    <header class="banner__header">
                        <h2 class="banner__header__title"><?php the_title(); ?></h2>
                    </header>
                    <main class="banner__main">
                        <?php the_content(); ?>
                    </main>
                    <footer class="banner__footer">
                        <nav class="banner__footer__links">
                            <a href="#skills" class="button">En savoir plus</a>
                            <a href="#contact" class="button">Contact</a>
                        </nav>
                    </footer>
                </div>
            </section>
        <?php
    endif;
endif;
?>