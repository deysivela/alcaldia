module('Selection containers - Multiple');
var $ = require('jquery');
var Utils = require('select2/utils');
var options = new Options({});
test('display uses templateSelection', function (assert) {
  var templateOptions = new Options({
      called = true;
      return data.text;
  });
  var selection = new MultipleSelection(
    $('#qunit-fixture .multiple'),
  );
  var out = selection.display({
    text: 'test'
  assert.ok(called);
  assert.equal(out, 'test');
});
test('templateSelection can addClass', function (assert) {
  var templateOptions = new Options({
    templateSelection: function (data, container) {
      called = true;
      return data.text;
  });
  var selection = new MultipleSelection(
    templateOptions
  );
  var out = selection.display({
    text: 'test'
  }, $container);
  assert.ok(called);
  assert.equal(out, 'test');
  assert.ok($container.hasClass('testclass'));
});
  var selection = new MultipleSelection(
    $('#qunit-fixture .multiple'),
    options
  );
  var $rendered = $selection.find('.select2-selection__rendered');
  selection.update([]);
  assert.equal($rendered.text(), '');
});
  var selection = new MultipleSelection(
    options
  var $selection = selection.render();
  var $rendered = $selection.find('.select2-selection__rendered');
  selection.update([{
    text: unescapedText
  }]);
  assert.equal(
    $rendered.text().substr(1),
    'The text should be escaped by default to prevent injection'
  );
test('clear button respects the disabled state', function (assert) {
    disabled: true
  var $select = $('#qunit-fixture .multiple');
  var container = new MockContainer();
  var selection = new MultipleSelection(
    $select,
    options
  );
  var $selection = selection.render();
  selection.bind(container, $container);
  // Select an option
    text: 'Test'
  var $rendered = $selection.find('.select2-selection__rendered');
  var $pill = $rendered.find('.select2-selection__choice');
  assert.equal($pill.length, 1, 'There should only be one selection');
  assert.equal(
    $remove.length,
    1,
    'The remove icon is displayed for the selection'
  );
  // Set up the unselect handler
    assert.ok(false, 'The unselect handler should not be triggered');
  });
  // Trigger the handler for the remove icon
  $remove.trigger('click');
