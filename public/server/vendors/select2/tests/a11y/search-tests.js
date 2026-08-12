module('Accessibility - Search');
var InlineSearch = require('select2/selection/search');
var $ = require('jquery');
var Options = require('select2/options');
test('aria-autocomplete attribute is present', function (assert) {
  var $select = $('#qunit-fixture .multiple');
  var CustomSelection = Utils.Decorate(MultipleSelection, InlineSearch);
  var $selection = selection.render();
  // Update the selection so the search is rendered
  assert.equal(
    $selection.find('input').attr('aria-autocomplete'),
    'list',
  );
});
  var $select = $('#qunit-fixture .multiple');
  var CustomSelection = Utils.Decorate(MultipleSelection, InlineSearch);
  var selection = new CustomSelection($select, options);
  var $selection = selection.render();
  var container = new MockContainer();
  selection.bind(container, $('<span></span>'));
  selection.update([]);
  var $search = $selection.find('input');
  container.trigger('close');
  assert.ok(
    !$search.attr('aria-activedescendant'),
  );
});
