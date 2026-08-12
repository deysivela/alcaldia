define([
  'jquery',
  './options',
  './utils',
  './keys'
], function ($, Options, Utils, KEYS) {
  var Select2 = function ($element, options) {
    if ($element.data('select2') != null) {
      $element.data('select2').destroy();
    }
    this.id = this._generateId($element);
    this.options = new Options(options, $element);
    // Set up the tabindex
    $element.data('old-tabindex', tabindex);
    // Set up containers and adapters
    this.dataAdapter = new DataAdapter($element, this.options);
    this._placeContainer($container);
    var SelectionAdapter = this.options.get('selectionAdapter');
    this.selection = new SelectionAdapter($element, this.options);
    this.selection.position(this.$selection, $container);
    this.dropdown = new DropdownAdapter($element, this.options);
    this.$dropdown = this.dropdown.render();
    var ResultsAdapter = this.options.get('resultsAdapter');
    this.$results = this.results.render();
    // Bind events
    var self = this;
    // Bind the container to all of the adapters
    // Register any DOM event handlers
    // Register any internal event handlers
    this._registerDataEvents();
    this._registerSelectionEvents();
    this._registerResultsEvents();
    // Set the initial state
    this.dataAdapter.current(function (initialData) {
      self.trigger('selection:update', {
      });
    // Hide the original select
    $element.attr('aria-hidden', 'true');
    this._syncAttributes();
    $element.data('select2', this);
  Utils.Extend(Select2, Utils.Observable);
  Select2.prototype._generateId = function ($element) {
    if ($element.attr('id') != null) {
      id = $element.attr('id');
    } else if ($element.attr('name') != null) {
      id = $element.attr('name') + '-' + Utils.generateChars(2);
    } else {
      id = Utils.generateChars(4);
    id = id.replace(/(:|\.|\[|\]|,)/g, '');
    id = 'select2-' + id;
    return id;
  };
  Select2.prototype._placeContainer = function ($container) {
    $container.insertAfter(this.$element);
    if (width != null) {
      $container.css('width', width);
    }
  Select2.prototype._resolveWidth = function ($element, method) {
    var WIDTH = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
      var styleWidth = this._resolveWidth($element, 'style');
      if (styleWidth != null) {
      }
    }
    if (method == 'element') {
      if (elementWidth <= 0) {
        return 'auto';
      }
      return elementWidth + 'px';
    }
    if (method == 'style') {
      var style = $element.attr('style');
        return null;
      }
      for (var i = 0, l = attrs.length; i < l; i = i + 1) {
        var attr = attrs[i].replace(/\s/g, '');
        if (matches !== null && matches.length >= 1) {
          return matches[1];
      }
    }
    return method;
  };
  Select2.prototype._bindAdapters = function () {
    this.selection.bind(this, this.$container);
    this.dropdown.bind(this, this.$container);
  };
  Select2.prototype._registerDomEvents = function () {
    this.$element.on('change.select2', function () {
      self.dataAdapter.current(function (data) {
        self.trigger('selection:update', {
        });
      });
    this.$element.on('focus.select2', function (evt) {
      self.trigger('focus', evt);
    this._syncA = Utils.bind(this._syncAttributes, this);
    this._syncS = Utils.bind(this._syncSubtree, this);
    if (this.$element[0].attachEvent) {
    }
    var observer = window.MutationObserver ||
      window.MozMutationObserver
    ;
      this._observer = new observer(function (mutations) {
        $.each(mutations, self._syncA);
        $.each(mutations, self._syncS);
      this._observer.observe(this.$element[0], {
        childList: true,
        subtree: false
      });
      this.$element[0].addEventListener(
        'DOMAttrModified',
        self._syncA,
        false
      this.$element[0].addEventListener(
        'DOMNodeInserted',
        false
      );
        'DOMNodeRemoved',
        self._syncS,
        false
    }
  };
  Select2.prototype._registerDataEvents = function () {
    this.dataAdapter.on('*', function (name, params) {
      self.trigger(name, params);
  };
  Select2.prototype._registerSelectionEvents = function () {
    var self = this;
    var nonRelayEvents = ['toggle', 'focus'];
    this.selection.on('toggle', function () {
      self.toggleDropdown();
    });
      self.focus(params);
    });
    this.selection.on('*', function (name, params) {
        return;
      }
    });
  };
  Select2.prototype._registerDropdownEvents = function () {
    this.dropdown.on('*', function (name, params) {
      self.trigger(name, params);
    });
  };
    var self = this;
    this.results.on('*', function (name, params) {
      self.trigger(name, params);
    });
  };
  Select2.prototype._registerEvents = function () {
    var self = this;
    this.on('open', function () {
      self.$container.addClass('select2-container--open');
    });
    this.on('close', function () {
      self.$container.removeClass('select2-container--open');
    });
    this.on('enable', function () {
      self.$container.removeClass('select2-container--disabled');
    });
    this.on('disable', function () {
      self.$container.addClass('select2-container--disabled');
    });
    this.on('blur', function () {
      self.$container.removeClass('select2-container--focus');
    });
    this.on('query', function (params) {
      if (!self.isOpen()) {
        self.trigger('open', {});
      }
      this.dataAdapter.query(params, function (data) {
        self.trigger('results:all', {
          query: params
        });
    });
    this.on('query:append', function (params) {
      this.dataAdapter.query(params, function (data) {
        self.trigger('results:append', {
          query: params
        });
      });
    this.on('keypress', function (evt) {
      var key = evt.which;
      if (self.isOpen()) {
            (key === KEYS.UP && evt.altKey)) {
          self.close();
          evt.preventDefault();
          self.trigger('results:select', {});
          evt.preventDefault();
        } else if ((key === KEYS.SPACE && evt.ctrlKey)) {
          self.trigger('results:toggle', {});
        } else if (key === KEYS.UP) {
          self.trigger('results:previous', {});
          evt.preventDefault();
          self.trigger('results:next', {});
          evt.preventDefault();
      } else {
        if (key === KEYS.ENTER || key === KEYS.SPACE ||
            (key === KEYS.DOWN && evt.altKey)) {
          self.open();
        }
      }
  };
  Select2.prototype._syncAttributes = function () {
    this.options.set('disabled', this.$element.prop('disabled'));
    if (this.options.get('disabled')) {
        this.close();
      }
    } else {
      this.trigger('enable', {});
    }
  Select2.prototype._syncSubtree = function (evt, mutations) {
    var changed = false;
    var self = this;
    // optgroups. This handles the case when the select element is destroyed
    if (
      evt && evt.target && (
      )
    ) {
      return;
    if (!mutations) {
      // If mutation events aren't supported, then we can only assume that the
      // change affected the selections
    } else if (mutations.addedNodes && mutations.addedNodes.length > 0) {
      for (var n = 0; n < mutations.addedNodes.length; n++) {
        var node = mutations.addedNodes[n];
        if (node.selected) {
        }
      }
    } else if (mutations.removedNodes && mutations.removedNodes.length > 0) {
      changed = true;
    }
    // Only re-pull the data if we think there is a change
    if (changed) {
        self.trigger('selection:update', {
          data: currentData
        });
      });
    }
  };
  /**
   * Override the trigger method to automatically trigger pre-events when
   */
  Select2.prototype.trigger = function (name, args) {
    var preTriggerMap = {
      'open': 'opening',
      'close': 'closing',
      'select': 'selecting',
    };
    if (args === undefined) {
      args = {};
    if (name in preTriggerMap) {
      var preTriggerName = preTriggerMap[name];
      var preTriggerArgs = {
        name: name,
        args: args
      };
      if (preTriggerArgs.prevented) {
        args.prevented = true;
        return;
    }
    actualTrigger.call(this, name, args);
  };
  Select2.prototype.toggleDropdown = function () {
    if (this.options.get('disabled')) {
      return;
    if (this.isOpen()) {
      this.close();
    } else {
      this.open();
    }
  Select2.prototype.open = function () {
    if (this.isOpen()) {
    }
    this.trigger('query', {});
  };
  Select2.prototype.close = function () {
      return;
    }
    this.trigger('close', {});
  };
  Select2.prototype.isOpen = function () {
  };
  Select2.prototype.hasFocus = function () {
    return this.$container.hasClass('select2-container--focus');
  Select2.prototype.focus = function (data) {
    // No need to re-trigger focus events if we are already focused
    if (this.hasFocus()) {
      return;
    }
    this.$container.addClass('select2-container--focus');
    this.trigger('focus', {});
  };
  Select2.prototype.enable = function (args) {
      console.warn(
        'Select2: The `select2("enable")` method has been deprecated and will' +
        ' be removed in later Select2 versions. Use $element.prop("disabled")' +
        ' instead.'
      );
    }
    if (args == null || args.length === 0) {
    }
    var disabled = !args[0];
    this.$element.prop('disabled', disabled);
  };
  Select2.prototype.data = function () {
    if (this.options.get('debug') &&
        arguments.length > 0 && window.console && console.warn) {
        'Select2: Data can no longer be set using `select2("data")`. You ' +
        'should consider setting the value instead using `$element.val()`.'
      );
    }
    var data = [];
    this.dataAdapter.current(function (currentData) {
      data = currentData;
    });
    return data;
  Select2.prototype.val = function (args) {
    if (this.options.get('debug') && window.console && console.warn) {
      console.warn(
        'Select2: The `select2("val")` method has been deprecated and will be' +
        ' removed in later Select2 versions. Use $element.val() instead.'
      );
    }
    if (args == null || args.length === 0) {
      return this.$element.val();
    }
    var newVal = args[0];
    if ($.isArray(newVal)) {
        return obj.toString();
      });
    }
  };
  Select2.prototype.destroy = function () {
    this.$container.remove();
    if (this.$element[0].detachEvent) {
      this.$element[0].detachEvent('onpropertychange', this._syncA);
    }
    if (this._observer != null) {
      this._observer = null;
      this.$element[0]
        .removeEventListener('DOMAttrModified', this._syncA, false);
        .removeEventListener('DOMNodeInserted', this._syncS, false);
      this.$element[0]
        .removeEventListener('DOMNodeRemoved', this._syncS, false);
    this._syncA = null;
    this._syncS = null;
    this.$element.attr('tabindex', this.$element.data('old-tabindex'));
    this.$element.removeClass('select2-hidden-accessible');
    this.$element.attr('aria-hidden', 'false');
    this.$element.removeData('select2');
    this.selection.destroy();
    this.dropdown.destroy();
    this.results.destroy();
    this.dataAdapter = null;
    this.selection = null;
    this.dropdown = null;
  };
  Select2.prototype.render = function () {
    var $container = $(
      '<span class="select2 select2-container">' +
        '<span class="dropdown-wrapper" aria-hidden="true"></span>' +
      '</span>'
    $container.attr('dir', this.options.get('dir'));
    this.$container = $container;
    this.$container.addClass('select2-container--' + this.options.get('theme'));
    $container.data('element', this.$element);
  };
  return Select2;
