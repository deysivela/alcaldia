module('Accessibility - All');
var SingleSelection = require('select2/selection/single');
var MultipleSelection = require('select2/selection/multiple');
var $ = require('jquery');
var options = new Options({});
  var $select = $('#qunit-fixture .single');
  var selection = new BaseSelection($select, options);
  assert.equal(
    $selection.attr('title'),
    'The title should have been copied over from the original element'
  );
test('aria-expanded reflects the state of the container', function (assert) {
  var $select = $('#qunit-fixture .single');
  var selection = new BaseSelection($select, options);
  var $selection = selection.render();
  var container = new MockContainer();
  selection.bind(container, $('<span></span>'));
    $selection.attr('aria-expanded'),
    'false',
  );
  container.trigger('open');
    $selection.attr('aria-expanded'),
    'The container should be expanded when it is opened'
});
test('static aria attributes are present', function (assert) {
  var $select = $('#qunit-fixture .single');
  var selection = new BaseSelection($select, options);
  var $selection = selection.render();
    $selection.attr('role'),
    'The container should identify as a combobox'
  );
  assert.equal(
    $selection.attr('aria-haspopup'),
    'true',
    'The dropdown is considered a popup of the container'
});
test('the container should be in the tab order', function (assert) {
  var selection = new BaseSelection($select, options);
  var $selection = selection.render();
  selection.bind(container, $('<span></span>'));
  assert.equal(
    $selection.attr('tabindex'),
    '0',
    'The tab index should allow it to fit in the natural tab order'
  container.trigger('disable');
  assert.equal(
    $selection.attr('tabindex'),
    '-1',
    'The selection should be dropped out of the tab order when disabled'
  );
  assert.equal(
    $selection.attr('tabindex'),
    'The tab index should be restored when re-enabled'
  );
test('a custom tabindex is copied', function (assert) {
  var $select = $('#qunit-fixture .single');
  var selection = new BaseSelection($select, options);
  var $selection = selection.render();
  var container = new MockContainer();
  selection.bind(container, $('<span></span>'));
  assert.equal(
    '999',
  );
  container.trigger('disable');
  assert.equal(
    $selection.attr('tabindex'),
    '-1',
  );
  assert.equal(
    $selection.attr('tabindex'),
    '999',
    'The tab index should be restored when re-enabled'
  );
});
test('aria-labelledby should match the rendered container', function (assert) {
  var $select = $('#qunit-fixture .single');
  var selection = new SingleSelection($select, options);
  var container = new MockContainer();
  selection.bind(container, $('<span></span>'));
  assert.equal(
    $selection.attr('aria-labelledby'),
    'The rendered selection should label the container'
  );
});
module('Accessibility - Multiple');
