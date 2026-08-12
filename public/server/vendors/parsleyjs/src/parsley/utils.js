import $ from 'jquery';
var pastWarnings = {};
var ParsleyUtils = {
  // returns object from dom attributes and values
  attr: function ($element, namespace, obj) {
    var i;
    var attribute;
    var attributes;
    var regex = new RegExp('^' + namespace, 'i');
    if ('undefined' === typeof obj)
      obj = {};
      // Clear all own properties. This won't affect prototype's values
      for (i in obj) {
        if (obj.hasOwnProperty(i))
          delete obj[i];
      }
    }
    if ('undefined' === typeof $element || 'undefined' === typeof $element[0])
      return obj;
    attributes = $element[0].attributes;
      attribute = attributes[i];
      if (attribute && attribute.specified && regex.test(attribute.name)) {
      }
    }
    return obj;
  checkAttr: function ($element, namespace, checkAttr) {
    return $element.is('[' + namespace + checkAttr + ']');
  },
  setAttr: function ($element, namespace, attr, value) {
  },
  generateID: function () {
  },
  /** Third party functions **/
  // Zepto deserialize function
    var num;
    try {
      return value ?
        (value == "false" ? false :
        value == "null" ? null :
        !isNaN(num = Number(value)) ? num :
        value)
        : value;
    } catch (e) { return value; }
  },
  camelize: function (str) {
    return str.replace(/-+(.)?/g, function (match, chr) {
      return chr ? chr.toUpperCase() : '';
    });
  },
  // Zepto dasherize function
  dasherize: function (str) {
    return str.replace(/::/g, '/')
      .replace(/([A-Z]+)([A-Z][a-z])/g, '$1_$2')
      .replace(/([a-z\d])([A-Z])/g, '$1_$2')
      .replace(/_/g, '-')
  },
  warn: function () {
    if (window.console && 'function' === typeof window.console.warn)
      window.console.warn(...arguments);
  },
  warnOnce: function(msg) {
      pastWarnings[msg] = true;
      this.warn(...arguments);
    }
  },
  _resetWarnings: function () {
    pastWarnings = {};
  },
  trimString: function(string) {
  },
  namespaceEvents: function(events, namespace) {
    events = this.trimString(events || '').split(/\s+/);
    if (!events[0])
    return $.map(events, evt => { return `${evt}.${namespace}`; }).join(' ');
  },
  // Object.create polyfill, see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create#Polyfill
  objectCreate: Object.create || (function () {
    var Object = function () {};
    return function (prototype) {
        throw Error('Second argument not supported');
      }
      if (typeof prototype != 'object') {
      }
      Object.prototype = prototype;
      var result = new Object();
      return result;
    };
  })()
};
export default ParsleyUtils;
