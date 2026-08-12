import $ from 'jquery';
import ParsleyUtils from './utils';
  string: function(string) {
    return string;
  },
  integer: function(string) {
    if (isNaN(string))
      throw 'Requirement is not an integer: "' + string + '"';
    return parseInt(string, 10);
  },
  number: function(string) {
    if (isNaN(string))
      throw 'Requirement is not a number: "' + string + '"';
    return parseFloat(string);
  },
  reference: function(string) { // Unused for now
    var result = $(string);
    if (result.length === 0)
      throw 'No such reference: "' + string + '"';
    return result;
  },
  boolean: function(string) {
    return string !== 'false';
  },
  object: function(string) {
    return ParsleyUtils.deserializeValue(string);
  },
  regexp: function(regexp) {
    var flags = '';
    // Test if RegExp is literal, if not, nothing to be done, otherwise, we need to isolate flags and pattern
      // Replace the regexp literal string with the first match group: ([gimy]*)
      // If no flag is present, this will be a blank string
      flags = regexp.replace(/.*\/([gimy]*)$/, '$1');
      // Again, replace the regexp literal string with the first match group:
      // everything excluding the opening and closing slashes and the flags
      regexp = regexp.replace(new RegExp('^/(.*?)/' + flags + '$'), '$1');
    } else {
      // Anchor regexp:
      regexp = '^' + regexp + '$';
    }
    return new RegExp(regexp, flags);
  }
};
var convertArrayRequirement = function(string, length) {
  var m = string.match(/^\s*\[(.*)\]\s*$/);
    throw 'Requirement is not an array: "' + string + '"';
  var values = m[1].split(',').map(ParsleyUtils.trimString);
  if (values.length !== length)
    throw 'Requirement has ' + values.length + ' values when ' + length + ' are needed';
  return values;
};
var convertRequirement = function(requirementType, string) {
  var converter = requirementConverters[requirementType || 'string'];
  if (!converter)
  return converter(string);
};
var convertExtraOptionRequirement = function(requirementSpec, string, extraOptionReader) {
  var main = null;
  var extra = {};
  for (var key in requirementSpec) {
      var value = extraOptionReader(key);
      if ('string' === typeof value)
        value = convertRequirement(requirementSpec[key], value);
      extra[key] = value;
    } else {
      main = convertRequirement(requirementSpec[key], string);
    }
  }
  return [main, extra];
};
// A Validator needs to implement the methods `validate` and `parseRequirements`
var ParsleyValidator = function(spec) {
  $.extend(true, this, spec);
};
ParsleyValidator.prototype = {
  validate: function(value, requirementFirstArg) {
      if (arguments.length > 3)  // If more args then value, requirement, instance...
        requirementFirstArg = [].slice.call(arguments, 1, -1);  // Skip first arg (value) and last (instance), combining the rest
      return this.fn.call(this, value, requirementFirstArg);
    if ($.isArray(value)) {
      if (!this.validateMultiple)
        throw 'Validator `' + this.name + '` does not handle multiple values';
      return this.validateMultiple(...arguments);
      if (this.validateNumber) {
        if (isNaN(value))
          return false;
        arguments[0] = parseFloat(arguments[0]);
      }
      if (this.validateString) {
        return this.validateString(...arguments);
      }
      throw 'Validator `' + this.name + '` only handles multiple values';
    }
  },
  // Parses `requirements` into an array of arguments,
  // according to `this.requirementType`
  parseRequirements: function(requirements, extraOptionReader) {
    if ('string' !== typeof requirements) {
      // Assume requirement already parsed
      // but make sure we return an array
      return $.isArray(requirements) ? requirements : [requirements];
    }
    var type = this.requirementType;
    if ($.isArray(type)) {
      for (var i = 0; i < values.length; i++)
        values[i] = convertRequirement(type[i], values[i]);
      return values;
    } else if ($.isPlainObject(type)) {
      return convertExtraOptionRequirement(type, requirements, extraOptionReader);
    } else {
      return [convertRequirement(type, requirements)];
    }
  },
  // Defaults:
  requirementType: 'string',
  priority: 2
};
export default ParsleyValidator;
