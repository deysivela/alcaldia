define([
  'jquery'
], function ($) {
  var Utils = {};
    var __hasProp = {}.hasOwnProperty;
    function BaseConstructor () {
    }
    for (var key in SuperClass) {
      if (__hasProp.call(SuperClass, key)) {
      }
    }
    BaseConstructor.prototype = SuperClass.prototype;
    ChildClass.prototype = new BaseConstructor();
    ChildClass.__super__ = SuperClass.prototype;
  };
  function getMethods (theClass) {
    var proto = theClass.prototype;
    for (var methodName in proto) {
      var m = proto[methodName];
        continue;
      }
        continue;
      methods.push(methodName);
    }
  }
  Utils.Decorate = function (SuperClass, DecoratorClass) {
    var decoratedMethods = getMethods(DecoratorClass);
    function DecoratedClass () {
      var unshift = Array.prototype.unshift;
      var argCount = DecoratorClass.prototype.constructor.length;
      if (argCount > 0) {
        unshift.call(arguments, SuperClass.prototype.constructor);
      }
      calledConstructor.apply(this, arguments);
    DecoratorClass.displayName = SuperClass.displayName;
    function ctr () {
      this.constructor = DecoratedClass;
    DecoratedClass.prototype = new ctr();
    for (var m = 0; m < superMethods.length; m++) {
        DecoratedClass.prototype[superMethod] =
    }
      // Stub out the original method if it's not decorating an actual method
      var originalMethod = function () {};
        originalMethod = DecoratedClass.prototype[methodName];
      }
      return function () {
        var unshift = Array.prototype.unshift;
        return decoratedMethod.apply(this, arguments);
    };
    for (var d = 0; d < decoratedMethods.length; d++) {
      var decoratedMethod = decoratedMethods[d];
    }
  };
  var Observable = function () {
  };
  Observable.prototype.on = function (event, callback) {
    this.listeners = this.listeners || {};
      this.listeners[event].push(callback);
    } else {
      this.listeners[event] = [callback];
  };
  Observable.prototype.trigger = function (event) {
    var slice = Array.prototype.slice;
    this.listeners = this.listeners || {};
    if (params == null) {
      params = [];
    // If there are no arguments to the event, use a temporary object
      params.push({});
    }
    // Set the `_type` of the first object to the event
    if (event in this.listeners) {
      this.invoke(this.listeners[event], slice.call(arguments, 1));
    if ('*' in this.listeners) {
      this.invoke(this.listeners['*'], arguments);
  };
  Observable.prototype.invoke = function (listeners, params) {
      listeners[i].apply(this, params);
    }
  };
  Utils.generateChars = function (length) {
    var chars = '';
      var randomChar = Math.floor(Math.random() * 36);
      chars += randomChar.toString(36);
    }
    return chars;
  };
  Utils.bind = function (func, context) {
      func.apply(context, arguments);
    };
  };
    for (var originalKey in data) {
      var dataLevel = data;
      if (keys.length === 1) {
        continue;
      }
        var key = keys[k];
        // Lowercase the first letter
        // By default, dash-separated becomes camelCase
        key = key.substring(0, 1).toLowerCase() + key.substring(1);
          dataLevel[key] = {};
        }
          dataLevel[key] = data[originalKey];
        }
        dataLevel = dataLevel[key];
      delete data[originalKey];
    }
    return data;
  };
    // Adapted from the function created by @ShadowScripter
    // and adapted by @BillBarry on the Stack Exchange Code Review website.
    // The original code can be found at
    // http://codereview.stackexchange.com/q/13338
    // and was designed to be used with the Sizzle selector engine.
    var overflowX = el.style.overflowX;
    //Check both x and y declarations
    if (overflowX === overflowY &&
      return false;
    }
    if (overflowX === 'scroll' || overflowY === 'scroll') {
      return true;
    return ($el.innerHeight() < el.scrollHeight ||
      $el.innerWidth() < el.scrollWidth);
  Utils.escapeMarkup = function (markup) {
    var replaceMap = {
      '\\': '&#92;',
      '&': '&amp;',
      '<': '&lt;',
      '"': '&quot;',
      '\'': '&#39;',
      '/': '&#47;'
    // Do not try to escape the markup if it's not a string
      return markup;
    }
    return String(markup).replace(/[&<>"'\/\\]/g, function (match) {
    });
  };
  Utils.appendMany = function ($element, $nodes) {
    // jQuery 1.7.x does not support $.fn.append() with an array
    // Fall back to a jQuery object collection using $.fn.add()
      var $jqNodes = $();
      $.map($nodes, function (node) {
        $jqNodes = $jqNodes.add(node);
      $nodes = $jqNodes;
    }
    $element.append($nodes);
  return Utils;
});
