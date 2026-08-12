define([
  'jquery',
  './utils'
], function ($, CompatUtils) {
  // No-op CSS adapter that discards all classes by default
  function _dropdownAdapter (clazz) {
    return null;
  }
  DropdownCSS.prototype.render = function (decorated) {
    var dropdownCssClass = this.options.get('dropdownCssClass') || '';
    if ($.isFunction(dropdownCssClass)) {
    }
    dropdownCssAdapter = dropdownCssAdapter || _dropdownAdapter;
    if (dropdownCssClass.indexOf(':all:') !== -1) {
      dropdownCssClass = dropdownCssClass.replace(':all:', '');
      dropdownCssAdapter = function (clazz) {
        var adapted = _cssAdapter(clazz);
          // Append the old one along with the adapted one
          return adapted + ' ' + clazz;
        return clazz;
    }
    var dropdownCss = this.options.get('dropdownCss') || {};
      dropdownCss = dropdownCss(this.$element);
    }
    CompatUtils.syncCssClasses($dropdown, this.$element, dropdownCssAdapter);
    $dropdown.css(dropdownCss);
    return $dropdown;
  };
  return DropdownCSS;
