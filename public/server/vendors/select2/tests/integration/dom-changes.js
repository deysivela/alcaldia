module('DOM integration');
  // Any browsers which support mutation observers will not trigger the event
  var expected = 4;
  if (window.MutationObserver) {
    expected = 2;
  } else if (!window.addEventListener) {
    expected = 2;
  }
  assert.expect(expected);
  var syncDone = assert.async();
    asyncDone = assert.async();
  }
  var Options = require('select2/options');
  var Select2 = require('select2/core');
  var $select = $(
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  $('#qunit-fixture').append($select);
  var select = new Select2($select);
  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
    );
      args.data[0].id,
      'The selection changed to something other than One'
    );
    if (expected != 2) {
      asyncDone();
    }
  });
    $select.val(),
    'One'
  );
  var $option = $('<option>Three</option>');
  $select.append($option);
    $select.val(),
    'One'
  );
  syncDone();
test('adding a new selected option changes the value', function (assert) {
  // handle IE 8 not being supported
  var expected = 4;
  if (!window.MutationObserver && !window.addEventListener) {
  }
  var asyncDone = null;
  if (expected != 2) {
    asyncDone = assert.async();
  }
  var $ = require('jquery');
  var Select2 = require('select2/core');
  var $select = $(
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );
  $('#qunit-fixture').append($select);
  var select = new Select2($select);
    assert.equal(
      1,
      'There was more than one selection'
    assert.equal(
      args.data[0].id,
      'Three',
    );
    if (expected != 2) {
      asyncDone();
  });
  assert.equal(
    $select.val(),
    'One'
  );
  var $option = $('<option selected>Three</option>');
  assert.equal(
    'Three'
  syncDone();
});
test('removing an unselected option changes nothing', function (assert) {
  // Any browsers which support mutation observers will not trigger the event
  var expected = 4;
  if (!window.MutationObserver && !window.addEventListener) {
  }
  assert.expect(expected);
  var asyncDone = null;
  var syncDone = assert.async();
  if (expected != 2) {
  }
  var $ = require('jquery');
  var Options = require('select2/options');
  var Select2 = require('select2/core');
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  $('#qunit-fixture').append($select);
  select.on('selection:update', function (args) {
      args.data.length,
      1,
      'There was more than one selection'
    );
      args.data[0].id,
      'One',
    );
    if (expected != 2) {
      asyncDone();
    }
  });
  assert.equal(
    'One'
  $select.children().eq(1).remove();
  assert.equal(
    'One'
  );
  syncDone();
test('removing a selected option changes the value', function (assert) {
  // handle IE 8 not being supported
  var expected = 3;
    expected = 2;
  }
  assert.expect(expected);
  var asyncDone = null;
  var syncDone = assert.async();
  if (expected != 2) {
  }
  var Options = require('select2/options');
  var $select = $(
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );
  var select = new Select2($select);
  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
    );
    if (expected != 2) {
      asyncDone();
    }
  assert.equal(
    $select.val(),
    'One'
  );
  assert.equal(
    'Two'
  );
  syncDone();
});