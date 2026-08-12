import $ from 'jquery';
import ParsleyUtils from '../utils';
import ParsleyValidator from '../validator';
    throw new Error('ParsleyField or ParsleyFieldMultiple instance expected');
  var validatorSpec = window.Parsley._validatorRegistry.validators[name];
  var validator = new ParsleyValidator(validatorSpec);
    validator: validator,
    name: name,
    priority: priority || parsleyField.options[name + 'Priority'] || validator.priority,
    isDomConstraint: true === isDomConstraint
  });
  this._parseRequirements(parsleyField.options);
};
var capitalize = function(str) {
  var cap = str[0].toUpperCase();
  return cap + str.slice(1);
};
  validate: function(value, instance) {
    return this.validator.validate(value, ...this.requirementList, instance);
  },
  _parseRequirements: function(options) {
      return options[this.name + capitalize(key)];
    });
  }
};
