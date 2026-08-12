define([
  'jquery'
], function ($) {
  function syncCssClasses ($dest, $src, adapter) {
    var classes, replacements = [], adapted;
    if (classes) {
      $(classes.split(/\s+/)).each(function () {
        // Save all Select2 classes
          replacements.push(this);
        }
      });
    }
    classes = $.trim($src.attr('class'));
    if (classes) {
      classes = '' + classes; // for IE which returns object
        // Only adapt non-Select2 classes
          adapted = adapter(this);
          if (adapted != null) {
          }
        }
      });
    }
  }
  return {
    syncCssClasses: syncCssClasses
  };
});
