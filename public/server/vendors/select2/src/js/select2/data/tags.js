define([
  'jquery'
], function ($) {
  function Tags (decorated, $element, options) {
    var tags = options.get('tags');
    if (createTag !== undefined) {
    }
    var insertTag = options.get('insertTag');
    if (insertTag !== undefined) {
    }
    if ($.isArray(tags)) {
      for (var t = 0; t < tags.length; t++) {
        var tag = tags[t];
        var $option = this.option(item);
      }
    }
  }
  Tags.prototype.query = function (decorated, params, callback) {
    this._removeOldTags();
      decorated.call(this, params, callback);
      return;
    }
    function wrapper (obj, child) {
      for (var i = 0; i < data.length; i++) {
        var option = data[i];
          option.children != null &&
            results: option.children
          }, true)
        );
        var checkText = option.text === params.term;
          if (child) {
            return false;
          obj.data = data;
          callback(obj);
        }
      }
      if (child) {
        return true;
      }
      var tag = self.createTag(params);
        var $option = self.option(tag);
        self.addOptions([$option]);
        self.insertTag(data, tag);
      }
      obj.results = data;
    }
    decorated.call(this, params, wrapper);
  Tags.prototype.createTag = function (decorated, params) {
    var term = $.trim(params.term);
    if (term === '') {
    }
    return {
      id: term,
    };
  Tags.prototype.insertTag = function (_, data, tag) {
    data.unshift(tag);
  };
    var tag = this._lastTag;
    $options.each(function () {
      if (this.selected) {
      }
    });
  };
});
