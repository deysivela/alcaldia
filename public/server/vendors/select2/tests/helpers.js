// Restore the require/define
var require = $.fn.select2.amd.require;
var define = $.fn.select2.amd.define;
jQuery.noConflict();
var Utils = require('select2/utils');
  MockContainer.__super__.constructor.call(this);
Utils.Extend(MockContainer, Utils.Observable);
MockContainer.prototype.isOpen = function () {
  return this.isOpen;
var log = [];
QUnit.done(function (test_results) {
  var tests = [];
  for(var i = 0, len = log.length; i < len; i++) {
    tests.push({
      name: details.name,
      expected: details.expected,
      actual: details.actual,
      source: details.source
    });
  }
  test_results.tests = tests;
  window.global_test_results = test_results;
});
QUnit.testStart(function(testDetails){
  QUnit.log(function(details){
    if (!details.result) {
      details.name = testDetails.name;
      log.push(details);
  });
});
