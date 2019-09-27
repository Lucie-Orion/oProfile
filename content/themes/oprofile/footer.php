<?php
    // Customizer
    $footer_active = get_theme_mod(
        'oprofile_footer_active',
        true 
    );

    if ( $footer_active ) :
        $default_background_color = '';

        if ( defined( 'OPROFILE_THEME_FOOTER_DEFAULT_BACKGROUND_COLOR' ) ) :
            $default_background_color = OPROFILE_THEME_FOOTER_DEFAULT_BACKGROUND_COLOR;
        endif;

        $background_color = get_theme_mod(
            'oprofile_footer_background_color',
            $default_background_color
        );
    ?>
            <footer class="footer" id="contact" style="background-color: <?= $background_color; ?>;">
        <?php
          if (
            defined( 'OPROFILE_THEME_CONTACT_FORM_7_ID' )
            && OPROFILE_THEME_CONTACT_FORM_7_ID !== 0
          ) :
            echo do_shortcode( '[contact-form-7 id="' . OPROFILE_THEME_CONTACT_FORM_7_ID . '"  title="Contact form 1"]' );
          endif;
          ?>

          <!-- TO DO -->
          <ul class="informations-list">
            <?php
            $email_contact = get_theme_mod( 'oprofile_footer_contact_email' );
            if ( ! empty( $email_contact ) ) :
            ?>
                <li class="informations-list__information">
                <span class="informations-list__information__title">E-mail</span>
                <a href="mailto:<?= $email_contact; ?>" class="informations-list__information__content"><?= $email_contact; ?></a>
                <i class="informations-list__information__icon fa fa-envelope"></i>
                </li>
            <?php endif; ?>
            <li class="informations-list__information">
            <span class="informations-list__information__title">Téléphone</span>
            <a href="tel:+33607080910" class="informations-list__information__content">+33 6 07 08 09 10</a>
            <i class="informations-list__information__icon fa fa-phone"></i>
            </li>
            <li class="informations-list__information informations-list__information--no-link">
            <span class="informations-list__information__title">Adresse</span>
            <p class="informations-list__information__content">Lorem ipsum<br />dolor sit<br />amet</p>
            <i class="informations-list__information__icon fa fa-home"></i>
            </li>
          </ul>
      </footer>
    <?php endif; ?>
  </div>

  <!-- Overlay menu -->
  <div class="overlay overlay--hidden">
    <div class="overlay__container">

      <!-- Main menu -->
      <?php
			wp_nav_menu(
				[
					'theme_location'  => 'main-menu',
					'container'       => 'nav',
					'container_class' => 'menu menu--vertical menu--uppercase',
					'menu_class'      => 'menu__list',
				]
			);
		  ?>

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

    </div>
    <a href="#" class="overlay__close-button hideMenu"><i class="fa fa-close"></i></a>
  </div>

  <?php 
  wp_footer(); 
  ?>
  
</body>
</html>