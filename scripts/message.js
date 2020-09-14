/**
 * @file
 * JavaScript for messages error form.
 */

'use strict';

(function ($) {
  Drupal.behaviors.messages_status = {
    attach: function (context, settings) {
      var systemMessage = $('.content-wrapper .panel-pane.system-messages');

      if ($('.messages.error').length) {
        systemMessage.css({
          "background-color": "#c14a2f"
        });
      }

      systemMessage.addClass('present');
    }
  }
})(jQuery);
