module('Data adapters - Maximum selection length');
var $ = require('jquery');
var Utils = require('select2/utils');
function MaximumSelectionStub () {
  this.called = false;
}
MaximumSelectionStub.prototype.current = function (callback) {
  callback(this.currentData);
};
  this.currentData.push(val);
};
MaximumSelectionStub.prototype.query = function (params, callback) {
};
var MaximumSelectionData = Utils.Decorate(
  MaximumSelectionStub,
);
test('0 never displays the notice', function (assert) {
  var zeroOptions = new Options({
  });
  var data = new MaximumSelectionData(null, zeroOptions);
  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  data.query({
    term: ''
  });
  assert.ok(data.called);
  data.trigger = function () {
  };
  data.val('1');
  data.query({
  });
  assert.ok(data.called);
  data = new MaximumSelectionData(null, zeroOptions);
    assert.ok(false, 'No events should be triggered');
  data.val('1');
  data.query({
    term: ''
  });
});
  var negativeOptions = new Options({
    maximumSelectionLength: -1
  });
  data.trigger = function () {
  };
    term: ''
  });
  assert.ok(data.called);
  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  data.val('1');
  data.query({
    term: ''
  assert.ok(data.called);
  data = new MaximumSelectionData(null, negativeOptions);
    assert.ok(false, 'No events should be triggered');
  };
  data.val('1');
  data.val('2');
    term: ''
  assert.ok(data.called);
});
test('triggers when >= 1 selection' , function (assert) {
    maximumSelectionLength: 1
  });
  var data = new MaximumSelectionData(null, maxOfOneOptions);
    assert.ok(false, 'No events should be triggered');
  data.query({
  });
  assert.ok(data.called);
  data = new MaximumSelectionData(null, maxOfOneOptions);
    assert.ok(true, 'The event should be triggered.');
  data.val('1');
  data.query({
    term: ''
  assert.ok(!data.called);
test('triggers when >= 2 selections' , function (assert) {
    maximumSelectionLength: 2
  });
  var data = new MaximumSelectionData(null, maxOfTwoOptions);
    assert.ok(false, 'No events should be triggered');
  };
    term: ''
  });
  assert.ok(data.called);
  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  data.val('1');
  data.query({
    term: ''
  });
  assert.ok(data.called);
  data.trigger = function () {
    assert.ok(true, 'The event should be triggered.');
  };
  data.val('2');
  data.query({
    term: ''
  assert.ok(!data.called);
