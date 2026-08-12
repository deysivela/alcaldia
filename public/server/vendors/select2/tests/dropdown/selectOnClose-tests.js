module('Dropdown - selectOnClose');
var Utils = require('select2/utils');
var SelectData = require('select2/data/select');
var Results = require('select2/results');
var ModifiedResults = Utils.Decorate(Results, SelectOnClose);
  selectOnClose: true
});
  assert.expect(0);
  var select = new ModifiedResults($element, options, new SelectData($element));
  var $dropdown = select.render();
  var container = new MockContainer();
  select.on('select', function () {
    assert.ok(false, 'The select event should not have been triggered');
  container.trigger('close');
});
  assert.expect(1);
  var select = new ModifiedResults($element, options, new SelectData($element));
  var $dropdown = select.render();
  select.bind(container, $('<div></div>'));
  select.on('select', function () {
    assert.ok(false, 'The select event should not have been triggered');
  select.append({
    results: []
  assert.equal(
    $dropdown.find('li').length,
    'There should not be any results in the dropdown'
  );
});
  assert.expect(2);
  var $element = $('<select></select>');
  var $dropdown = select.render();
  var container = new MockContainer();
  select.bind(container, $('<div></div>'));
    assert.ok(false, 'The select event should not have been triggered');
  });
  select.append({
      {
        id: '1',
        text: 'Test'
      }
    ]
  assert.equal(
    $dropdown.find('li').length,
    'There should be one result in the dropdown'
  );
    $.trim($dropdown.find('li').text()),
    'Test',
  );
});
test('will trigger if there is a highlighted result', function (assert) {
  var $element = $('<select></select>');
  var select = new ModifiedResults($element, options, new SelectData($element));
  var $dropdown = select.render();
  select.bind(container, $('<div></div>'));
  select.on('select', function () {
    assert.ok(true, 'The select event should have been triggered');
  });
  select.append({
    results: [
      {
        id: '1',
      }
    ]
  });
  assert.equal(
    $dropdown.find('li').length,
    'There should be one result in the dropdown'
  );
  $dropdown.find('li').addClass('select2-results__option--highlighted');
  container.trigger('close');
});
