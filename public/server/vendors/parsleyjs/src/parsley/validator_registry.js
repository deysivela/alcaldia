import $ from 'jquery';
import ParsleyUtils from './utils';
import ParsleyDefaults from './defaults';
import ParsleyValidator from './validator';
  this.__class__ = 'ParsleyValidatorRegistry';
  // Default Parsley locale is en
  this.init(validators || {}, catalog || {});
};
  email: /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i,
  // Follow https://www.w3.org/TR/html5/infrastructure.html#floating-point-numbers
  integer: /^-?\d+$/,
  digits: /^\d+$/,
  url: new RegExp(
      "^" +
        "(?:(?:https?|ftp)://)?" + // ** mod: make scheme optional
        "(?:\\S+(?::\\S*)?@)?" +
          // IP address exclusion
          // "(?!(?:10|127)(?:\\.\\d{1,3}){3})" +   // ** mod: allow local networks
          // "(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})" +  // ** mod: allow local networks
          // "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +  // ** mod: allow local networks
          // IP address dotted notation octets
          // excludes loopback network 0.0.0.0
          // excludes reserved space >= 224.0.0.0
          // excludes network & broacast addresses
          // (first & last IP address of each class)
          "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" +
          "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" +
          "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" +
        "|" +
          // host name
          "(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)" +
          // domain name
          "(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*" +
          // TLD identifier
          "(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))" +
        ")" +
        // port number
        "(?::\\d{2,5})?" +
        // resource path
        "(?:/\\S*)?" +
      "$", 'i'
    )
};
typeRegexes.range = typeRegexes.number;
// See http://stackoverflow.com/a/10454560/8279
var decimalPlaces = num => {
  var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
  if (!match) { return 0; }
  return Math.max(
       0,
       // Number of digits right of decimal point.
       (match[1] ? match[1].length : 0) -
       // Adjust for scientific notation.
};
ParsleyValidatorRegistry.prototype = {
  init: function (validators, catalog) {
    this.catalog = catalog;
    // Copy prototype's validators:
    this.validators = $.extend({}, this.validators);
    for (var name in validators)
      this.addValidator(name, validators[name].fn, validators[name].priority);
    window.Parsley.trigger('parsley:validator:init');
  },
  // Set new messages locale if we have dictionary loaded in ParsleyConfig.i18n
    if ('undefined' === typeof this.catalog[locale])
      throw new Error(locale + ' is not available in the catalog');
    this.locale = locale;
    return this;
  },
  addCatalog: function (locale, messages, set) {
    if ('object' === typeof messages)
    if (true === set)
      return this.setLocale(locale);
  },
  // Add a specific message for a given constraint in a given locale
  addMessage: function (locale, name, message) {
    if ('undefined' === typeof this.catalog[locale])
    this.catalog[locale][name] = message;
  },
  // Add messages for a given locale
    for (var name in nameMessageObject)
      this.addMessage(locale, name, nameMessageObject[name]);
    return this;
  },
  //
  //    addValidator('custom', {
  //        validateString: function(value, from, to) {},
  //        priority: 22,
  //          en: "Hey, that's no good",
  //          fr: "Aye aye, pas bon du tout",
  //        }
  //    })
  // Old API was addValidator(name, function, priority)
  addValidator: function (name, arg1, arg2) {
    if (this.validators[name])
    else if (ParsleyDefaults.hasOwnProperty(name)) {
      ParsleyUtils.warn('"' + name + '" is a restricted keyword and is not a valid validator name.');
      return;
    }
  },
  updateValidator: function (name, arg1, arg2) {
      ParsleyUtils.warn('Validator "' + name + '" is not already defined.');
      return this.addValidator(...arguments);
    }
    return this._setValidator(...arguments);
  },
  removeValidator: function (name) {
    if (!this.validators[name])
      ParsleyUtils.warn('Validator "' + name + '" is not defined.');
    delete this.validators[name];
    return this;
  },
  _setValidator: function (name, validator, priority) {
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
      this.addMessage(locale, name, validator.messages[locale]);
    return this;
  },
  getErrorMessage: function (constraint) {
    var message;
    // Type constraints are a bit different, we have to match their requirements too to find right error message
    if ('type' === constraint.name) {
      message = typeMessages[constraint.requirements];
    } else
      message = this.formatMessage(this.catalog[this.locale][constraint.name], constraint.requirements);
  },
  formatMessage: function (string, parameters) {
    if ('object' === typeof parameters) {
        string = this.formatMessage(string, parameters[i]);
      return string;
    }
    return 'string' === typeof string ? string.replace(/%s/i, parameters) : '';
  },
  // Here is the Parsley default validators list.
  // A validator is an object with the following key values:
  //  - priority: an integer
  //  - requirement: 'string' (default), 'integer', 'number', 'regexp' or an Array of these
  //  - validateString, validateMultiple, validateNumber: functions returning `true`, `false` or a promise
  // Alternatively, a validator can be a function that returns such an object
  //
    notblank: {
      validateString: function(value) {
      },
      priority: 2
    required: {
      validateMultiple: function(values) {
      },
      validateString: function(value) {
        return /\S/.test(value);
      },
      priority: 512
    },
      validateString: function(value, type, {step = '1', base = 0} = {}) {
        var regex = typeRegexes[type];
          throw new Error('validator type `' + type + '` is not supported');
        }
        if (!regex.test(value))
          return false;
        if ('number' === type) {
            var nb = Number(value);
            var decimals = Math.max(decimalPlaces(step), decimalPlaces(base));
              return false;
            // Be careful of rounding errors by using integers.
            if ((toInt(nb) - toInt(base)) % toInt(step) != 0)
              return false;
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
      validateString: function(value, regexp) {
        return regexp.test(value);
      },
      requirementType: 'regexp',
      priority: 64
    },
    minlength: {
      validateString: function (value, requirement) {
        return value.length >= requirement;
      },
      requirementType: 'integer',
      priority: 30
    },
    maxlength: {
      validateString: function (value, requirement) {
        return value.length <= requirement;
      },
      requirementType: 'integer',
      priority: 30
    },
    length: {
      validateString: function (value, min, max) {
        return value.length >= min && value.length <= max;
      },
      requirementType: ['integer', 'integer'],
      priority: 30
    },
    mincheck: {
      validateMultiple: function (values, requirement) {
        return values.length >= requirement;
      },
      requirementType: 'integer',
      priority: 30
    },
    maxcheck: {
      validateMultiple: function (values, requirement) {
        return values.length <= requirement;
      },
      requirementType: 'integer',
      priority: 30
    },
    check: {
      validateMultiple: function (values, min, max) {
        return values.length >= min && values.length <= max;
      },
      requirementType: ['integer', 'integer'],
      priority: 30
    },
    min: {
      validateNumber: function (value, requirement) {
        return value >= requirement;
      },
      requirementType: 'number',
      priority: 30
    },
    max: {
      validateNumber: function (value, requirement) {
        return value <= requirement;
      },
      requirementType: 'number',
      priority: 30
    },
    range: {
      validateNumber: function (value, min, max) {
        return value >= min && value <= max;
      },
      requirementType: ['number', 'number'],
      priority: 30
    },
    equalto: {
      validateString: function (value, refOrValue) {
        var $reference = $(refOrValue);
        if ($reference.length)
          return value === $reference.val();
        else
          return value === refOrValue;
      },
      priority: 256
    }
  }
};
export default ParsleyValidatorRegistry;
