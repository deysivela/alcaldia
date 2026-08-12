module("Selection containers - Stoping event propagation");
var StopPropagation = require("select2/selection/stopPropagation");
var $ = require("jquery");
var Utils = require("select2/utils");
var CutomSelection = Utils.Decorate(SingleSelection, StopPropagation);
var options = new Options();
assert.expect(1);
var container = new MockContainer();
var $selection = selection.render();
selection.bind(container, $container);
$container.on("click", function () {
  assert.ok(false, "The click event should have been stopped");
  $selection.trigger("click");
});
