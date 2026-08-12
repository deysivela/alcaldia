define([
  'jquery',
  './utils'
], function ($, Utils) {
  function Results ($element, options, dataAdapter) {
    this.$element = $element;
    this.data = dataAdapter;
    this.options = options;
  }
  Utils.Extend(Results, Utils.Observable);
    var $results = $(
    );
    if (this.options.get('multiple')) {
      $results.attr('aria-multiselectable', 'true');
    }
    return $results;
  };
  Results.prototype.clear = function () {
  };
    var escapeMarkup = this.options.get('escapeMarkup');
    this.clear();
    var $message = $(
      '<li role="treeitem" aria-live="assertive"' +
      ' class="select2-results__option"></li>'
    var message = this.options.get('translations').get(params.message);
    $message.append(
        message(params.args)
      )
    $message[0].className += ' select2-results__message';
    this.$results.append($message);
  };
  Results.prototype.hideMessages = function () {
  };
    this.hideLoading();
    var $options = [];
    if (data.results == null || data.results.length === 0) {
      if (this.$results.children().length === 0) {
        this.trigger('results:message', {
        });
      return;
    }
    for (var d = 0; d < data.results.length; d++) {
      var item = data.results[d];
      var $option = this.option(item);
    }
    this.$results.append($options);
  Results.prototype.position = function ($results, $dropdown) {
    $resultsContainer.append($results);
  };
  Results.prototype.sort = function (data) {
    var sorter = this.options.get('sorter');
    return sorter(data);
  };
    var $options = this.$results
      .find('.select2-results__option[aria-selected]');
    // Check if there are any selected options
      // If there are selected options, highlight the first
      $selected.first().trigger('mouseenter');
      // If there are no selected options, highlight the first option
      $options.first().trigger('mouseenter');
    }
  };
  Results.prototype.setClasses = function () {
    this.data.current(function (selected) {
      var selectedIds = $.map(selected, function (s) {
        return s.id.toString();
      });
        .find('.select2-results__option[aria-selected]');
      $options.each(function () {
        var item = $.data(this, 'data');
        // id needs to be converted to a string when comparing
        if ((item.element != null && item.element.selected) ||
            (item.element == null && $.inArray(id, selectedIds) > -1)) {
          $option.attr('aria-selected', 'true');
          $option.attr('aria-selected', 'false');
      });
    });
  };
  Results.prototype.showLoading = function (params) {
    this.hideLoading();
    var loadingMore = this.options.get('translations').get('searching');
    var loading = {
      disabled: true,
      loading: true,
    };
    var $loading = this.option(loading);
    this.$results.prepend($loading);
  };
    this.$results.find('.loading-results').remove();
  };
  Results.prototype.option = function (data) {
    var option = document.createElement('li');
    var attrs = {
      'role': 'treeitem',
    };
    if (data.disabled) {
      attrs['aria-disabled'] = 'true';
    if (data.id == null) {
      delete attrs['aria-selected'];
    if (data._resultId != null) {
      option.id = data._resultId;
    }
    if (data.title) {
      option.title = data.title;
    }
    if (data.children) {
      attrs['aria-label'] = data.text;
      delete attrs['aria-selected'];
    for (var attr in attrs) {
      var val = attrs[attr];
    }
      var $option = $(option);
      var label = document.createElement('strong');
      label.className = 'select2-results__group';
      var $label = $(label);
      this.template(data, label);
      var $children = [];
      for (var c = 0; c < data.children.length; c++) {
        var $child = this.option(child);
        $children.push($child);
      var $childrenContainer = $('<ul></ul>', {
        'class': 'select2-results__options select2-results__options--nested'
      });
      $option.append(label);
      $option.append($childrenContainer);
    } else {
    }
    $.data(option, 'data', data);
    return option;
  };
    var self = this;
    var id = container.id + '-results';
    this.$results.attr('id', id);
    container.on('results:all', function (params) {
      self.append(params.data);
      if (container.isOpen()) {
        self.setClasses();
      }
    });
    container.on('results:append', function (params) {
      if (container.isOpen()) {
        self.setClasses();
      }
    container.on('query', function (params) {
      self.hideMessages();
      self.showLoading(params);
    });
    container.on('select', function () {
        return;
      }
      self.highlightFirstItem();
    });
      if (!container.isOpen()) {
        return;
      self.setClasses();
      self.highlightFirstItem();
    container.on('open', function () {
      // When the dropdown is open, aria-expended="true"
      self.$results.attr('aria-hidden', 'false');
      self.ensureHighlightVisible();
    });
      // When the dropdown is closed, aria-expended="false"
      self.$results.attr('aria-hidden', 'true');
      self.$results.removeAttr('aria-activedescendant');
    container.on('results:toggle', function () {
      var $highlighted = self.getHighlightedResults();
      if ($highlighted.length === 0) {
      }
    });
    container.on('results:select', function () {
      var $highlighted = self.getHighlightedResults();
      if ($highlighted.length === 0) {
        return;
      var data = $highlighted.data('data');
        self.trigger('close', {});
      } else {
          data: data
        });
    });
      var $highlighted = self.getHighlightedResults();
      var currentIndex = $options.index($highlighted);
      // If we are already at te top, don't move further
      if (currentIndex === 0) {
      }
      var nextIndex = currentIndex - 1;
      // If none are highlighted, highlight the first
      if ($highlighted.length === 0) {
        nextIndex = 0;
      var $next = $options.eq(nextIndex);
      $next.trigger('mouseenter');
      var nextTop = $next.offset().top;
      var nextOffset = self.$results.scrollTop() + (nextTop - currentOffset);
      if (nextIndex === 0) {
        self.$results.scrollTop(0);
        self.$results.scrollTop(nextOffset);
      }
    });
    container.on('results:next', function () {
      var $options = self.$results.find('[aria-selected]');
      var currentIndex = $options.index($highlighted);
      var nextIndex = currentIndex + 1;
      // If we are at the last option, stay there
        return;
      }
      var $next = $options.eq(nextIndex);
      var currentOffset = self.$results.offset().top +
        self.$results.outerHeight(false);
      var nextBottom = $next.offset().top + $next.outerHeight(false);
      var nextOffset = self.$results.scrollTop() + nextBottom - currentOffset;
        self.$results.scrollTop(0);
      } else if (nextBottom > currentOffset) {
        self.$results.scrollTop(nextOffset);
    });
    container.on('results:focus', function (params) {
      params.element.addClass('select2-results__option--highlighted');
    });
      self.displayMessage(params);
    });
    if ($.fn.mousewheel) {
        var top = self.$results.scrollTop();
        var bottom = self.$results.get(0).scrollHeight - top + e.deltaY;
        var isAtTop = e.deltaY > 0 && top - e.deltaY <= 0;
        var isAtBottom = e.deltaY < 0 && bottom <= self.$results.height();
        if (isAtTop) {
          self.$results.scrollTop(0);
          e.stopPropagation();
        } else if (isAtBottom) {
            self.$results.get(0).scrollHeight - self.$results.height()
          );
          e.preventDefault();
        }
      });
    this.$results.on('mouseup', '.select2-results__option[aria-selected]',
      function (evt) {
      var data = $this.data('data');
      if ($this.attr('aria-selected') === 'true') {
        if (self.options.get('multiple')) {
            originalEvent: evt,
          });
        } else {
          self.trigger('close', {});
        }
        return;
      }
      self.trigger('select', {
        originalEvent: evt,
      });
    });
      function (evt) {
      self.getHighlightedResults()
      self.trigger('results:focus', {
        data: data,
        element: $(this)
      });
  };
    var $highlighted = this.$results
    .find('.select2-results__option--highlighted');
    return $highlighted;
  };
    this.$results.remove();
  Results.prototype.ensureHighlightVisible = function () {
    if ($highlighted.length === 0) {
      return;
    }
    var currentIndex = $options.index($highlighted);
    var currentOffset = this.$results.offset().top;
    var nextTop = $highlighted.offset().top;
    var nextOffset = this.$results.scrollTop() + (nextTop - currentOffset);
    var offsetDelta = nextTop - currentOffset;
    nextOffset -= $highlighted.outerHeight(false) * 2;
      this.$results.scrollTop(0);
    } else if (offsetDelta > this.$results.outerHeight() || offsetDelta < 0) {
    }
  Results.prototype.template = function (result, container) {
    var escapeMarkup = this.options.get('escapeMarkup');
    if (content == null) {
      container.style.display = 'none';
    } else if (typeof content === 'string') {
      container.innerHTML = escapeMarkup(content);
      $(container).append(content);
  };
});
