define([
  'jquery',
  '../utils',
  '../keys'
], function ($, Utils, KEYS) {
  function Search (decorated, $element, options) {
    decorated.call(this, $element, options);
  }
    var $search = $(
      '<li class="select2-search select2-search--inline">' +
        '<input class="select2-search__field" type="search" tabindex="-1"' +
        ' autocomplete="off" autocorrect="off" autocapitalize="off"' +
        ' spellcheck="false" role="textbox" aria-autocomplete="list" />' +
      '</li>'
    );
    this.$searchContainer = $search;
    var $rendered = decorated.call(this);
    this._transferTabIndex();
  };
    var self = this;
    container.on('open', function () {
      self.$search.trigger('focus');
    container.on('close', function () {
      self.$search.val('');
      self.$search.trigger('focus');
    container.on('enable', function () {
      self.$search.prop('disabled', false);
      self._transferTabIndex();
    container.on('disable', function () {
      self.$search.prop('disabled', true);
    });
    container.on('focus', function (evt) {
      self.$search.trigger('focus');
    container.on('results:focus', function (params) {
      self.$search.attr('aria-activedescendant', params.id);
    this.$selection.on('focusin', '.select2-search--inline', function (evt) {
      self.trigger('focus', evt);
    this.$selection.on('focusout', '.select2-search--inline', function (evt) {
      self._handleBlur(evt);
    });
      evt.stopPropagation();
      self.trigger('keypress', evt);
      self._keyUpPrevented = evt.isDefaultPrevented();
      if (key === KEYS.BACKSPACE && self.$search.val() === '') {
        var $previousChoice = self.$searchContainer
          .prev('.select2-selection__choice');
          var item = $previousChoice.data('data');
          self.searchRemoveChoice(item);
          evt.preventDefault();
      }
    });
    // Try to detect the IE version should the `documentMode` property that
    // slightly cleaner than doing a user agent check.
    // This property is not available in Edge, but Edge also doesn't have
    var msie = document.documentMode;
    // Workaround for browsers which do not support the `input` event
    // both the `keyup` and `input` events.
      'input.searchcheck',
      '.select2-search--inline',
      function (evt) {
        // search box. To get around this issue, we are forced to ignore all
        // `input` events in IE and keep using `keyup`.
          self.$selection.off('input.search input.searchcheck');
        }
        // Unbind the duplicated `keyup` event
        self.$selection.off('keyup.search');
      }
    this.$selection.on(
      'keyup.search input.search',
      '.select2-search--inline',
      function (evt) {
        // IE will trigger the `input` event when a placeholder is used on a
        // search box. To get around this issue, we are forced to ignore all
        // `input` events in IE and keep using `keyup`.
          self.$selection.off('input.search input.searchcheck');
          return;
        }
        var key = evt.which;
        // We can freely ignore events from modifier keys
        if (key == KEYS.SHIFT || key == KEYS.CTRL || key == KEYS.ALT) {
          return;
        }
        // Tabbing will be handled during the `keydown` phase
        if (key == KEYS.TAB) {
          return;
        }
        self.handleSearch(evt);
      }
  };
  /**
   * This method will transfer the tabindex attribute from the rendered
   * selection to the search box. This allows for the search box to be used as
   *
   * @private
   */
  Search.prototype._transferTabIndex = function (decorated) {
    this.$search.attr('tabindex', this.$selection.attr('tabindex'));
    this.$selection.attr('tabindex', '-1');
  };
  Search.prototype.createPlaceholder = function (decorated, placeholder) {
    this.$search.attr('placeholder', placeholder.text);
  };
  Search.prototype.update = function (decorated, data) {
    this.$search.attr('placeholder', '');
    this.$selection.find('.select2-selection__rendered')
                   .append(this.$searchContainer);
    this.resizeSearch();
    if (searchHadFocus) {
    }
  };
  Search.prototype.handleSearch = function () {
    this.resizeSearch();
      var input = this.$search.val();
      this.trigger('query', {
        term: input
      });
    this._keyUpPrevented = false;
  };
  Search.prototype.searchRemoveChoice = function (decorated, item) {
    this.trigger('unselect', {
      data: item
    });
    this.$search.val(item.text);
    this.handleSearch();
  };
  Search.prototype.resizeSearch = function () {
    this.$search.css('width', '25px');
    if (this.$search.attr('placeholder') !== '') {
      width = this.$selection.find('.select2-selection__rendered').innerWidth();
    } else {
      width = (minimumWidth * 0.75) + 'em';
    }
  };
});
