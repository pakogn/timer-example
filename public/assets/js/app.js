moment.locale('es');

let Timer = (function($) {
  _isPaused = false;
  _serverDate = moment($('.timer').data('timestamp')).add(5, 'days');

  var initialize = function() {
    setInterval(_updateTimer, 1000);
    $('.play-button').hide();
    $('.pause-button').show();
  };

  _updateTimer = function() {
    $('.timer').each(function(index, timer) {
      if (_isPaused) {
        return;
      }

      $(timer).html(_serverDate.format('dddd, DD.MMMM.YYYY hh:mm:ss'));
      _serverDate.add(1, 'seconds');
    });
  };

  pause = function() {
    _isPaused = true;
    $('.play-button').show();
    $('.pause-button').hide();
  };

  play = function() {
    _isPaused = false;
    $('.play-button').hide();
    $('.pause-button').show();
  };

  // Here We may return the variables that needs to be public.
  return {
    initialize: initialize,
    pause: pause,
    play: play,
  };

})(window.jQuery);
