/**
 * @file
 * JavaScript for left side menu collapse.
 */

'use strict';

(function ($) {
  Drupal.behaviors.left_menu = {
    attach: function (context, settings) {
      $(window).on('resize', function () {
        var left_menu = $('.sub-menu-wrapper ul.main-menu-third-level');
        var size = $(window).width();
        if (!left_menu || !left_menu.length) {
          return;
        }

        for (var i = 0; i < left_menu.length; i++) {
          if (size > 951 && $(left_menu[i]).css('display') && $(left_menu[i]).css('display') == 'none') {
            $(left_menu[i]).css({'display': 'block'});
          }
        }
      });
    }
  }
})(jQuery);
