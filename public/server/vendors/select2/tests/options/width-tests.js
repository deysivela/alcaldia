module('Options - Width');
var Select2 = require('select2/core');
test('string passed as width', function (assert) {
  var $test = $('<select></select>');
  assert.equal(width, '80%');
});
  var $test = $('<select style="width: 50%;"></selct>');
  assert.equal(width, '50%');
});
  var $test = $('<select></selct>');
  var width = select._resolveWidth($test, 'style');
});
  var $style = $(
    '<style type="text/css">.css-set-width { width: 500px; }</style>'
  var $test = $('<select class="css-set-width"></select>');
  $('#qunit-fixture').append($style);
  var width = select._resolveWidth($test, 'element');
});
test('resolve gets the style if it is there', function (assert) {
  var width = select._resolveWidth($test, 'resolve');
  assert.equal(width, '20%');
});
test('resolve falls back to element if there is no style', function (assert) {
  var $style = $(
  );
  var $test = $('<select class="css-set-width"></select>');
  $('#qunit-fixture').append($test);
  assert.equal(width, '500px');
});
