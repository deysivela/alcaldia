module("Dropdown - Stoping event propagation");
var StopPropagation = require("select2/dropdown/stopPropagation");
var $ = require("jquery");
var Utils = require("select2/utils");
var CustomDropdown = Utils.Decorate(Dropdown, StopPropagation);
var options = new Options();
assert.expect(1);
var container = new MockContainer();
var $dropdown = dropdown.render();
dropdown.bind(container, $container);
$container.on("click", function () {
  assert.ok(false, "The click event should have been stopped");
  $dropdown.trigger("click");
});
