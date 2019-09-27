<article <?php post_class( 'post' ); ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
    <header class="post__header">
        <h4 class="post__header__title"><?php the_title(); ?></h4>
    </header>
    <main class="post__main">
        <?php the_excerpt(); ?>
    </main>
    <footer class="post__footer">
        <a class="post__footer__link" href="<?php the_permalink(); ?>">Lire la suite</a>
    </footer>
</article>