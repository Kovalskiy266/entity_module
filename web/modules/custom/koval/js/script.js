(function ($, Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.guestbook_finishedinput = {
    attach: function (context, settings) {
      var typingTimer;
      var delay = 1100;
      $('input').once('finished_input').on('keyup', function (e) {
        clearTimeout(typingTimer);
        if ($(this).val()) {
          var trigid = $(this);
          typingTimer = setTimeout(function () {
            trigid.triggerHandler('finishedinput');
          }, delay);
        }
      });
    }
  };
})(jQuery, Drupal, drupalSettings);
