module('Selection containers - Inline search');
var InlineSearch = require('select2/selection/search');
var $ = require('jquery');
var Utils = require('select2/utils');
var options = new Options({});
test('backspace will remove a choice', function (assert) {
  var KEYS = require('select2/keys');
  var container = new MockContainer();
  var CustomSelection = Utils.Decorate(MultipleSelection, InlineSearch);
  var selection = new CustomSelection($element, options);
  selection.bind(container, $container);
  // The unselect event should be triggered at some point
    assert.ok(true, 'A choice was unselected');
  // Add some selections and render the search
  selection.update([
      id: '1',
      text: 'One'
  ]);
  var $search = $selection.find('input');
  var $choices = $selection.find('.select2-selection__choice');
  assert.equal($search.length, 1, 'The search was visible');
  // Trigger the backspace on the search
  var backspace = $.Event('keydown', {
    which: KEYS.BACKSPACE
  });
  $search.trigger(backspace);
});
test('backspace will set the search text', function (assert) {
  var KEYS = require('select2/keys');
  var $container = $('#qunit-fixture .event-container');
  var CustomSelection = Utils.Decorate(MultipleSelection, InlineSearch);
  var $element = $('#qunit-fixture .multiple');
  var $selection = selection.render();
  selection.bind(container, $container);
  // Add some selections and render the search
  selection.update([
    {
      id: '1',
    }
  ]);
  var $choices = $selection.find('.select2-selection__choice');
  assert.equal($choices.length, 1, 'The choice was rendered');
  // Trigger the backspace on the search
    which: KEYS.BACKSPACE
  $search.trigger(backspace);
  assert.equal($search.val(), 'One', 'The search text was set');
test('updating selection does not shift the focus', function (assert) {
  // Check for IE 8, which triggers a false negative during testing
    // We must expect 0 assertions or the test will fail
    assert.expect(0);
    return;
  }
  var $container = $('#qunit-fixture .event-container');
  var container = new MockContainer();
  var CustomSelection = Utils.Decorate(MultipleSelection, InlineSearch);
  var selection = new CustomSelection($element, options);
  var $selection = selection.render();
  // Update the selection so the search is rendered
  selection.update([]);
  $container.append($selection);
  var $search = $selection.find('input');
  $search.trigger('focus');
  assert.equal($search.length, 1, 'The search was not visible');
  assert.equal(
    $search[0],
    'The search did not have focus originally'
  // Trigger an update, this should redraw the search box
  selection.update([]);
  assert.equal($search.length, 1, 'The search box disappeared');
  assert.equal(
    document.activeElement,
    $search[0],
    'The search did not have focus after the selection was updated'
});
test('the focus event shifts the focus', function (assert) {
  if (window.attachEvent && !window.addEventListener) {
    assert.expect(0);
    return;
  var $container = $('#qunit-fixture .event-container');
  var container = new MockContainer();
  var $element = $('#qunit-fixture .multiple');
  var selection = new CustomSelection($element, options);
  selection.bind(container, $container);
  // Update the selection so the search is rendered
  // Make it visible so the browser can place focus on the search
  $container.append($selection);
  var $search = $selection.find('input');
    document.activeElement,
    $search[0],
    'The search had focus originally'
  );
  assert.equal($search.length, 1, 'The search was not visible');
  container.trigger('focus');
  // Make sure it focuses the search
  assert.equal(
    $search[0],
    'The search did not have focus originally'
  );
});