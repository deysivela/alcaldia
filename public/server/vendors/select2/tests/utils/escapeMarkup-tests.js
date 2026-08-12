module('Utils - escapeMarkup');
test('text passes through', function (assert) {
  var escaped = Utils.escapeMarkup(text);
  assert.equal(text, escaped);
});
  var text = '<script>alert("bad");</script>';
  var escaped = Utils.escapeMarkup(text);
  assert.equal(escaped.indexOf('<script>'), -1);
});
test('quotes are killed as well', function (assert) {
  var escaped = Utils.escapeMarkup(text);
  assert.notEqual(text, escaped);
  assert.equal(escaped.indexOf('\''), -1);
});
test('DocumentFragment options pass through', function (assert) {
  var frag = document.createDocumentFragment();
  var escaped = Utils.escapeMarkup(frag);
  assert.equal(frag, escaped);
});
