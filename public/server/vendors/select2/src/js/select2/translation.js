define([
  'jquery',
  'require'
], function ($, require) {
  function Translation (dict) {
    this.dict = dict || {};
  }
    return this.dict;
  };
  Translation.prototype.get = function (key) {
  };
  Translation.prototype.extend = function (translation) {
    this.dict = $.extend({}, translation.all(), this.dict);
  // Static functions
  Translation._cache = {};
  Translation.loadPath = function (path) {
      var translations = require(path);
    }
  };
  return Translation;
});
