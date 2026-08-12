module('Selection containers - Placeholders');
var SingleSelection = require('select2/selection/single');
var $ = require('jquery');
var Utils = require('select2/utils');
var SinglePlaceholder = Utils.Decorate(SingleSelection, Placeholder);
var placeholderOptions = new Options({
    id: 'placeholder',
  }
});
test('normalizing placeholder ignores objects', function (assert) {
  var selection = new SinglePlaceholder(
    $('#qunit-fixture .single'),
    placeholderOptions
  var original = {
    id: 'test',
    text: 'testing'
  };
  var normalized = selection.normalizePlaceholder(original);
});
test('normalizing placeholder gives object for string', function (assert) {
  var selection = new SinglePlaceholder(
    $('#qunit-fixture .single'),
  );
  assert.equal(normalized.id, '');
  assert.equal(normalized.text, 'placeholder');
test('text is shown for placeholder option on single', function (assert) {
  var selection = new SinglePlaceholder(
    $('#qunit-fixture .single'),
    placeholderOptions
  );
  selection.update([{
  }]);
  assert.equal($selection.text(), 'This is the placeholder');
});
    $('#qunit-fixture .multiple'),
    placeholderOptions
  );
  var $selection = selection.render();
  selection.update([]);
});
