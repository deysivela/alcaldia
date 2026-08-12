module('Data adapters - Array');
var $ = require('jquery');
var Options = require('select2/options');
var arrayOptions = new Options({
    {
      id: 'default',
      text: 'Default'
    },
    {
      id: '1',
      text: 'One'
    },
    {
      id: '2',
      text: '2'
    }
  ]
});
var extraOptions = new Options ({
  data: [
      id: 'default',
      text: 'Default',
      extra: true
    },
    {
      id: 'One',
      text: 'One',
      extra: true
    }
  ]
});
var nestedOptions = new Options({
  data: [
    {
      children: [
        {
          text: 'Next',
          children: [
            {
              id: 'a',
              text: 'Option'
            }
          ]
        }
      ]
    }
  ]
});
test('current gets default for single', function (assert) {
  var $select = $('#qunit-fixture .single-empty');
  var data = new ArrayData($select, arrayOptions);
  data.current(function (val) {
      val.length,
      1,
    );
    assert.equal(
      item.id,
      'default',
      'The first item should be selected'
    );
  });
test('current gets default for multiple', function (assert) {
  var data = new ArrayData($select, arrayOptions);
  data.current(function (val) {
    assert.equal(
      val.length,
      0,
      'There should be no default selection.'
    );
});
test('current works with existing selections', function (assert) {
  var data = new ArrayData($select, arrayOptions);
  data.current(function (val) {
    assert.equal(
      val.length,
      1,
      'There should only be one existing selection.'
    );
    var option = val[0];
    assert.equal(
      'One',
      'The id should be equal to the value of the option tag.'
    assert.equal(
      'One',
    );
  });
});
test('current works with selected data', function (assert) {
  var $select = $('#qunit-fixture .single-empty');
  var data = new ArrayData($select, arrayOptions);
    id: '2',
  });
  data.current(function (val) {
    assert.equal(
      val.length,
      1,
    );
    var option = val[0];
    assert.equal(
      option.id,
      '2',
      'The id should match the original id from the array.'
    );
      option.text,
      '2',
    );
});
test('select works for single', function (assert) {
  var $select = $('#qunit-fixture .single-empty');
  var data = new ArrayData($select, arrayOptions);
    $select.val(),
    'default',
    'There should already be a selection'
  );
  data.select({
    id: '1',
  });
    $select.val(),
    '1',
    'The selected value should be the same as the selected id'
  );
});
  var $select = $('#qunit-fixture .multiple');
  var data = new ArrayData($select, arrayOptions);
  assert.equal($select.val(), null);
  data.select({
    id: 'default',
    text: 'Default'
  });
});
test('multiple adds to the old value', function (assert) {
  var data = new ArrayData($select, arrayOptions);
  assert.deepEqual($select.val(), ['One']);
  data.select({
    id: 'default',
    text: 'Default'
  });
});
test('option tags are automatically generated', function (assert) {
  var $select = $('#qunit-fixture .single-empty');
  var data = new ArrayData($select, arrayOptions);
    $select.find('option').length,
    3,
    'An <option> element should be created for each object'
  );
});
test('option tags can receive new data', function(assert) {
  var data = new ArrayData($select, extraOptions);
  assert.equal(
    2,
  );
    id: 'default'
  });
  assert.ok(
    $select.find(':selected').data('data').extra,
  );
  data.select({
  });
  assert.ok(
    '<option> One should have new data'
});
  var $select = $('#qunit-fixture .single-empty');
  assert.equal(
    $select.find('option').length,
    1,
    'An <option> element should be created for the one selectable object'
  assert.equal(
    $select.find('optgroup').length,
    'An <optgroup> element should be created for the two with children'
  );
test('optgroup tags have the right properties', function (assert) {
  var data = new ArrayData($select, nestedOptions);
  var $group = $select.children('optgroup');
  assert.equal(
    $group.prop('label'),
    'Default',
    'An `<optgroup>` label should match the text property'
  assert.equal(
    $group.children().length,
    'The <optgroup> should have one child under it'
});
test('existing selections are respected on initialization', function (assert) {
   var $select = $(
     '<select>' +
        '<option>First</option>' +
      '</select>'
    );
    var options = new Options({
        {
          id: 'Second',
          text: 'Second'
        },
          id: 'Third',
          text: 'Third'
        }
    });
    assert.equal($select.val(), 'Second');
    var data = new ArrayData($select, options);
    assert.equal($select.val(), 'Second');
});