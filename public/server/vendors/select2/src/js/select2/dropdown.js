define([
  'jquery',
  './utils'
], function ($, Utils) {
  function Dropdown ($element, options) {
    this.$element = $element;
    this.options = options;
  }
  Utils.Extend(Dropdown, Utils.Observable);
    var $dropdown = $(
        '<span class="select2-results"></span>' +
      '</span>'
    );
    $dropdown.attr('dir', this.options.get('dir'));
    this.$dropdown = $dropdown;
    return $dropdown;
  Dropdown.prototype.bind = function () {
  };
    // Should be implmented in subclasses
  };
    // Remove the dropdown from the DOM
    this.$dropdown.remove();
  };
});
