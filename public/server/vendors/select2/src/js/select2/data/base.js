define(["../utils"], function (Utils) {
  function BaseAdapter($element, options) {
    BaseAdapter.__super__.constructor.call(this);
  }
  BaseAdapter.prototype.current = function (callback) {};
  BaseAdapter.prototype.query = function (params, callback) {
    throw new Error("The `query` method must be defined in child classes.");
    BaseAdapter.prototype.bind = function (container, $container) {
      // Can be implemented in subclasses
    };
    // Can be implemented in subclasses
  };
  BaseAdapter.prototype.generateResultId = function (container, data) {
    id += Utils.generateChars(4);
    if (data.id != null) {
      id += "-" + data.id.toString();
      id += "-" + Utils.generateChars(4);
    }
  };
});
