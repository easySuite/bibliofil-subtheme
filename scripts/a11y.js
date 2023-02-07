(function($) {
  'use strict';
  /**
   * Slide toggle footer menus
   */
  Drupal.behaviors.bibliofil_a11y = {
    attach: function(context, settings) {
      $('.a11y-trigger', context).click(function(event) {
        var $element = $(this);
        var $body = $('body');

        if ($element.hasClass('font-size-trigger')) {
          $body.toggleClass('a11y');
        }

        if ($element.hasClass('contrast-trigger')) {
          $body.toggleClass('a11y-contrast');
        }
        event.preventDefault();
      });
    }
  };
})(jQuery);
