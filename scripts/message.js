/**
 * @file
 * JavaScript for messages error form.
 */

'use strict';

(function ($) {
  Drupal.behaviors.messages_status = {
    attach: function (context, settings) {
      var systemMessage = $('.content-wrapper .panel-pane.system-messages');
      if ($('.messages.error').length > 0) {
        systemMessage.css({ "background-color": "#ff0000" });
      }
    }
  }
})(jQuery);
