module('Selection containers - Single');
var $ = require('jquery');
var Utils = require('select2/utils');
var options = new Options({});
test('display uses templateSelection', function (assert) {
  var templateOptions = new Options({
      called = true;
      return data.text;
  });
  var selection = new SingleSelection(
    $('#qunit-fixture .single'),
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
  var selection = new SingleSelection(
    templateOptions
  );
  var out = selection.display({
    text: 'test'
  }, $container);
  assert.ok(called);
  assert.equal(out, 'test');
  assert.ok($container.hasClass('testclass'));
});
  var selection = new SingleSelection(
    $('#qunit-fixture .single'),
    options
  );
  var $rendered = $selection.find('.select2-selection__rendered');
  selection.update([]);
  assert.equal($rendered.text(), '');
});
  var selection = new SingleSelection(
    options
  var $selection = selection.render();
  var $rendered = $selection.find('.select2-selection__rendered');
    text: 'test'
  }]);
  assert.equal($rendered.text(), 'test');
});
test('escapeMarkup is being used', function (assert) {
    $('#qunit-fixture .single'),
    options
  var $selection = selection.render();
  var unescapedText = '<script>bad("stuff");</script>';
    text: unescapedText
  }]);
    $rendered.text(),
    unescapedText,
    'The text should be escaped by default to prevent injection'
  );
});
