module('Data adapters - Base');
var $ = require('jquery');
var Options = require('select2/options');
var options = new Options({});
  var data = new BaseData($('#qunit-fixture select'), options);
    function () {
      data.current(function () {});
    'current has no default implementation'
  );
});
test('query is required', function (assert) {
  var data = new BaseData($('#qunit-fixture select'), options);
  assert.throws(
    function () {
    },
    'query has no default implementation'
});
