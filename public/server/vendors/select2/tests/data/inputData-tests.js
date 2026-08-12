module('Data adapters - <input> compatibility');
var Options = require('select2/options');
var ArrayData = require('select2/data/array');
var InputData = require('select2/compat/inputData');
test('test that options can be selected', function (assert) {
  var options = new Options({
      {
        text: 'Test'
      }
    ]
  });
  var $element = $('<input />');
  var adapter = new InputAdapter($element, options);
  adapter.select({
    id: 'test'
  });
  assert.equal(
    'test',
  );
});
test('unselect the single selected option clears the value', function (assert) {
    data: [
      {
        id: 'test',
        text: 'Test',
        selected: true
      }
  });
  var $element = $('<input />');
  var adapter = new InputAdapter($element, options);
  adapter.unselect({
    id: 'test'
  });
  assert.equal(
    $element.val(),
    '',
    'The id should no longer be in the value'
  );
test('options can be unselected individually', function (assert) {
    data: [
      {
        id: 'test',
      },
      {
        id: 'test2',
        text: 'Test2'
      },
      {
        text: 'Test3'
      }
    ]
  });
  var $element = $('<input />');
  $element.val('test,test2,test3');
  var adapter = new InputAdapter($element, options);
  adapter.unselect({
    id: 'test2'
  });
  assert.equal(
    $element.val(),
    'test,test3',
    'The value should contain all the still selected options'
  );
});
test('default values can be set', function (assert) {
  assert.expect(4);
  var options = new Options({
      {
        text: 'Test'
      }
    ]
  var $element = $('<input value="test" />');
  var adapter = new InputAdapter($element, options);
  adapter.current(function (data) {
    assert.equal(
      data.length,
      1,
    );
    var item = data[0];
    assert.equal(item.text, 'Test');
  });
  assert.equal(
    $element.val(),
    'test',
    'The value should not have been altered'
  );
});
test('no default value', function (assert) {
  var options = new Options({
      {
        id: 'test',
        text: 'Test'
      }
    ]
  });
  var adapter = new InputAdapter($element, options);
    assert.equal(
      data.length,
      0,
    );
  });
  assert.equal(
    $element.val(),
    '',
    'The value should not have been altered'
});
