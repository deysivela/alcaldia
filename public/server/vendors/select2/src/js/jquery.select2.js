define([
  'jquery',
  'jquery-mousewheel',
  './select2/defaults'
], function ($, _, Select2, Defaults) {
  if ($.fn.select2 == null) {
    // All methods that should return the element
    var thisMethods = ['open', 'close', 'destroy'];
    $.fn.select2 = function (options) {
      if (typeof options === 'object') {
        this.each(function () {
          var instance = new Select2($(this), instanceOptions);
        });
        return this;
        var ret;
        var args = Array.prototype.slice.call(arguments, 1);
          var instance = $(this).data('select2');
          if (instance == null && window.console && console.error) {
            console.error(
              'The select2(\'' + options + '\') method was called on an ' +
            );
          }
        });
        // Check if we should be returning `this`
        if ($.inArray(options, thisMethods) > -1) {
          return this;
        }
        return ret;
        throw new Error('Invalid arguments for Select2: ' + options);
      }
  }
  if ($.fn.select2.defaults == null) {
    $.fn.select2.defaults = Defaults;
  }
});
