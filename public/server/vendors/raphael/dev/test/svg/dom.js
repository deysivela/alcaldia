(function() {
    url = 'http://raphaeljs.com';
module('DOM', {
    paper = new Raphael(document.getElementById('qunit-fixture'), 1000, 1000);
  },
  teardown: function() {
    paper.remove();
  }
});
var equalNodePosition = function(node, expectedParent, expectedPreviousSibling, expectedNextSibling) {
  equal(node.parentNode, expectedParent);
  equal(node.nextSibling, expectedNextSibling);
};
var equalNodePositionWrapped = function(node, anchor, expectedParent, expectedPreviousSibling, expectedNextSibling) {
  equal(node.parentNode, anchor);
  equalNodePosition(anchor, expectedParent, expectedPreviousSibling, expectedNextSibling);
// Element#insertBefore
// --------------------
test('insertBefore: no element', function() {
  var el = paper.rect();
  equalNodePosition(el.node, paper.canvas, paper.defs, null);
});
  var x = paper.rect();
  var el = paper.rect();
  equalNodePosition(el.node, paper.canvas, paper.defs, x.node);
test('insertBefore: middle element', function() {
  var x = paper.rect();
  var el = paper.rect();
  el.insertBefore(y);
  equalNodePosition(el.node, paper.canvas, x.node, y.node);
test('insertBefore: no element when wrapped in <a>', function() {
      anchor = el.node.parentNode;
  el.insertBefore(null);
});
test('insertBefore: first element when wrapped in <a>', function() {
  var x = paper.rect();
  var el = paper.rect().attr('href', url),
  el.insertBefore(x);
});
test('insertBefore: first element wrapped in <a> and wrapped in <a>', function() {
      xAnchor = x.node.parentNode;
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  equalNodePositionWrapped(el.node, anchor, paper.canvas, paper.defs, xAnchor);
test('insertBefore: middle element when wrapped in <a>', function() {
  var x = paper.rect();
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  el.insertBefore(y);
  equalNodePositionWrapped(el.node, anchor, paper.canvas, x.node, y.node);
test('insertBefore: middle element wrapped in <a> and wrapped in <a>', function() {
      xAnchor = x.node.parentNode;
  var y = paper.rect().attr('href', url),
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  el.insertBefore(y);
  equalNodePositionWrapped(el.node, anchor, paper.canvas, xAnchor, yAnchor);
});
// insertBefore: with set
// Element#insertAfter
// -------------------
  var el = paper.rect();
  el.insertAfter(null);
  equalNodePosition(el.node, paper.canvas, paper.defs, null);
});
test('insertAfter: last element', function() {
  var el = paper.rect();
  equalNodePosition(el.node, paper.canvas, x.node, null);
});
  var x = paper.rect();
  var y = paper.rect();
  var el = paper.rect();
  el.insertAfter(x);
  equalNodePosition(el.node, paper.canvas, x.node, y.node);
});
test('insertAfter: no element when wrapped in <a>', function() {
      anchor = el.node.parentNode;
  equalNodePositionWrapped(el.node, anchor, paper.canvas, paper.defs, null);
});
  var x = paper.rect();
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  equalNodePositionWrapped(el.node, anchor, paper.canvas, x.node, null);
});
  var x = paper.rect().attr('href', url),
      xAnchor = x.node.parentNode;
      anchor = el.node.parentNode;
  equalNodePositionWrapped(el.node, anchor, paper.canvas, xAnchor, null);
});
  var x = paper.rect();
  var y = paper.rect();
  var el = paper.rect().attr('href', url),
  el.insertAfter(x);
});
test('insertAfter: middle element wrapped in <a> and wrapped in <a>', function() {
      xAnchor = x.node.parentNode;
  var y = paper.rect().attr('href', url),
      yAnchor = y.node.parentNode;
  var el = paper.rect().attr('href', url),
  el.insertAfter(x);
});
// TODO...
// insertAfter: with nested set.
// Element#remove
// --------------
  var el = paper.rect(),
  el.remove();
  equal(el.node, null);
});
test('remove: when wrapped in <a>', function() {
  var el = paper.rect().attr('href', url),
      node = el.node,
  el.remove();
  equal(node.parentNode, anchor);
  equal(anchor.parentNode, null);
test('remove: when already removed', function() {
  var el = paper.rect(),
      node = el.node;
  el.remove();
  el.remove();
  equal(node.parentNode, null);
test('remove: when the canvas is removed', function() {
  var el = paper.rect(),
  paper.remove();
  el.remove();
  equal(el.node, null);
  equal(node.parentNode, null);
});
// --------------
  var el = paper.rect();
  var x = paper.rect();
  equalNodePosition(el.node, paper.canvas, x.node, null);
});
test('toFront: when wrapped in <a>', function() {
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  var x = paper.rect();
  el.toFront();
});
// --------------
test('toBack: normal', function() {
  var el = paper.rect();
  el.toBack();
  equalNodePosition(el.node, paper.canvas, null, paper.desc);
});
test('toBack: when wrapped in <a>', function() {
  var el = paper.rect().attr('href', url),
      anchor = el.node.parentNode;
  el.toBack();
  equalNodePosition(x.node, paper.canvas, paper.defs, null);
})();