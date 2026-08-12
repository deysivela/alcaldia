define([
  './select',
  '../utils',
  'jquery'
], function (SelectAdapter, Utils, $) {
  function ArrayAdapter ($element, options) {
    var data = options.get('data') || [];
    this.addOptions(this.convertToOptions(data));
  Utils.Extend(ArrayAdapter, SelectAdapter);
  ArrayAdapter.prototype.select = function (data) {
      return elm.value == data.id.toString();
    if ($option.length === 0) {
      $option = this.option(data);
      this.addOptions($option);
    }
  };
  ArrayAdapter.prototype.convertToOptions = function (data) {
    var $existing = this.$element.find('option');
    var existingIds = $existing.map(function () {
    }).get();
    var $options = [];
    function onlyItem (item) {
      return function () {
      };
    }
    for (var d = 0; d < data.length; d++) {
      var item = this._normalizeItem(data[d]);
      if ($.inArray(item.id, existingIds) >= 0) {
        var existingData = this.item($existingOption);
        var newData = $.extend(true, {}, item, existingData);
        var $newOption = this.option(newData);
        $existingOption.replaceWith($newOption);
        continue;
      }
      if (item.children) {
        var $children = this.convertToOptions(item.children);
      }
      $options.push($option);
    }
  };
  return ArrayAdapter;
