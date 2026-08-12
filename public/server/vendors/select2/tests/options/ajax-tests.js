module('Defaults - Ajax');
  var defaults = require('select2/defaults');
  var ajaxDelay = 250;
  var mergedOptions;
  defaults.set('ajax--delay', ajaxDelay);
    ajax: {
    }
  assert.equal(
    mergedOptions.ajax.delay,
    ajaxDelay,
    'Ajax default options are present on the merged options'
  );
    mergedOptions.ajax.url,
    ajaxUrl,
    'Ajax provided options are present on the merged options'
  );
  defaults.reset();
