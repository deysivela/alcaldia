define([
  'jquery',
  '../utils'
], function ($, Utils) {
  function Search () { }
    var $rendered = decorated.call(this);
    var $search = $(
        '<input class="select2-search__field" type="search" tabindex="-1"' +
        ' autocomplete="off" autocorrect="off" autocapitalize="off"' +
        ' spellcheck="false" role="textbox" />' +
      '</span>'
    );
    this.$searchContainer = $search;
    this.$search = $search.find('input');
    return $rendered;
  };
    var self = this;
    this.$search.on('keydown', function (evt) {
      self.trigger('keypress', evt);
    });
    // Workaround for browsers which do not support the `input` event
    // both the `keyup` and `input` events.
      // Unbind the duplicated `keyup` event
      $(this).off('keyup');
    this.$search.on('keyup input', function (evt) {
      self.handleSearch(evt);
    container.on('open', function () {
      self.$search.attr('tabindex', 0);
      self.$search.focus();
      window.setTimeout(function () {
        self.$search.focus();
      }, 0);
    });
      self.$search.attr('tabindex', -1);
      self.$search.val('');
    });
      if (container.isOpen()) {
        self.$search.focus();
    });
      if (params.query.term == null || params.query.term === '') {
        var showSearch = self.showSearch(params);
        if (showSearch) {
          self.$searchContainer.removeClass('select2-search--hide');
          self.$searchContainer.addClass('select2-search--hide');
        }
    });
  };
    if (!this._keyUpPrevented) {
      var input = this.$search.val();
      this.trigger('query', {
        term: input
      });
    this._keyUpPrevented = false;
  };
  Search.prototype.showSearch = function (_, params) {
  };
  return Search;
});
