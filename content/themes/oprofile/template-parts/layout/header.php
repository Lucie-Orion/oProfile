<header class="header header--fixed">

    <?php if ( is_front_page() ) : ?>
    <h1 class="logo"><?php bloginfo( 'name' ); ?></h1>
    <?php else : ?>
    <a class="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
    <?php endif; ?>

    <!-- Header menu -->
        <?php
			wp_nav_menu(
				[
					'theme_location'  => 'header-menu',
					'container'       => 'nav',
					'container_class' => 'menu',
					'menu_class'      => 'menu__list',
				]
			);
		?>

    <!-- Bouton pour  ouvrir le menu overlay -->     
    <a class="header__ui-button displayMenu" href="#"><i class="fa fa-bars"></i></a>

</header>