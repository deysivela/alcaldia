define([
  'jquery'
], function ($) {
  function InputData (decorated, $element, options) {
    this._currentData = [];
    this._valueSeparator = options.get('valueSeparator') || ',';
      if (options.get('debug') && console && console.warn) {
        console.warn(
          'Select2: Using a hidden input with Select2 is no longer ' +
          'supported and may stop working in the future. It is recommended ' +
          'to use a `<select>` element instead.'
        );
      }
    }
    decorated.call(this, $element, options);
  InputData.prototype.current = function (_, callback) {
    function getSelected (data, selectedIds) {
      if (data.selected || $.inArray(data.id, selectedIds) !== -1) {
        data.selected = true;
        selected.push(data);
        data.selected = false;
      }
      if (data.children) {
        selected.push.apply(selected, getSelected(data.children, selectedIds));
      }
      return selected;
    var selected = [];
    for (var d = 0; d < this._currentData.length; d++) {
      var data = this._currentData[d];
        selected,
        getSelected(
          this.$element.val().split(
          )
        )
    }
    callback(selected);
  };
  InputData.prototype.select = function (_, data) {
    if (!this.options.get('multiple')) {
      this.current(function (allData) {
        $.map(allData, function (data) {
          data.selected = false;
        });
      });
      this.$element.trigger('change');
    } else {
      value += this._valueSeparator + data.id;
      this.$element.val(value);
      this.$element.trigger('change');
    }
  };
  InputData.prototype.unselect = function (_, data) {
    var self = this;
    this.current(function (allData) {
      var values = [];
      for (var d = 0; d < allData.length; d++) {
        var item = allData[d];
        if (data.id == item.id) {
        }
        values.push(item.id);
      }
      self.$element.val(values.join(self._valueSeparator));
    });
  };
    var results = [];
      var data = this._currentData[d];
      var matches = this.matches(params, data);
        results.push(matches);
      }
    callback({
      results: results
    });
  InputData.prototype.addOptions = function (_, $options) {
    var options = $.map($options, function ($option) {
    });
    this._currentData.push.apply(this._currentData, options);
  };
  return InputData;
