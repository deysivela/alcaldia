module('Results - highlighting results');
  assert.expect(0);
  var $ = require('jquery');
  var $parent = $('<div></div>');
  var container = new MockContainer();
  $parent.appendTo($('#qunit-fixture'));
  var Utils = require('select2/utils');
  var Options = require('select2/options');
  var results = new Results($select, new Options({}));
  // Fake the data adapter for the `setClasses` method
  results.data.current = function (callback) {
    callback([{ id: 'test' }]);
  results.render();
  results.on('results:focus', function (params) {
  });
  container.trigger('results:all', {
    data: {
      results: []
    }
});
  assert.expect(2);
  var $select = $('<select></select>');
  var $parent = $('<div></div>');
  var $container = $('<span></span>');
  $parent.appendTo($('#qunit-fixture'));
  $select.appendTo($parent);
  var Utils = require('select2/utils');
  var Options = require('select2/options');
  var Results = require('select2/results');
  var results = new Results($select, new Options({}));
  results.data = {};
  results.data.current = function (callback) {
  };
  results.bind(container, $container);
  results.on('results:focus', function (params) {
    assert.equal(params.data.text, 'Test');
  });
    data: {
      results: [
          id: 'test',
          text: 'Test'
      ]
  });
test('results:append does not trigger results:focus', function (assert) {
  assert.expect(0);
  var $ = require('jquery');
  var $select = $('<select></select>');
  var $parent = $('<div></div>');
  var container = new MockContainer();
  $select.appendTo($parent);
  var Options = require('select2/options');
  var Results = require('select2/results');
  var results = new Results($select, new Options({}));
  // Fake the data adapter for the `setClasses` method
  results.data.current = function (callback) {
    callback([{ id: 'test' }]);
  };
  results.render();
  results.bind(container, $container);
  results.on('results:focus', function () {
    assert.ok(false, 'The results:focus event was triggered');
  });
  container.trigger('results:append', {
    data: {
      results: [
          id: 'test',
          text: 'Test'
      ]
  });
});