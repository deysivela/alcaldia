define([
  'jquery',
  '../keys'
], function ($, KEYS) {
  function AllowClear () { }
    var self = this;
    decorated.call(this, container, $container);
      if (this.options.get('debug') && window.console && console.error) {
          'Select2: The `allowClear` option should be used in combination ' +
          'with the `placeholder` option.'
        );
      }
    }
    this.$selection.on('mousedown', '.select2-selection__clear',
      function (evt) {
        self._handleClear(evt);
    container.on('keypress', function (evt) {
      self._handleKeyboardClear(evt, container);
    });
  };
    // Ignore the event if it is disabled
    if (this.options.get('disabled')) {
      return;
    }
    // Ignore the event if nothing has been selected
    if ($clear.length === 0) {
      return;
    }
    evt.stopPropagation();
    for (var d = 0; d < data.length; d++) {
        data: data[d]
      };
      // Trigger the `unselect` event, so people can prevent it from being
      // cleared.
      // If the event was prevented, don't clear it out.
        return;
    }
    this.$element.val(this.placeholder.id).trigger('change');
    this.trigger('toggle', {});
  };
    if (container.isOpen()) {
      return;
    }
      this._handleClear(evt);
    }
  };
  AllowClear.prototype.update = function (decorated, data) {
    decorated.call(this, data);
        data.length === 0) {
    }
    var $remove = $(
        '&times;' +
      '</span>'
    );
    $remove.data('data', data);
  };
  return AllowClear;
});
