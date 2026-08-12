module('Options - Attributes');
var Options = require('select2/options');
  var $test = $('<select data-test="test"></select>');
  assert.equal(options.get('test'), 'test');
});
  var $test = $('<select data-first--second="test"></select>');
    assert.ok(
      true,
    );
    return;
  var options = new Options({}, $test);
  assert.ok(!(options.get('first-Second')));
  assert.equal(options.get('first').second, 'test');
});
test('overrides initialized data', function (assert) {
  var options = new Options({
    options: 'yes',
  }, $test);
  assert.equal(options.get('override'), 'yes');
  assert.equal(options.get('data'), 'yes');
});
