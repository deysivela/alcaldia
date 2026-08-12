define([
  'jquery',
  '../utils'
], function ($, Utils) {
  function AttachBody (decorated, $element, options) {
    this.$dropdownParent = options.get('dropdownParent') || $(document.body);
  }
  AttachBody.prototype.bind = function (decorated, container, $container) {
    var setupResultsEvents = false;
    decorated.call(this, container, $container);
      self._showDropdown();
      if (!setupResultsEvents) {
        container.on('results:all', function () {
          self._positionDropdown();
          self._resizeDropdown();
        container.on('results:append', function () {
          self._positionDropdown();
        });
      }
    });
    container.on('close', function () {
      self._detachPositioningHandler(container);
    });
    this.$dropdownContainer.on('mousedown', function (evt) {
      evt.stopPropagation();
    });
  };
    decorated.call(this);
    this.$dropdownContainer.remove();
  };
  AttachBody.prototype.position = function (decorated, $dropdown, $container) {
    $dropdown.attr('class', $container.attr('class'));
    $dropdown.removeClass('select2');
    $dropdown.addClass('select2-container--open');
    $dropdown.css({
      top: -999999
    });
  };
  AttachBody.prototype.render = function (decorated) {
    var $dropdown = decorated.call(this);
    $container.append($dropdown);
    this.$dropdownContainer = $container;
  };
  AttachBody.prototype._hideDropdown = function (decorated) {
  };
  AttachBody.prototype._attachPositioningHandler =
      function (decorated, container) {
    var self = this;
    var resizeEvent = 'resize.select2.' + container.id;
    var orientationEvent = 'orientationchange.select2.' + container.id;
    $watchers.each(function () {
      $(this).data('select2-scroll-position', {
        y: $(this).scrollTop()
      });
    $watchers.on(scrollEvent, function (ev) {
      $(this).scrollTop(position.y);
    });
      function (e) {
      self._positionDropdown();
      self._resizeDropdown();
  };
  AttachBody.prototype._detachPositioningHandler =
      function (decorated, container) {
    var resizeEvent = 'resize.select2.' + container.id;
    var orientationEvent = 'orientationchange.select2.' + container.id;
    var $watchers = this.$container.parents().filter(Utils.hasScroll);
    $(window).off(scrollEvent + ' ' + resizeEvent + ' ' + orientationEvent);
  };
  AttachBody.prototype._positionDropdown = function () {
    var $window = $(window);
    var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
    var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');
    var newDirection = null;
    offset.bottom = offset.top + this.$container.outerHeight(false);
    var container = {
      height: this.$container.outerHeight(false)
    };
    container.bottom = offset.top + container.height;
    var dropdown = {
      height: this.$dropdown.outerHeight(false)
    };
    var viewport = {
      top: $window.scrollTop(),
    };
    var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
    var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);
    var css = {
      left: offset.left,
    };
    // Determine what the parent element is to use for calciulating the offset
    // For statically positoned elements, we need to get the element
    // that is determining the offset
      $offsetParent = $offsetParent.offsetParent();
    }
    css.top -= parentOffset.top;
    css.left -= parentOffset.left;
      newDirection = 'below';
    if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
    } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
    }
    if (newDirection == 'above' ||
      (isCurrentlyAbove && newDirection !== 'below')) {
    }
    if (newDirection != null) {
        .removeClass('select2-dropdown--below select2-dropdown--above')
        .addClass('select2-dropdown--' + newDirection);
      this.$container
        .addClass('select2-container--' + newDirection);
    }
    this.$dropdownContainer.css(css);
  };
    var css = {
      width: this.$container.outerWidth(false) + 'px'
    if (this.options.get('dropdownAutoWidth')) {
      css.minWidth = css.width;
      css.position = 'relative';
      css.width = 'auto';
    this.$dropdown.css(css);
  };
    this.$dropdownContainer.appendTo(this.$dropdownParent);
    this._positionDropdown();
    this._resizeDropdown();
  };
  return AttachBody;
