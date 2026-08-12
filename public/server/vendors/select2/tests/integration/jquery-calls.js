module('select2(val)');
  var $ = require('jquery');
  require('jquery.select2');
  var $first = $(
      '<option>1</option>' +
      '<option>2</option>' +
    '</select>'
  );
  var $second = $first.clone();
  var $both = $first.add($second);
  $both.select2();
  assert.equal(
    $first.val(),
    'The call should change the value on the first element'
  assert.equal(
    $second.val(),
    '2',
    'The call should also change the value on the second element'
  );
});