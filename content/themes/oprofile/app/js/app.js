require('jquery.scrollex');

var app = {
  $header: $('.header'),
  adminBarHeight: '32px',

  init: function() {
    console.log('init');

    $('.displayMenu').on(
      'click',
      app.displayMenu
    );

    $('.hideMenu').on(
      'click',
      app.hideMenu
    );

    var mainScrollexOptions = {
      enter: app.enterMain
    };

    if (
      $('body').hasClass('admin-bar')
      && $('body').hasClass('default-layout')
    ) {
      mainScrollexOptions.top = '-' + app.adminBarHeight;
    }

    $('.main').scrollex(mainScrollexOptions);

    $('.banner').scrollex({
      enter: app.enterBanner,
      bottom: '95vh'
    });
  },

  displayMenu: function() {
    $('.overlay').removeClass('overlay--hidden'); // On supprime la classe modifier qui cache l'overlay
    $('.default-layout__container').addClass('default-layout__container--blurred'); // J'ajoute la classe modifier de blur sur mon container
    $('.front-page__container').addClass('front-page__container--blurred'); // J'ajoute la classe modifier de blur sur mon container
  },

  hideMenu: function() {
    $('.overlay').addClass('overlay--hidden'); // Je cache mon overlay en ajoutant la classe modifier qui le cache
    $('.default-layout__container').removeClass('default-layout__container--blurred'); // Je supprime la classe modifier de blur sur mon container
    $('.front-page__container').removeClass('front-page__container--blurred'); // Je supprime la classe modifier de blur sur mon container
  },

  enterBanner: function() {
    app.$header
      .removeClass('header--fixed')
      .css('top', '') // On supprime le style en ligne sur la propriété top
    ;
  },

  enterMain: function() {
    var headerTop = 0;

    // if ($('body').is('.admin-bar')) {
    if ($('body').hasClass('admin-bar')) {
      headerTop = app.adminBarHeight;
    }

    app.$header
      .addClass('header--fixed')
      .animate( // Transition avec jQuery
        { // l'objet des modifications des propriétés CSS
          top: headerTop
        },
        250 // la durée de l'animation en ms
      )
    ;
  }
};

$(app.init);