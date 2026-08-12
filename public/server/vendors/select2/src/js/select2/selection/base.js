define([
  'jquery',
  '../utils',
  '../keys'
], function ($, Utils, KEYS) {
  function BaseSelection ($element, options) {
    this.$element = $element;
    this.options = options;
  }
  Utils.Extend(BaseSelection, Utils.Observable);
    var $selection = $(
      ' aria-haspopup="true" aria-expanded="false">' +
      '</span>'
    );
    this._tabindex = 0;
    if (this.$element.data('old-tabindex') != null) {
      this._tabindex = this.$element.data('old-tabindex');
      this._tabindex = this.$element.attr('tabindex');
    $selection.attr('title', this.$element.attr('title'));
    $selection.attr('tabindex', this._tabindex);
    this.$selection = $selection;
    return $selection;
  };
    var self = this;
    var id = container.id + '-container';
    this.container = container;
      self.trigger('focus', evt);
    });
      self._handleBlur(evt);
    });
      self.trigger('keypress', evt);
      if (evt.which === KEYS.SPACE) {
      }
    container.on('results:focus', function (params) {
      self.$selection.attr('aria-activedescendant', params.data._resultId);
    });
      self.update(params.data);
    });
    container.on('open', function () {
      self.$selection.attr('aria-expanded', 'true');
      self.$selection.attr('aria-owns', resultsId);
    });
    container.on('close', function () {
      // When the dropdown is closed, aria-expanded="false"
      self.$selection.attr('aria-expanded', 'false');
      self.$selection.removeAttr('aria-owns');
      self.$selection.focus();
      self._detachCloseHandler(container);
    container.on('enable', function () {
      self.$selection.attr('tabindex', self._tabindex);
    });
      self.$selection.attr('tabindex', '-1');
    });
  };
  BaseSelection.prototype._handleBlur = function (evt) {
    // This needs to be delayed as the active element is the body when the tab
    // key is pressed, possibly along with others.
      // Don't trigger `blur` if the focus is still in the selection
      if (
        (document.activeElement == self.$selection[0]) ||
        ($.contains(self.$selection[0], document.activeElement))
      ) {
      }
    }, 1);
  };
    var self = this;
    $(document.body).on('mousedown.select2.' + container.id, function (e) {
      var $target = $(e.target);
      var $all = $('.select2.select2-container--open');
      $all.each(function () {
        var $this = $(this);
        if (this == $select[0]) {
        }
        var $element = $this.data('element');
      });
    });
  };
  BaseSelection.prototype._detachCloseHandler = function (container) {
    $(document.body).off('mousedown.select2.' + container.id);
  };
  BaseSelection.prototype.position = function ($selection, $container) {
    var $selectionContainer = $container.find('.selection');
    $selectionContainer.append($selection);
  };
    this._detachCloseHandler(this.container);
  };
  BaseSelection.prototype.update = function (data) {
  };
  return BaseSelection;
