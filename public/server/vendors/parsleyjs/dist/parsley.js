/*!
* Parsley.js
* Version 2.3.13 - built Tue, May 31st 2016, 8:55 am
* http://parsleyjs.org
* Guillaume Potier - <guillaume@wisembly.com>
* Marc-Andre Lafortune - <petroselinum@marc-andre.ca>
* MIT Licensed
*/
// Parsley is written in ECMAScript 6
//
var _slice = Array.prototype.slice;
function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i]; return arr2; } else { return Array.from(arr); } }
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('jquery')) : typeof define === 'function' && define.amd ? define(['jquery'], factory) : global.parsley = factory(global.jQuery);
  'use strict';
  var globalID = 1;
  var pastWarnings = {};
  var ParsleyUtils__ParsleyUtils = {
    // returns object from dom attributes and values
    attr: function attr($element, namespace, obj) {
      var attribute;
      var attributes;
      var regex = new RegExp('^' + namespace, 'i');
      if ('undefined' === typeof obj) obj = {};else {
        // Clear all own properties. This won't affect prototype's values
        for (i in obj) {
          if (obj.hasOwnProperty(i)) delete obj[i];
        }
      if ('undefined' === typeof $element || 'undefined' === typeof $element[0]) return obj;
      attributes = $element[0].attributes;
      for (i = attributes.length; i--;) {
        attribute = attributes[i];
        if (attribute && attribute.specified && regex.test(attribute.name)) {
          obj[this.camelize(attribute.name.slice(namespace.length))] = this.deserializeValue(attribute.value);
      }
    },
    checkAttr: function checkAttr($element, namespace, _checkAttr) {
      return $element.is('[' + namespace + _checkAttr + ']');
    setAttr: function setAttr($element, namespace, attr, value) {
      $element[0].setAttribute(this.dasherize(namespace + attr), String(value));
    },
    generateID: function generateID() {
    },
    /** Third party functions **/
    deserializeValue: function deserializeValue(value) {
      var num;
      try {
      } catch (e) {
        return value;
      }
    // Zepto camelize function
    camelize: function camelize(str) {
      return str.replace(/-+(.)?/g, function (match, chr) {
      });
    },
    // Zepto dasherize function
    dasherize: function dasherize(str) {
    },
    warn: function warn() {
      var _window$console;
      if (window.console && 'function' === typeof window.console.warn) (_window$console = window.console).warn.apply(_window$console, arguments);
    },
    warnOnce: function warnOnce(msg) {
        pastWarnings[msg] = true;
        this.warn.apply(this, arguments);
      }
    },
    _resetWarnings: function _resetWarnings() {
      pastWarnings = {};
    trimString: function trimString(string) {
      return string.replace(/^\s+|\s+$/g, '');
    },
    namespaceEvents: function namespaceEvents(events, namespace) {
      if (!events[0]) return '';
      return $.map(events, function (evt) {
      }).join(' ');
    },
    objectCreate: Object.create || (function () {
      var Object = function Object() {};
      return function (prototype) {
        if (arguments.length > 1) {
          throw Error('Second argument not supported');
        }
          throw TypeError('Argument must be an object');
        }
        Object.prototype = prototype;
        Object.prototype = null;
        return result;
      };
  };
  var ParsleyUtils__default = ParsleyUtils__ParsleyUtils;
  // All these options could be overriden and specified directly in DOM using
  // `data-parsley-` default DOM-API
  // eg: `inputs` can be set in DOM using `data-parsley-inputs="input, textarea"`
  // eg: `data-parsley-stop-on-first-failing-constraint="false"`
  var ParsleyDefaults = {
    // Default data-namespace for DOM API
    namespace: 'data-parsley-',
    // Supported inputs by default
    inputs: 'input, textarea, select',
    // Excluded inputs by default
    excluded: 'input[type=button], input[type=submit], input[type=reset], input[type=hidden]',
    // Stop validating field on highest priority failing constraint
    priorityEnabled: true,
    // ### Field only
    // identifier used to group together inputs (e.g. radio buttons...)
    multiple: null,
    // identifier (or array of identifiers) used to validate only a select group of inputs
    group: null,
    // ### UI
    // Enable\Disable error messages
    uiEnabled: true,
    // Key events threshold before validation
    // Focused field on form validation error. 'first'|'last'|'none'
    // event(s) that will trigger validation before first failure. eg: `input`...
    trigger: false,
    // event(s) that will trigger validation after first failure.
    triggerAfterFailure: 'input',
    errorClass: 'parsley-error',
    // Same for success validation
    // Return the `$element` that will receive these above success or error classes
    // Could also be (and given directly from DOM) a valid selector like `'#div'`
    // Return the `$element` where errors will be appended
    // Could also be (and given directly from DOM) a valid selector like `'#div'`
    // ul elem that would receive errors' list
    errorsWrapper: '<ul class="parsley-errors-list"></ul>',
    errorTemplate: '<li></li>'
  };
    this.__id__ = ParsleyUtils__default.generateID();
  ParsleyAbstract.prototype = {
    asyncSupport: true, // Deprecated
      var _this = this;
      var pipe = function pipe() {
        if (true !== _this.validationResult) r.reject();
        return r.resolve().promise();
      };
    },
    actualizeOptions: function actualizeOptions() {
      if (this.parent && this.parent.actualizeOptions) this.parent.actualizeOptions();
      return this;
    _resetOptions: function _resetOptions(initOptions) {
      this.domOptions = ParsleyUtils__default.objectCreate(this.parent.options);
      // Shallow copy of ownProperties of initOptions:
      for (var i in initOptions) {
      }
      this.actualizeOptions();
    _listeners: null,
    // Register a callback for the given event name
    // The context is the current parsley instance, or window.Parsley if global
    // A return value of `false` will interrupt the calls
    on: function on(name, fn) {
      var queue = this._listeners[name] = this._listeners[name] || [];
      queue.push(fn);
      return this;
    // Deprecated. Use `on` instead
    subscribe: function subscribe(name, fn) {
    },
    // Unregister a callback (or all if none is given) for the given event name
    off: function off(name, fn) {
      if (queue) {
        if (!fn) {
          delete this._listeners[name];
          for (var i = queue.length; i--;) if (queue[i] === fn) queue.splice(i, 1);
        }
      return this;
    },
    unsubscribe: function unsubscribe(name, fn) {
      $.unsubscribeTo(this, name.toLowerCase());
    },
    // Trigger an event of the given name
    // A return value of `false` interrupts the callback chain
    // Returns false if execution was interrupted
    trigger: function trigger(name, target, extraArg) {
      var queue = this._listeners && this._listeners[name];
      var result;
      var parentResult;
      if (queue) {
        for (var i = queue.length; i--;) {
          if (result === false) return result;
        }
      }
      if (this.parent) {
        return this.parent.trigger(name, target, extraArg);
      }
      return true;
    },
    // Reset UI
      // Field case: just emit a reset event for UI
        this._resetUI();
        return this._trigger('reset');
      }
      // Form case: emit a reset event for each field
      for (var i = 0; i < this.fields.length; i++) this.fields[i].reset();
      this._trigger('reset');
    },
    // Destroy Parsley instance (+ UI)
      // Field case: emit destroy event to clean UI and then destroy stored instance
      this._destroyUI();
        this.$element.removeData('Parsley');
        this.$element.removeData('ParsleyFieldMultiple');
        this._trigger('destroy');
        return;
      // Form case: destroy all its fields and then destroy stored instance
      for (var i = 0; i < this.fields.length; i++) this.fields[i].destroy();
      this.$element.removeData('Parsley');
      this._trigger('destroy');
    },
    asyncIsValid: function asyncIsValid(group, force) {
      ParsleyUtils__default.warnOnce("asyncIsValid is deprecated; please use whenValid instead");
      return this.whenValid({ group: group, force: force });
    },
    _findRelated: function _findRelated() {
      return this.options.multiple ? this.parent.$element.find('[' + this.options.namespace + 'multiple="' + this.options.multiple + '"]') : this.$element;
    }
  var requirementConverters = {
    string: function string(_string) {
      return _string;
    },
      if (isNaN(string)) throw 'Requirement is not an integer: "' + string + '"';
      return parseInt(string, 10);
    },
    number: function number(string) {
      if (isNaN(string)) throw 'Requirement is not a number: "' + string + '"';
      return parseFloat(string);
    },
    reference: function reference(string) {
      // Unused for now
      var result = $(string);
      if (result.length === 0) throw 'No such reference: "' + string + '"';
      return result;
    },
    boolean: function boolean(string) {
      return string !== 'false';
    },
    object: function object(string) {
      return ParsleyUtils__default.deserializeValue(string);
    },
      var flags = '';
      // Test if RegExp is literal, if not, nothing to be done, otherwise, we need to isolate flags and pattern
      if (/^\/.*\/(?:[gimy]*)$/.test(_regexp)) {
        // Replace the regexp literal string with the first match group: ([gimy]*)
        // If no flag is present, this will be a blank string
        flags = _regexp.replace(/.*\/([gimy]*)$/, '$1');
        // Again, replace the regexp literal string with the first match group:
        _regexp = _regexp.replace(new RegExp('^/(.*?)/' + flags + '$'), '$1');
      } else {
        _regexp = '^' + _regexp + '$';
      }
    }
  };
  var convertArrayRequirement = function convertArrayRequirement(string, length) {
    var m = string.match(/^\s*\[(.*)\]\s*$/);
    if (!m) throw 'Requirement is not an array: "' + string + '"';
    var values = m[1].split(',').map(ParsleyUtils__default.trimString);
    if (values.length !== length) throw 'Requirement has ' + values.length + ' values when ' + length + ' are needed';
    return values;
  var convertRequirement = function convertRequirement(requirementType, string) {
    var converter = requirementConverters[requirementType || 'string'];
    return converter(string);
  };
    var main = null;
    var extra = {};
    for (var key in requirementSpec) {
        var value = extraOptionReader(key);
        if ('string' === typeof value) value = convertRequirement(requirementSpec[key], value);
        extra[key] = value;
      } else {
      }
    }
    return [main, extra];
  };
  var ParsleyValidator = function ParsleyValidator(spec) {
    $.extend(true, this, spec);
  };
  ParsleyValidator.prototype = {
    // Returns `true` iff the given `value` is valid according the given requirements.
    validate: function validate(value, requirementFirstArg) {
      if (this.fn) {
        // Legacy style validator
        if (arguments.length > 3) // If more args then value, requirement, instance...
          requirementFirstArg = [].slice.call(arguments, 1, -1); // Skip first arg (value) and last (instance), combining the rest
        return this.fn.call(this, value, requirementFirstArg);
      }
      if ($.isArray(value)) {
        if (!this.validateMultiple) throw 'Validator `' + this.name + '` does not handle multiple values';
        return this.validateMultiple.apply(this, arguments);
      } else {
        if (this.validateNumber) {
          if (isNaN(value)) return false;
          arguments[0] = parseFloat(arguments[0]);
          return this.validateNumber.apply(this, arguments);
        }
        if (this.validateString) {
          return this.validateString.apply(this, arguments);
        }
        throw 'Validator `' + this.name + '` only handles multiple values';
      }
    // Parses `requirements` into an array of arguments,
    // according to `this.requirementType`
    parseRequirements: function parseRequirements(requirements, extraOptionReader) {
      if ('string' !== typeof requirements) {
        // Assume requirement already parsed
        // but make sure we return an array
        return $.isArray(requirements) ? requirements : [requirements];
      }
      var type = this.requirementType;
      if ($.isArray(type)) {
        var values = convertArrayRequirement(requirements, type.length);
        for (var i = 0; i < values.length; i++) values[i] = convertRequirement(type[i], values[i]);
        return values;
      } else if ($.isPlainObject(type)) {
        return convertExtraOptionRequirement(type, requirements, extraOptionReader);
        return [convertRequirement(type, requirements)];
      }
    },
    // Defaults:
    requirementType: 'string',
    priority: 2
  };
    this.__class__ = 'ParsleyValidatorRegistry';
    // Default Parsley locale is en
    this.locale = 'en';
    this.init(validators || {}, catalog || {});
  };
    email: /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i,
    // Follow https://www.w3.org/TR/html5/infrastructure.html#floating-point-numbers
    number: /^-?(\d*\.)?\d+(e[-+]?\d+)?$/i,
    integer: /^-?\d+$/,
    digits: /^\d+$/,
    alphanum: /^\w+$/i,
    url: new RegExp("^" +
    // protocol identifier
    "(?:(?:https?|ftp)://)?" + // ** mod: make scheme optional
    // user:pass authentication
    "(?:\\S+(?::\\S*)?@)?" + "(?:" +
    // IP address exclusion
    // private & local networks
    // "(?!(?:10|127)(?:\\.\\d{1,3}){3})" +   // ** mod: allow local networks
    // "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +  // ** mod: allow local networks
    // excludes loopback network 0.0.0.0
    // excludes reserved space >= 224.0.0.0
    // excludes network & broacast addresses
    "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" + "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" + "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" + "|" +
    // host name
    '(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)' +
    // domain name
    '(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*' +
    '(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))' + ")" +
    // port number
    "(?::\\d{2,5})?" +
    // resource path
  };
  typeRegexes.range = typeRegexes.number;
  // See http://stackoverflow.com/a/10454560/8279
  var decimalPlaces = function decimalPlaces(num) {
    var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    if (!match) {
      return 0;
    }
    return Math.max(0,
    // Number of digits right of decimal point.
    (match[1] ? match[1].length : 0) - (
    // Adjust for scientific notation.
    match[2] ? +match[2] : 0));
  };
  ParsleyValidatorRegistry.prototype = {
      this.catalog = catalog;
      // Copy prototype's validators:
      this.validators = $.extend({}, this.validators);
      for (var name in validators) this.addValidator(name, validators[name].fn, validators[name].priority);
      window.Parsley.trigger('parsley:validator:init');
    },
    // Set new messages locale if we have dictionary loaded in ParsleyConfig.i18n
    setLocale: function setLocale(locale) {
      if ('undefined' === typeof this.catalog[locale]) throw new Error(locale + ' is not available in the catalog');
      this.locale = locale;
      return this;
    },
    // Add a new messages catalog for a given locale. Set locale for this catalog if set === `true`
    addCatalog: function addCatalog(locale, messages, set) {
      if ('object' === typeof messages) this.catalog[locale] = messages;
      if (true === set) return this.setLocale(locale);
      return this;
    },
    // Add a specific message for a given constraint in a given locale
    addMessage: function addMessage(locale, name, message) {
      if ('undefined' === typeof this.catalog[locale]) this.catalog[locale] = {};
      return this;
    // Add messages for a given locale
      for (var name in nameMessageObject) this.addMessage(locale, name, nameMessageObject[name]);
      return this;
    // Add a new validator
    //
    //        requirementType: ['integer', 'integer'],
    //        validateString: function(value, from, to) {},
    //        messages: {
    //          en: "Hey, that's no good",
    //        }
    //    })
    // Old API was addValidator(name, function, priority)
    addValidator: function addValidator(name, arg1, arg2) {
        ParsleyUtils__default.warn('"' + name + '" is a restricted keyword and is not a valid validator name.');
      }
      return this._setValidator.apply(this, arguments);
    },
    updateValidator: function updateValidator(name, arg1, arg2) {
      if (!this.validators[name]) {
        ParsleyUtils__default.warn('Validator "' + name + '" is not already defined.');
        return this.addValidator.apply(this, arguments);
      }
      return this._setValidator.apply(this, arguments);
    },
    removeValidator: function removeValidator(name) {
      if (!this.validators[name]) ParsleyUtils__default.warn('Validator "' + name + '" is not defined.');
      delete this.validators[name];
      return this;
    },
    _setValidator: function _setValidator(name, validator, priority) {
      if ('object' !== typeof validator) {
        // Old style validator, with `fn` and `priority`
        validator = {
          fn: validator,
          priority: priority
        };
      }
      if (!validator.validate) {
        validator = new ParsleyValidator(validator);
      }
      this.validators[name] = validator;
      for (var locale in validator.messages || {}) this.addMessage(locale, name, validator.messages[locale]);
    },
    getErrorMessage: function getErrorMessage(constraint) {
      var message;
      // Type constraints are a bit different, we have to match their requirements too to find right error message
      if ('type' === constraint.name) {
        var typeMessages = this.catalog[this.locale][constraint.name] || {};
        message = typeMessages[constraint.requirements];
      } else message = this.formatMessage(this.catalog[this.locale][constraint.name], constraint.requirements);
      return message || this.catalog[this.locale].defaultMessage || this.catalog.en.defaultMessage;
    },
    // Kind of light `sprintf()` implementation
    formatMessage: function formatMessage(string, parameters) {
        for (var i in parameters) string = this.formatMessage(string, parameters[i]);
        return string;
      }
      return 'string' === typeof string ? string.replace(/%s/i, parameters) : '';
    },
    // A validator is an object with the following key values:
    //  - requirement: 'string' (default), 'integer', 'number', 'regexp' or an Array of these
    //  - validateString, validateMultiple, validateNumber: functions returning `true`, `false` or a promise
    //
    validators: {
      notblank: {
          return (/\S/.test(value)
        },
        priority: 2
      required: {
        validateMultiple: function validateMultiple(values) {
          return values.length > 0;
        validateString: function validateString(value) {
          );
        },
      },
      type: {
        validateString: function validateString(value, type) {
          var _ref$step = _ref.step;
          var _ref$base = _ref.base;
          var base = _ref$base === undefined ? 0 : _ref$base;
          if (!regex) {
            throw new Error('validator type `' + type + '` is not supported');
          }
          if ('number' === type) {
            if (!/^any$/i.test(step || '')) {
              var decimals = Math.max(decimalPlaces(step), decimalPlaces(base));
              if (decimalPlaces(nb) > decimals) // Value can't have too many decimals
                return false;
              // Be careful of rounding errors by using integers.
              var toInt = function toInt(f) {
                return Math.round(f * Math.pow(10, decimals));
              };
              if ((toInt(nb) - toInt(base)) % toInt(step) != 0) return false;
            }
          }
          return true;
        },
        requirementType: {
          '': 'string',
          step: 'string',
          base: 'number'
        },
        priority: 256
      },
      pattern: {
        validateString: function validateString(value, regexp) {
        },
        requirementType: 'regexp',
        priority: 64
      },
      minlength: {
        validateString: function validateString(value, requirement) {
          return value.length >= requirement;
        requirementType: 'integer',
        priority: 30
      maxlength: {
          return value.length <= requirement;
        },
        priority: 30
      },
      length: {
        validateString: function validateString(value, min, max) {
          return value.length >= min && value.length <= max;
        },
        requirementType: ['integer', 'integer'],
        priority: 30
      },
      mincheck: {
        validateMultiple: function validateMultiple(values, requirement) {
          return values.length >= requirement;
        requirementType: 'integer',
      },
      maxcheck: {
          return values.length <= requirement;
        },
        priority: 30
      },
      check: {
        validateMultiple: function validateMultiple(values, min, max) {
          return values.length >= min && values.length <= max;
        requirementType: ['integer', 'integer'],
        priority: 30
      min: {
        validateNumber: function validateNumber(value, requirement) {
          return value >= requirement;
        },
        priority: 30
      },
        validateNumber: function validateNumber(value, requirement) {
          return value <= requirement;
        requirementType: 'number',
        priority: 30
      },
      range: {
        validateNumber: function validateNumber(value, min, max) {
          return value >= min && value <= max;
        },
        requirementType: ['number', 'number'],
        priority: 30
      },
      equalto: {
        validateString: function validateString(value, refOrValue) {
          var $reference = $(refOrValue);
          if ($reference.length) return value === $reference.val();else return value === refOrValue;
        },
        priority: 256
      }
    }
  };
  var ParsleyUI = {};
  var diffResults = function diffResults(newResult, oldResult, deep) {
    var added = [];
    var kept = [];
    for (var i = 0; i < newResult.length; i++) {
      var found = false;
      for (var j = 0; j < oldResult.length; j++) if (newResult[i].assert.name === oldResult[j].assert.name) {
        found = true;
        break;
      if (found) kept.push(newResult[i]);else added.push(newResult[i]);
    }
    return {
      kept: kept,
      removed: !deep ? diffResults(oldResult, newResult, true).added : []
    };
  };
  ParsleyUI.Form = {
    _actualizeTriggers: function _actualizeTriggers() {
      var _this2 = this;
      this.$element.on('submit.Parsley', function (evt) {
        _this2.onSubmitValidate(evt);
      });
      this.$element.on('click.Parsley', 'input[type="submit"], button[type="submit"]', function (evt) {
        _this2.onSubmitButton(evt);
      });
      // UI could be disabled
      if (false === this.options.uiEnabled) return;
      this.$element.attr('novalidate', '');
    },
    focus: function focus() {
      this._focusedField = null;
      if (true === this.validationResult || 'none' === this.options.focus) return null;
      for (var i = 0; i < this.fields.length; i++) {
        var field = this.fields[i];
        if (true !== field.validationResult && field.validationResult.length > 0 && 'undefined' === typeof field.options.noFocus) {
          this._focusedField = field.$element;
          if ('first' === this.options.focus) break;
        }
      }
      if (null === this._focusedField) return null;
      return this._focusedField.focus();
    },
    _destroyUI: function _destroyUI() {
      // Reset all event listeners
      this.$element.off('.Parsley');
    }
  };
  ParsleyUI.Field = {
    _reflowUI: function _reflowUI() {
      this._buildUI();
      // If this field doesn't have an active UI don't bother doing something
      if (!this._ui) return;
      // Diff between two validation results
      var diff = diffResults(this.validationResult, this._ui.lastValidationResult);
      // Then store current validation result for next reflow
      this._ui.lastValidationResult = this.validationResult;
      // Handle valid / invalid / none field class
      this._manageStatusClass();
      // Add, remove, updated errors messages
      this._manageErrorsMessages(diff);
      // Triggers impl
      this._actualizeTriggers();
      // If field is not valid for the first time, bind keyup trigger to ease UX and quickly inform user
      if ((diff.kept.length || diff.added.length) && !this._failedOnce) {
        this._failedOnce = true;
        this._actualizeTriggers();
      }
    },
    // Returns an array of field's error message(s)
    getErrorsMessages: function getErrorsMessages() {
      // No error message, field is valid
      if (true === this.validationResult) return [];
      var messages = [];
      for (var i = 0; i < this.validationResult.length; i++) messages.push(this.validationResult[i].errorMessage || this._getErrorMessage(this.validationResult[i].assert));
      return messages;
    },
    // It's a goal of Parsley that this method is no longer required [#1073]
    addError: function addError(name) {
      var _ref2 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
      var message = _ref2.message;
      var assert = _ref2.assert;
      var _ref2$updateClass = _ref2.updateClass;
      var updateClass = _ref2$updateClass === undefined ? true : _ref2$updateClass;
      this._buildUI();
      this._addError(name, { message: message, assert: assert });
      if (updateClass) this._errorClass();
    },
    // It's a goal of Parsley that this method is no longer required [#1073]
    updateError: function updateError(name) {
      var _ref3 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
      var message = _ref3.message;
      var assert = _ref3.assert;
      var _ref3$updateClass = _ref3.updateClass;
      var updateClass = _ref3$updateClass === undefined ? true : _ref3$updateClass;
      this._buildUI();
      this._updateError(name, { message: message, assert: assert });
      if (updateClass) this._errorClass();
    },
    // It's a goal of Parsley that this method is no longer required [#1073]
    removeError: function removeError(name) {
      var _ref4 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];
      var _ref4$updateClass = _ref4.updateClass;
      var updateClass = _ref4$updateClass === undefined ? true : _ref4$updateClass;
      this._buildUI();
      this._removeError(name);
      // edge case possible here: remove a standard Parsley error that is still failing in this.validationResult
      // but highly improbable cuz' manually removing a well Parsley handled error makes no sense.
      if (updateClass) this._manageStatusClass();
    },
    _manageStatusClass: function _manageStatusClass() {
      if (this.hasConstraints() && this.needsValidation() && true === this.validationResult) this._successClass();else if (this.validationResult.length > 0) this._errorClass();else this._resetClass();
    },
    _manageErrorsMessages: function _manageErrorsMessages(diff) {
      if ('undefined' !== typeof this.options.errorsMessagesDisabled) return;
      // Case where we have errorMessage option that configure an unique field error message, regardless failing validators
      if ('undefined' !== typeof this.options.errorMessage) {
        if (diff.added.length || diff.kept.length) {
          this._insertErrorWrapper();
          if (0 === this._ui.$errorsWrapper.find('.parsley-custom-error-message').length) this._ui.$errorsWrapper.append($(this.options.errorTemplate).addClass('parsley-custom-error-message'));
        }
      }
      // Show, hide, update failing constraints messages
      for (var i = 0; i < diff.removed.length; i++) this._removeError(diff.removed[i].assert.name);
      for (i = 0; i < diff.kept.length; i++) this._updateError(diff.kept[i].assert.name, { message: diff.kept[i].errorMessage, assert: diff.kept[i].assert });
    },
      var message = _ref5.message;
      var assert = _ref5.assert;
      this._insertErrorWrapper();
      this._ui.$errorsWrapper.addClass('filled').append($(this.options.errorTemplate).addClass('parsley-' + name).html(message || this._getErrorMessage(assert)));
    _updateError: function _updateError(name, _ref6) {
      var message = _ref6.message;
      this._ui.$errorsWrapper.addClass('filled').find('.parsley-' + name).html(message || this._getErrorMessage(assert));
    },
    _removeError: function _removeError(name) {
      this._ui.$errorsWrapper.removeClass('filled').find('.parsley-' + name).remove();
    },
    _getErrorMessage: function _getErrorMessage(constraint) {
      if ('undefined' !== typeof this.options[customConstraintErrorMessage]) return window.Parsley.formatMessage(this.options[customConstraintErrorMessage], constraint.requirements);
    },
    _buildUI: function _buildUI() {
      if (this._ui || false === this.options.uiEnabled) return;
      var _ui = {};
      // Give field its Parsley id in DOM
      this.$element.attr(this.options.namespace + 'id', this.__id__);
      /** Generate important UI elements and store them in this **/
      // $errorClassHandler is the $element that woul have parsley-error and parsley-success classes
      // $errorsWrapper is a div that would contain the various field errors, it will be appended into $errorsContainer
      _ui.errorsWrapperId = 'parsley-id-' + (this.options.multiple ? 'multiple-' + this.options.multiple : this.__id__);
      // ValidationResult UI storage to detect what have changed bwt two validations, and update DOM accordingly
      _ui.lastValidationResult = [];
      // Store it in this for later
      this._ui = _ui;
    // Determine which element will have `parsley-error` and `parsley-success` classes
      // An element selector could be passed through DOM with `data-parsley-class-handler=#foo`
      if ('string' === typeof this.options.classHandler && $(this.options.classHandler).length) return $(this.options.classHandler);
      // Class handled could also be determined by function given in Parsley options
      var $handler = this.options.classHandler.call(this, this);
      // If this function returned a valid existing DOM element, go for it
      if ('undefined' !== typeof $handler && $handler.length) return $handler;
      // Otherwise, if simple element (input, texatrea, select...) it will perfectly host the classes
      // But if multiple element (radio, checkbox), that would be their parent
    },
    _insertErrorWrapper: function _insertErrorWrapper() {
      // Nothing to do if already inserted
      if (0 !== this._ui.$errorsWrapper.parent().length) return this._ui.$errorsWrapper.parent();
      if ('string' === typeof this.options.errorsContainer) {
        if ($(this.options.errorsContainer).length) return $(this.options.errorsContainer).append(this._ui.$errorsWrapper);else ParsleyUtils__default.warn('The errors container `' + this.options.errorsContainer + '` does not exist in DOM');
      if ('undefined' !== typeof $errorsContainer && $errorsContainer.length) return $errorsContainer.append(this._ui.$errorsWrapper);
      if (this.options.multiple) $from = $from.parent();
    },
    _actualizeTriggers: function _actualizeTriggers() {
      var $toBind = this._findRelated();
      var trigger;
      $toBind.off('.Parsley');
      if (this._failedOnce) $toBind.on(ParsleyUtils__default.namespaceEvents(this.options.triggerAfterFailure, 'Parsley'), function () {
      });else if (trigger = ParsleyUtils__default.namespaceEvents(this.options.trigger, 'Parsley')) {
        $toBind.on(trigger, function (event) {
        });
      }
    _eventValidate: function _eventValidate(event) {
      // For keyup, keypress, keydown, input... events that could be a little bit obstrusive
      // about success or failure have been displayed, always validate with this trigger to reflect every yalidation change.
      if (/key|input/.test(event.type)) if (!(this._ui && this._ui.validationInformationVisible) && this.getValue().length <= this.options.validationThreshold) return;
    },
    _resetUI: function _resetUI() {
      // Reset all event listeners
      this._failedOnce = false;
      this._actualizeTriggers();
      // Nothing to do if UI never initialized for this field
      // Reset all errors' li
      this._ui.$errorsWrapper.removeClass('filled').children().remove();
      // Reset validation class
      this._resetClass();
      this._ui.lastValidationResult = [];
    },
      this._resetUI();
      if ('undefined' !== typeof this._ui) this._ui.$errorsWrapper.remove();
    },
    _successClass: function _successClass() {
      this._ui.validationInformationVisible = true;
    },
    _errorClass: function _errorClass() {
      this._ui.validationInformationVisible = true;
      this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass);
    _resetClass: function _resetClass() {
      this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass);
  };
  var ParsleyForm = function ParsleyForm(element, domOptions, options) {
    this.$element = $(element);
    this.domOptions = domOptions;
    this.options = options;
    this.fields = [];
    this.validationResult = null;
  };
  var ParsleyForm__statusMapping = { pending: null, resolved: true, rejected: false };
    onSubmitValidate: function onSubmitValidate(event) {
      var _this4 = this;
      if (true === event.parsley) return;
      // If we didn't come here through a submit button, use the first one in the form
      this._$submitSource = null;
      this.$element.find('.parsley-synthetic-submit-button').prop('disabled', true);
      if ($submitSource.is('[formnovalidate]')) return;
      if ('resolved' === promise.state() && false !== this._trigger('submit')) {
        // All good, let event go through. We make this distinction because browsers
      } else {
          // Rejected or pending: cancel this submit
          event.preventDefault();
          if ('pending' === promise.state()) promise.done(function () {
            _this4._submit($submitSource);
          });
    },
    onSubmitButton: function onSubmitButton(event) {
      this._$submitSource = $(event.target);
    // internal
    // _submit submits the form, this time without going through the validations.
    _submit: function _submit($submitSource) {
      if (false === this._trigger('submit')) return;
      // Add submit button's data
      if ($submitSource) {
        if (0 === $synthetic.length) $synthetic = $('<input class="parsley-synthetic-submit-button" type="hidden">').appendTo(this.$element);
          name: $submitSource.attr('name'),
          value: $submitSource.attr('value')
      }
      this.$element.trigger($.extend($.Event('submit'), { parsley: true }));
    // Performs validation on fields while triggering events.
    // @returns `true` if all validations succeeds, `false`
    // if dependant on a promise.
    validate: function validate(options) {
      if (arguments.length >= 1 && !$.isPlainObject(options)) {
        var _arguments = _slice.call(arguments);
        var group = _arguments[0];
        var force = _arguments[1];
        options = { group: group, force: force, event: event };
      }
      return ParsleyForm__statusMapping[this.whenValidate(options).state()];
    whenValidate: function whenValidate() {
      var _$$when$done$fail$always,
          _this5 = this;
      var group = _ref7.group;
      var force = _ref7.force;
      this.submitEvent = event;
      if (event) {
        this.submitEvent = $.extend({}, event, { preventDefault: function preventDefault() {
            _this5.validationResult = false;
          } });
      this.validationResult = true;
      this._trigger('validate');
      // Refresh form DOM options and form's fields that could have changed
      var promises = this._withoutReactualizingFormOptions(function () {
        return $.map(_this5.fields, function (field) {
          return field.whenValidate({ force: force, group: group });
      });
        _this5._trigger('success');
      }).fail(function () {
        _this5.focus();
        _this5._trigger('error');
      }).always(function () {
      })).pipe.apply(_$$when$done$fail$always, _toConsumableArray(this._pipeAccordingToValidationResult()));
    },
    // Iterate over refreshed fields, and stop on first failure.
    // or `null` if the result depends on an unresolved promise.
    // Prefer using `whenValid` instead.
    isValid: function isValid(options) {
        ParsleyUtils__default.warnOnce('Calling isValid on a parsley form without passing arguments as an object is deprecated.');
        var _arguments2 = _slice.call(arguments);
        var group = _arguments2[0];
        options = { group: group, force: force };
      }
      return ParsleyForm__statusMapping[this.whenValid(options).state()];
    },
    // Returns a promise.
    // A validation that immediately fails will interrupt the validations.
      var _this6 = this;
      var _ref8 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
      var force = _ref8.force;
      this._refreshFields();
        return $.map(_this6.fields, function (field) {
          return field.whenValid({ group: group, force: force });
        });
      return $.when.apply($, _toConsumableArray(promises));
    },
      return this.actualizeOptions()._bindFields();
    },
      var _this7 = this;
      var oldFields = this.fields;
      this.fields = [];
      this._withoutReactualizingFormOptions(function () {
          var fieldInstance = new window.Parsley.Factory(element, {}, _this7);
          // Only add valid and not excluded `ParsleyField` and `ParsleyFieldMultiple` children
          if (('ParsleyField' === fieldInstance.__class__ || 'ParsleyFieldMultiple' === fieldInstance.__class__) && true !== fieldInstance.options.excluded) if ('undefined' === typeof _this7.fieldsMappedById[fieldInstance.__class__ + '-' + fieldInstance.__id__]) {
            _this7.fieldsMappedById[fieldInstance.__class__ + '-' + fieldInstance.__id__] = fieldInstance;
          }
        });
          field._trigger('reset');
        });
      return this;
    },
    // Internal only.
    // Looping on a form's fields to do validation or similar
    // will trigger reactualizing options on all of them, which
    // in turn will reactualize the form's options.
    // To avoid calling actualizeOptions so many times on the form
    // for nothing, _withoutReactualizingFormOptions temporarily disables
    // the method actualizeOptions on this form while `fn` is called.
    _withoutReactualizingFormOptions: function _withoutReactualizingFormOptions(fn) {
      this.actualizeOptions = function () {
        return this;
      };
      var result = fn();
      this.actualizeOptions = oldActualizeOptions;
    },
    // Internal only.
    // Returns true iff event is not interrupted and default not prevented.
    _trigger: function _trigger(eventName) {
      return this.trigger('form:' + eventName);
    }
  var ConstraintFactory = function ConstraintFactory(parsleyField, name, requirements, priority, isDomConstraint) {
    if (!/ParsleyField/.test(parsleyField.__class__)) throw new Error('ParsleyField or ParsleyFieldMultiple instance expected');
    var validator = new ParsleyValidator(validatorSpec);
    $.extend(this, {
      name: name,
      requirements: requirements,
      isDomConstraint: true === isDomConstraint
    });
    this._parseRequirements(parsleyField.options);
  };
    var cap = str[0].toUpperCase();
    return cap + str.slice(1);
  ConstraintFactory.prototype = {
      var _validator;
      return (_validator = this.validator).validate.apply(_validator, [value].concat(_toConsumableArray(this.requirementList), [instance]));
    _parseRequirements: function _parseRequirements(options) {
      var _this8 = this;
      this.requirementList = this.validator.parseRequirements(this.requirements, function (key) {
        return options[_this8.name + capitalize(key)];
      });
    }
  };
  var ParsleyField = function ParsleyField(field, domOptions, options, parsleyFormInstance) {
    this.__class__ = 'ParsleyField';
    this.$element = $(field);
    // Set parent if we have one
    if ('undefined' !== typeof parsleyFormInstance) {
    }
    this.options = options;
    // Initialize some properties
    this.constraints = [];
    this.constraintsByName = {};
    this.validationResult = true;
    this._bindConstraints();
  };
  var parsley_field__statusMapping = { pending: null, resolved: true, rejected: false };
    // # Public API
    // @returns `true`, an array of the validators that failed, or
    // `null` if validation is not finished. Prefer using whenValidate
    validate: function validate(options) {
        ParsleyUtils__default.warnOnce('Calling validate on a parsley field without passing arguments as an object is deprecated.');
        options = { options: options };
      var promise = this.whenValidate(options);
      if (!promise) // If excluded with `group` option
        return true;
      switch (promise.state()) {
        case 'pending':
        case 'resolved':
        case 'rejected':
          return this.validationResult;
      }
    },
    // Validate field and trigger some events for mainly `ParsleyUI`
    // @returns a promise that succeeds only when all validations do
    // or `undefined` if field is not in the given `group`.
    whenValidate: function whenValidate() {
      var _whenValid$always$done$fail$always,
          _this9 = this;
      var _ref9 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
      var force = _ref9.force;
      // do not validate a field if not the same as given validation group
      this.refreshConstraints();
      if (group && !this._isInGroup(group)) return;
      this.value = this.getValue();
      // Field Validate event. `this.value` could be altered for custom needs
      this._trigger('validate');
      return (_whenValid$always$done$fail$always = this.whenValid({ force: force, value: this.value, _refreshed: true }).always(function () {
        _this9._reflowUI();
      }).done(function () {
        _this9._trigger('success');
      }).fail(function () {
        _this9._trigger('error');
      }).always(function () {
        _this9._trigger('validated');
      })).pipe.apply(_whenValid$always$done$fail$always, _toConsumableArray(this._pipeAccordingToValidationResult()));
    },
    hasConstraints: function hasConstraints() {
    },
    // An empty optional field does not need validation
      if ('undefined' === typeof value) value = this.getValue();
      // If a field is empty and not required, it is valid
      // Except if `data-parsley-validate-if-empty` explicitely added, useful for some custom validators
      if (!value.length && !this._isRequired() && 'undefined' === typeof this.options.validateIfEmpty) return false;
      return true;
    },
    _isInGroup: function _isInGroup(group) {
      if ($.isArray(this.options.group)) return -1 !== $.inArray(group, this.options.group);
    },
    // Returns `true` iff all constraints pass, `false` if there are failures,
    // or `null` if the result can not be determined yet (depends on a promise)
    // See also `whenValid`.
      if (arguments.length >= 1 && !$.isPlainObject(options)) {
        ParsleyUtils__default.warnOnce('Calling isValid on a parsley field without passing arguments as an object is deprecated.');
        var _arguments3 = _slice.call(arguments);
        var force = _arguments3[0];
        options = { force: force, value: value };
      }
      var promise = this.whenValid(options);
        return true;
    },
    // Just validate field. Do not trigger any event.
    // @returns a promise that succeeds only when all validations do
    // The argument `force` will force validation of empty fields.
    // If a `value` is given, it will be validated instead of the value of the input.
    whenValid: function whenValid() {
      var _this10 = this;
      var _ref10 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
      var _ref10$force = _ref10.force;
      var force = _ref10$force === undefined ? false : _ref10$force;
      var value = _ref10.value;
      var _refreshed = _ref10._refreshed;
      // Recompute options and rebind constraints to have latest changes
      // do not validate a field if not the same as given validation group
      if (group && !this._isInGroup(group)) return;
      // A field without constraint is valid
      if (!this.hasConstraints()) return $.when();
      // Value could be passed as argument, needed to add more power to 'field:validate'
      if ('undefined' === typeof value || null === value) value = this.getValue();
      if (!this.needsValidation(value) && true !== force) return $.when();
      var promises = [];
      $.each(groupedConstraints, function (_, constraints) {
        // Process one group of constraints at a time, we validate the constraints
        // and combine the promises together.
        var promise = $.when.apply($, _toConsumableArray($.map(constraints, function (constraint) {
          return _this10._validateConstraint(value, constraint);
        })));
        promises.push(promise);
        if (promise.state() === 'rejected') return false; // Interrupt processing if a group has already failed
      });
    },
    // @returns a promise
    _validateConstraint: function _validateConstraint(value, constraint) {
      var _this11 = this;
      var result = constraint.validate(value, this);
      // Map false to a failed promise
      if (false === result) result = $.Deferred().reject();
      return $.when(result).fail(function (errorMessage) {
        _this11.validationResult.push({
          assert: constraint,
        });
      });
    },
    // @returns Parsley field computed value that could be overrided or configured in DOM
      var value;
      // Value could be overriden in DOM or with explicit options
      if ('function' === typeof this.options.value) value = this.options.value(this);else if ('undefined' !== typeof this.options.value) value = this.options.value;else value = this.$element.val();
      // Handle wrong DOM or configurations
      if ('undefined' === typeof value || null === value) return '';
    },
    // Re-bind accordingly constraints (could be some new, removed or updated)
    refreshConstraints: function refreshConstraints() {
    },
    * Add a new constraint to a field
    *
    * @param {String}   name
    * @param {Mixed}    requirements      optional
    * @param {Number}   priority          optional
    * @param {Boolean}  isDomConstraint   optional
    */
      if (window.Parsley._validatorRegistry.validators[name]) {
        var constraint = new ConstraintFactory(this, name, requirements, priority, isDomConstraint);
        // if constraint already exist, delete it and push new version
        this.constraints.push(constraint);
        this.constraintsByName[constraint.name] = constraint;
      return this;
    // Remove a constraint
    removeConstraint: function removeConstraint(name) {
        this.constraints.splice(i, 1);
        break;
      }
      return this;
    },
    // Update a constraint (Remove + re-add)
    updateConstraint: function updateConstraint(name, parameters, priority) {
      return this.removeConstraint(name).addConstraint(name, parameters, priority);
    },
    // Internal only.
    // Bind constraints from config + options + DOM
    _bindConstraints: function _bindConstraints() {
      var constraints = [];
      var constraintsByName = {};
      // clean all existing DOM constraints to only keep javascript user constraints
        constraints.push(this.constraints[i]);
        constraintsByName[this.constraints[i].name] = this.constraints[i];
      }
      this.constraints = constraints;
      this.constraintsByName = constraintsByName;
      // then re-add Parsley DOM-API constraints
      for (var name in this.options) this.addConstraint(name, this.options[name], undefined, true);
      // finally, bind special HTML5 constraints
      return this._bindHtml5Constraints();
    },
    // Internal only.
    // Bind specific HTML5 constraints to be HTML5 compliant
    _bindHtml5Constraints: function _bindHtml5Constraints() {
      // html5 required
      if (this.$element.hasClass('required') || this.$element.attr('required')) this.addConstraint('required', true, undefined, true);
      // html5 pattern
      // range
      if ('undefined' !== typeof this.$element.attr('min') && 'undefined' !== typeof this.$element.attr('max')) this.addConstraint('range', [this.$element.attr('min'), this.$element.attr('max')], undefined, true);
      // HTML5 min
      else if ('undefined' !== typeof this.$element.attr('min')) this.addConstraint('min', this.$element.attr('min'), undefined, true);
        // HTML5 max
        else if ('undefined' !== typeof this.$element.attr('max')) this.addConstraint('max', this.$element.attr('max'), undefined, true);
      if ('undefined' !== typeof this.$element.attr('minlength') && 'undefined' !== typeof this.$element.attr('maxlength')) this.addConstraint('length', [this.$element.attr('minlength'), this.$element.attr('maxlength')], undefined, true);
      else if ('undefined' !== typeof this.$element.attr('minlength')) this.addConstraint('minlength', this.$element.attr('minlength'), undefined, true);
        // HTML5 maxlength
      // html5 types
      var type = this.$element.attr('type');
      // Small special case here for HTML5 number: integer validator if step attribute is undefined or an integer value, number otherwise
      if ('number' === type) {
        return this.addConstraint('type', ['number', {
          step: this.$element.attr('step'),
          base: this.$element.attr('min') || this.$element.attr('value')
        }], undefined, true);
        // Regular other HTML5 supported types
      } else if (/^(email|url|range)$/i.test(type)) {
          return this.addConstraint('type', type, undefined, true);
      return this;
    },
    // Internal only.
    // Field is required if have required constraint without `false` value
      if ('undefined' === typeof this.constraintsByName.required) return false;
      return false !== this.constraintsByName.required.requirements;
    },
    // Shortcut to trigger an event
    _trigger: function _trigger(eventName) {
    },
    // Internal only
    // Use `data-parsley-whitespace="squish"` to auto squish input value
    // Use `data-parsley-whitespace="trim"` to auto trim input value
    _handleWhitespace: function _handleWhitespace(value) {
      if (true === this.options.trimValue) ParsleyUtils__default.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"');
      if ('squish' === this.options.whitespace) value = value.replace(/\s{2,}/g, ' ');
      return value;
    },
    // Returns the constraints, grouped by descending priority.
    _getGroupedConstraints: function _getGroupedConstraints() {
      if (false === this.options.priorityEnabled) return [this.constraints];
      var groupedConstraints = [];
      var index = {};
      for (var i = 0; i < this.constraints.length; i++) {
        var p = this.constraints[i].priority;
        index[p].push(this.constraints[i]);
      }
      // Sort them by priority DESC
      groupedConstraints.sort(function (a, b) {
      });
      return groupedConstraints;
    }
  var parsley_field = ParsleyField;
    this.__class__ = 'ParsleyFieldMultiple';
  };
  ParsleyMultiple.prototype = {
    // Add new `$element` sibling for multiple field
    addElement: function addElement($element) {
      this.$elements.push($element);
      return this;
    },
    // See `ParsleyField.refreshConstraints()`
    refreshConstraints: function refreshConstraints() {
      var fieldConstraints;
      this.constraints = [];
      // Select multiple special treatment
      if (this.$element.is('select')) {
        this.actualizeOptions()._bindConstraints();
        return this;
      }
      // Gather all constraints for each input in the multiple group
      for (var i = 0; i < this.$elements.length; i++) {
        // Check if element have not been dynamically removed since last binding
        if (!$('html').has(this.$elements[i]).length) {
          this.$elements.splice(i, 1);
        }
        fieldConstraints = this.$elements[i].data('ParsleyFieldMultiple').refreshConstraints().constraints;
        for (var j = 0; j < fieldConstraints.length; j++) this.addConstraint(fieldConstraints[j].name, fieldConstraints[j].requirements, fieldConstraints[j].priority, fieldConstraints[j].isDomConstraint);
      }
      return this;
    },
    getValue: function getValue() {
      if ('function' === typeof this.options.value) return this.options.value(this);else if ('undefined' !== typeof this.options.value) return this.options.value;
      // Radio input case
      // checkbox input case
      if (this.$element.is('input[type=checkbox]')) {
        var values = [];
          values.push($(this).val());
        return values;
      }
      if (this.$element.is('select') && null === this.$element.val()) return [];
      // Default case that should never happen
      return this.$element.val();
    },
    _init: function _init() {
      this.$elements = [this.$element];
      return this;
    }
  };
  var ParsleyFactory = function ParsleyFactory(element, options, parsleyFormInstance) {
    // If the element has already been bound, returns its saved Parsley instance
    var savedparsleyFormInstance = this.$element.data('Parsley');
    if (savedparsleyFormInstance) {
      if ('undefined' !== typeof parsleyFormInstance && savedparsleyFormInstance.parent === window.Parsley) {
        savedparsleyFormInstance.parent = parsleyFormInstance;
        savedparsleyFormInstance._resetOptions(savedparsleyFormInstance.options);
      return savedparsleyFormInstance;
    }
    // Parsley must be instantiated with a DOM element or jQuery $element
    if ('undefined' !== typeof parsleyFormInstance && 'ParsleyForm' !== parsleyFormInstance.__class__) throw new Error('Parent instance must be a ParsleyForm instance');
    this.parent = parsleyFormInstance || window.Parsley;
  };
  ParsleyFactory.prototype = {
    init: function init(options) {
      this.__class__ = 'Parsley';
      this.__id__ = ParsleyUtils__default.generateID();
      // Pre-compute options
      this._resetOptions(options);
      // A ParsleyForm instance is obviously a `<form>` element but also every node that is not an input and has the `data-parsley-validate` attribute
      if (this.$element.is('form') || ParsleyUtils__default.checkAttr(this.$element, this.options.namespace, 'validate') && !this.$element.is(this.options.inputs)) return this.bind('parsleyForm');
      // Every other element is bound as a `ParsleyField` or `ParsleyFieldMultiple`
      return this.isMultiple() ? this.handleMultiple() : this.bind('parsleyField');
    isMultiple: function isMultiple() {
    },
    // Multiples fields are a real nightmare :(
    handleMultiple: function handleMultiple() {
      var _this12 = this;
      var name;
      var multiple;
      var parsleyMultipleInstance;
      // Handle multiple name
      if (this.options.multiple) ; // We already have our 'multiple' identifier
      // Special select multiple input
      if (this.$element.is('select') && 'undefined' !== typeof this.$element.attr('multiple')) {
        this.options.multiple = this.options.multiple || this.__id__;
        return this.bind('parsleyFieldMultiple');
        // Else for radio / checkboxes, we need a `name` or `data-parsley-multiple` to properly bind it
      } else if (!this.options.multiple) {
          ParsleyUtils__default.warn('To be bound by Parsley, a radio, a checkbox and a multiple select input must have either a name or a multiple option.', this.$element);
        }
      this.options.multiple = this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g, '');
      // Add proper `data-parsley-multiple` to siblings if we have a valid multiple name
      if ('undefined' !== typeof name) {
        $('input[name="' + name + '"]').each(function (i, input) {
          if ($(input).is('input[type=radio], input[type=checkbox]')) $(input).attr(_this12.options.namespace + 'multiple', _this12.options.multiple);
      }
      // Check here if we don't already have a related multiple instance saved
      var $previouslyRelated = this._findRelated();
      for (var i = 0; i < $previouslyRelated.length; i++) {
        if ('undefined' !== typeof parsleyMultipleInstance) {
            parsleyMultipleInstance.addElement(this.$element);
          }
        }
      }
      // And will be useful later to access classic `ParsleyField` stuff while being in a `ParsleyFieldMultiple` instance
      return parsleyMultipleInstance || this.bind('parsleyFieldMultiple');
    },
    // Return proper `ParsleyForm`, `ParsleyField` or `ParsleyFieldMultiple`
    bind: function bind(type, doNotStore) {
      var parsleyInstance;
      switch (type) {
        case 'parsleyForm':
          parsleyInstance = $.extend(new ParsleyForm(this.$element, this.domOptions, this.options), new ParsleyAbstract(), window.ParsleyExtend)._bindFields();
          break;
        case 'parsleyField':
          parsleyInstance = $.extend(new parsley_field(this.$element, this.domOptions, this.options, this.parent), new ParsleyAbstract(), window.ParsleyExtend);
          break;
        case 'parsleyFieldMultiple':
          break;
        default:
          throw new Error(type + 'is not a supported Parsley type');
      if (this.options.multiple) ParsleyUtils__default.setAttr(this.$element, this.options.namespace, 'multiple', this.options.multiple);
      if ('undefined' !== typeof doNotStore) {
        this.$element.data('ParsleyFieldMultiple', parsleyInstance);
        return parsleyInstance;
      }
      // Store the freshly bound instance in a DOM element for later access using jQuery `data()`
      this.$element.data('Parsley', parsleyInstance);
      // Tell the world we have a new ParsleyForm or ParsleyField instance!
      parsleyInstance._actualizeTriggers();
      parsleyInstance._trigger('init');
      return parsleyInstance;
    }
  var vernums = $.fn.jquery.split('.');
  if (parseInt(vernums[0]) <= 1 && parseInt(vernums[1]) < 8) {
    throw "The loaded version of jQuery is too old. Please upgrade to 1.8.x or better.";
  if (!vernums.forEach) {
    ParsleyUtils__default.warn('Parsley requires ES5 to run properly. Please include https://github.com/es-shims/es5-shim');
  // Inherit `on`, `off` & `trigger` to Parsley:
  var Parsley = $.extend(new ParsleyAbstract(), {
    actualizeOptions: null,
    _resetOptions: null,
    version: '2.3.13'
  });
  // Supplement ParsleyField and Form with ParsleyAbstract
  // This way, the constructors will have access to those methods
  $.extend(parsley_field.prototype, ParsleyUI.Field, ParsleyAbstract.prototype);
  // Inherit actualizeOptions and _resetOptions:
  $.extend(ParsleyFactory.prototype, ParsleyAbstract.prototype);
  // ### jQuery API
  // `$('.elem').parsley(options)` or `$('.elem').psly(options)`
  $.fn.parsley = $.fn.psly = function (options) {
    if (this.length > 1) {
      var instances = [];
      this.each(function () {
        instances.push($(this).parsley(options));
      return instances;
    }
    if (!$(this).length) {
      ParsleyUtils__default.warn('You must bind Parsley on an existing element.');
    }
    return new ParsleyFactory(this, options);
  };
  // Ensure the extension is now defined if it wasn't previously
  if ('undefined' === typeof window.ParsleyExtend) window.ParsleyExtend = {};
  // Inherit from ParsleyDefault, and copy over any existing values
  Parsley.options = $.extend(ParsleyUtils__default.objectCreate(ParsleyDefaults), window.ParsleyConfig);
  window.ParsleyConfig = Parsley.options; // Old way of accessing global options
  // ### Globals
  window.Parsley = window.psly = Parsley;
  window.ParsleyUtils = ParsleyUtils__default;
  // ### Define methods that forward to the registry, and deprecate all access except through window.Parsley
  var registry = window.Parsley._validatorRegistry = new ParsleyValidatorRegistry(window.ParsleyConfig.validators, window.ParsleyConfig.i18n);
  window.ParsleyValidator = {};
    window.Parsley[method] = $.proxy(registry, method);
    window.ParsleyValidator[method] = function () {
      var _window$Parsley;
      ParsleyUtils__default.warnOnce('Accessing the method \'' + method + '\' through ParsleyValidator is deprecated. Simply call \'window.Parsley.' + method + '(...)\'');
    };
  // ### ParsleyUI
  // Deprecated global object
  window.Parsley.UI = ParsleyUI;
  window.ParsleyUI = {
    removeError: function removeError(instance, name, doNotUpdateClass) {
      ParsleyUtils__default.warnOnce('Accessing ParsleyUI is deprecated. Call \'removeError\' on the instance directly. Please comment in issue 1073 as to your need to call this method.');
      return instance.removeError(name, { updateClass: updateClass });
    },
    getErrorsMessages: function getErrorsMessages(instance) {
      ParsleyUtils__default.warnOnce('Accessing ParsleyUI is deprecated. Call \'getErrorsMessages\' on the instance directly.');
    }
  };
    window.ParsleyUI[method] = function (instance, name, message, assert, doNotUpdateClass) {
      var updateClass = true !== doNotUpdateClass;
      return instance[method](name, { message: message, assert: assert, updateClass: updateClass });
    };
  });
  // Prevent it by setting `ParsleyConfig.autoBind` to `false`
  if (false !== window.ParsleyConfig.autoBind) {
    $(function () {
      // Works only on `data-parsley-validate`.
      if ($('[data-parsley-validate]').length) $('[data-parsley-validate]').parsley();
  }
  var o = $({});
    ParsleyUtils__default.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley");
  };
  function adapt(fn, context) {
    // Store to allow unbinding
      fn.parsleyAdaptedCallback = function () {
        var args = Array.prototype.slice.call(arguments, 0);
        fn.apply(context || o, args);
      };
    return fn.parsleyAdaptedCallback;
  }
  // Converts 'parsley:form:validate' into 'form:validate'
  function eventName(name) {
    return name;
  }
  $.listen = function (name, callback) {
    deprecated();
    if ('object' === typeof arguments[1] && 'function' === typeof arguments[2]) {
      context = arguments[1];
      callback = arguments[2];
    }
    if ('function' !== typeof callback) throw new Error('Wrong parameters');
    window.Parsley.on(eventName(name), adapt(callback, context));
  };
  $.listenTo = function (instance, name, fn) {
    deprecated();
    if (!(instance instanceof parsley_field) && !(instance instanceof ParsleyForm)) throw new Error('Must give Parsley instance');
    if ('string' !== typeof name || 'function' !== typeof fn) throw new Error('Wrong parameters');
  };
  $.unsubscribe = function (name, fn) {
    deprecated();
    if ('string' !== typeof name || 'function' !== typeof fn) throw new Error('Wrong arguments');
  };
  $.unsubscribeTo = function (instance, name) {
    if (!(instance instanceof parsley_field) && !(instance instanceof ParsleyForm)) throw new Error('Must give Parsley instance');
    instance.off(eventName(name));
  };
  $.unsubscribeAll = function (name) {
    deprecated();
    $('form,input,textarea,select').each(function () {
      var instance = $(this).data('Parsley');
      if (instance) {
        instance.off(eventName(name));
      }
    });
  // $.emit is deprecated. Use jQuery events instead.
    var _instance;
    var instanceGiven = instance instanceof parsley_field || instance instanceof ParsleyForm;
    var args = Array.prototype.slice.call(arguments, instanceGiven ? 2 : 1);
    if (!instanceGiven) {
      instance = window.Parsley;
    }
    (_instance = instance).trigger.apply(_instance, _toConsumableArray(args));
  };
  $.extend(true, Parsley, {
    asyncValidators: {
        fn: function fn(xhr) {
          // By default, only status 2xx are deemed successful.
          // Note: we use status instead of state() because responses with status 200
          // but invalid messages (e.g. an empty body for content type set to JSON) will
          // result in state() === 'rejected'.
          return xhr.status >= 200 && xhr.status < 300;
        },
        url: false
      },
      reverse: {
          // If reverse option is set, a failing ajax request is considered successful
          return xhr.status < 200 || xhr.status >= 300;
        url: false
    },
      Parsley.asyncValidators[name] = {
        fn: fn,
        url: url || false,
      };
      return this;
    }
  });
    requirementType: {
      '': 'string',
      'reverse': 'boolean',
      'options': 'object'
    },
      var data = {};
      var csr;
      var validator = options.validator || (true === options.reverse ? 'reverse' : 'default');
      if ('undefined' === typeof Parsley.asyncValidators[validator]) throw new Error('Calling an undefined async validator: `' + validator + '`');
      // Fill current value
      if (url.indexOf('{value}') > -1) {
      } else {
        data[instance.$element.attr('name') || instance.$element.attr('id')] = value;
      // Merge options passed in from the function with the ones in the attribute
      var remoteOptions = $.extend(true, options.options || {}, Parsley.asyncValidators[validator].options);
      // All `$.ajax(options)` could be overridden or extended directly from DOM in `data-parsley-remote-options`
      ajaxOptions = $.extend(true, {}, {
        url: url,
        type: 'GET'
      // Generate store key based on ajax options
      instance.trigger('field:ajaxoptions', instance, ajaxOptions);
      // Initialise querry cache
      if ('undefined' === typeof Parsley._remoteCache) Parsley._remoteCache = {};
      var xhr = Parsley._remoteCache[csr] = Parsley._remoteCache[csr] || $.ajax(ajaxOptions);
      var handleXhr = function handleXhr() {
        var result = Parsley.asyncValidators[validator].fn.call(instance, xhr, url, options);
        if (!result) // Map falsy results to rejected promise
        return $.when(result);
      };
    },
    priority: -1
  });
    Parsley._remoteCache = {};
  });
  window.ParsleyExtend.addAsyncValidator = function () {
    return Parsley.addAsyncValidator.apply(Parsley, arguments);
  };
  // thus there is no use in adding it to your project.
  Parsley.addMessages('en', {
    type: {
      email: "This value should be a valid email.",
      url: "This value should be a valid url.",
      integer: "This value should be a valid integer.",
      digits: "This value should be digits.",
    },
    notblank: "This value should not be blank.",
    required: "This value is required.",
    min: "This value should be greater than or equal to %s.",
    max: "This value should be lower than or equal to %s.",
    minlength: "This value is too short. It should have %s characters or more.",
    maxlength: "This value is too long. It should have %s characters or fewer.",
    length: "This value length is invalid. It should be between %s and %s characters long.",
    maxcheck: "You must select %s choices or fewer.",
    check: "You must select between %s and %s choices.",
    equalto: "This value should be the same."
  });
  Parsley.setLocale('en');
   * inputevent - Alleviate browser bugs for input events
   * https://github.com/marcandre/inputevent
   * @author Marc-Andre Lafortune <github@marc-andre.ca>
   * @license MIT
  function InputEvent() {
    var globals = window || global;
    // Slightly odd way construct our object. This way methods are force bound.
    // Used to test for duplicate library.
      // For browsers that do not support isTrusted, assumes event is native.
      isNativeEvent: function isNativeEvent(evt) {
        return evt.originalEvent && evt.originalEvent.isTrusted !== false;
      },
      fakeInputEvent: function fakeInputEvent(evt) {
          $(evt.target).trigger('input');
        }
      misbehaves: function misbehaves(evt) {
        if (_this13.isNativeEvent(evt)) {
          $(document).on('change.inputevent', evt.data.selector, _this13.fakeInputEvent);
          _this13.fakeInputEvent(evt);
        }
      behavesOk: function behavesOk(evt) {
        if (_this13.isNativeEvent(evt)) {
          $(document) // Simply unbinds the testing handler
        }
      },
      // Bind the testing handlers
      install: function install() {
          return;
        }
        globals.inputEventPatched = '0.0.3';
        for (var _i = 0; _i < _arr.length; _i++) {
          var selector = _arr[_i];
          $(document).on('input.inputevent', selector, { selector: selector }, _this13.behavesOk).on('change.inputevent', selector, { selector: selector }, _this13.misbehaves);
      },
      uninstall: function uninstall() {
        delete globals.inputEventPatched;
        $(document).off('.inputevent');
    });
  };
  var inputevent = new InputEvent();
  inputevent.install();
  var parsley = Parsley;
});
//# sourceMappingURL=parsley.js.map
