define([
  './base',
  '../utils',
  'jquery'
], function (BaseAdapter, Utils, $) {
  function SelectAdapter ($element, options) {
    this.$element = $element;
    this.options = options;
  }
  Utils.Extend(SelectAdapter, BaseAdapter);
    var data = [];
    this.$element.find(':selected').each(function () {
      var $option = $(this);
      var option = self.item($option);
    });
    callback(data);
  SelectAdapter.prototype.select = function (data) {
    data.selected = true;
    // If data.element is a DOM node, use it instead
      data.element.selected = true;
      this.$element.trigger('change');
    }
    if (this.$element.prop('multiple')) {
        var val = [];
        data.push.apply(data, currentData);
        for (var d = 0; d < data.length; d++) {
          var id = data[d].id;
            val.push(id);
        }
        self.$element.val(val);
      });
    } else {
      var val = data.id;
      this.$element.trigger('change');
    }
  SelectAdapter.prototype.unselect = function (data) {
    var self = this;
      return;
    }
    data.selected = false;
    if ($(data.element).is('option')) {
      this.$element.trigger('change');
      return;
    }
    this.current(function (currentData) {
      var val = [];
        var id = currentData[d].id;
        if (id !== data.id && $.inArray(id, val) === -1) {
          val.push(id);
        }
      self.$element.val(val);
      self.$element.trigger('change');
  };
  SelectAdapter.prototype.bind = function (container, $container) {
    var self = this;
    container.on('select', function (params) {
    });
    container.on('unselect', function (params) {
    });
  SelectAdapter.prototype.destroy = function () {
    // Remove anything added to child elements
      // Remove any custom data set by Select2
      $.removeData(this, 'data');
  };
  SelectAdapter.prototype.query = function (params, callback) {
    var self = this;
    var $options = this.$element.children();
    $options.each(function () {
      var $option = $(this);
        return;
      var option = self.item($option);
      var matches = self.matches(params, option);
      if (matches !== null) {
      }
    });
      results: data
  };
  SelectAdapter.prototype.addOptions = function ($options) {
    Utils.appendMany(this.$element, $options);
  SelectAdapter.prototype.option = function (data) {
    var option;
    if (data.children) {
      option = document.createElement('optgroup');
    } else {
      option = document.createElement('option');
      if (option.textContent !== undefined) {
        option.textContent = data.text;
      } else {
        option.innerText = data.text;
      }
    if (data.id) {
      option.value = data.id;
    }
      option.disabled = true;
    if (data.selected) {
      option.selected = true;
    if (data.title) {
      option.title = data.title;
    }
    var normalizedData = this._normalizeItem(data);
    // Override the option's data with the combined data
    return $option;
  };
  SelectAdapter.prototype.item = function ($option) {
    var data = {};
    if (data != null) {
      return data;
    }
    if ($option.is('option')) {
        id: $option.val(),
        text: $option.text(),
        disabled: $option.prop('disabled'),
        title: $option.prop('title')
      };
      data = {
        text: $option.prop('label'),
        children: [],
        title: $option.prop('title')
      };
      var children = [];
      for (var c = 0; c < $children.length; c++) {
        var $child = $($children[c]);
        var child = this.item($child);
        children.push(child);
      }
    }
    data = this._normalizeItem(data);
    data.element = $option[0];
    return data;
  };
  SelectAdapter.prototype._normalizeItem = function (item) {
      item = {
        id: item,
        text: item
    }
    item = $.extend({}, {
      text: ''
    var defaults = {
      disabled: false
    };
      item.id = item.id.toString();
    }
      item.text = item.text.toString();
    }
      item._resultId = this.generateResultId(this.container, item);
    }
  };
    var matcher = this.options.get('matcher');
    return matcher(params, data);
  };
});
