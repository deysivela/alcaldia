// This plugin replace Parsley default form behavior that auto bind its fields children
// With this plugin you must register in constructor your form's fields and their constraints
// You have this way a total javascript control over your form validation, and nothing needed in DOM
(function ($) {
  window.ParsleyExtend = window.ParsleyExtend || {};
    // { '#selector' : { constraintName1: value, constraintName2: value2 }, #selector2: { constraintName: value } }
    // { '#selector' : { constraintName1: { requirements: value, priority: value }, constraintName2: value2 } }
      if ('ParsleyForm' !== this.__class__)
        throw new Error('`_bindFields` must be called on a form instance');
      if ('undefined' === typeof this.options.fields)
        throw new Error('bind.js plugin needs to have Parsley instantiated with fields');
      var field;
      this.fields = [];
        if (0 === $(selector).length)
          continue;
        for (var name in this.options.fields[selector]) {
          if ('object' === typeof this.options.fields[selector][name] && !(this.options.fields[selector][name] instanceof Array))
          else
            field.addConstraint(name.toLowerCase(), this.options.fields[selector][name]);
        }
      this.fields.push(field);
    },
    // Do nothing
    _bindConstraints: function () {
      return this;
    }
  });
})(jQuery);
