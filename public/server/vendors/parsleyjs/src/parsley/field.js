import $ from 'jquery';
import ConstraintFactory from './factory/constraint';
import ParsleyUI from './ui';
import ParsleyUtils from './utils';
  this.__class__ = 'ParsleyField';
  this.$element = $(field);
  if ('undefined' !== typeof parsleyFormInstance) {
  }
  this.options = options;
  this.domOptions = domOptions;
  // Initialize some properties
  this.constraintsByName = {};
  this.validationResult = true;
  this._bindConstraints();
};
var statusMapping = {pending: null, resolved: true, rejected: false};
ParsleyField.prototype = {
  // Validate field and trigger some events for mainly `ParsleyUI`
  // @returns `true`, an array of the validators that failed, or
  // `null` if validation is not finished. Prefer using whenValidate
    if (arguments.length >= 1 && !$.isPlainObject(options)) {
      options = {options};
    }
    var promise = this.whenValidate(options);
    if (!promise)  // If excluded with `group` option
      return true;
    switch (promise.state()) {
      case 'pending': return null;
      case 'resolved': return true;
      case 'rejected': return this.validationResult;
    }
  },
  // Validate field and trigger some events for mainly `ParsleyUI`
  // @returns a promise that succeeds only when all validations do
  // or `undefined` if field is not in the given `group`.
  whenValidate: function ({force, group} =  {}) {
    // do not validate a field if not the same as given validation group
    this.refreshConstraints();
    if (group && !this._isInGroup(group))
      return;
    // Field Validate event. `this.value` could be altered for custom needs
    this._trigger('validate');
    return this.whenValid({force, value: this.value, _refreshed: true})
      .always(() => { this._reflowUI(); })
      .done(() =>   { this._trigger('success'); })
      .fail(() =>   { this._trigger('error'); })
      .always(() => { this._trigger('validated'); })
      .pipe(...this._pipeAccordingToValidationResult());
  hasConstraints: function () {
  },
  // An empty optional field does not need validation
    if ('undefined' === typeof value)
      value = this.getValue();
    // If a field is empty and not required, it is valid
    // Except if `data-parsley-validate-if-empty` explicitely added, useful for some custom validators
    if (!value.length && !this._isRequired() && 'undefined' === typeof this.options.validateIfEmpty)
      return false;
    return true;
  _isInGroup: function (group) {
    if ($.isArray(this.options.group))
      return -1 !== $.inArray(group, this.options.group);
  },
  // Just validate field. Do not trigger any event.
  // Returns `true` iff all constraints pass, `false` if there are failures,
  // or `null` if the result can not be determined yet (depends on a promise)
  isValid: function (options) {
    if (arguments.length >= 1 && !$.isPlainObject(options)) {
      ParsleyUtils.warnOnce('Calling isValid on a parsley field without passing arguments as an object is deprecated.');
      var [force, value] = arguments;
    }
    var promise = this.whenValid(options);
      return true;
    return statusMapping[promise.state()];
  },
  // Just validate field. Do not trigger any event.
  // @returns a promise that succeeds only when all validations do
  // The argument `force` will force validation of empty fields.
  // If a `value` is given, it will be validated instead of the value of the input.
  whenValid: function ({force = false, value, group, _refreshed} = {}) {
    // Recompute options and rebind constraints to have latest changes
    if (!_refreshed)
      this.refreshConstraints();
    // do not validate a field if not the same as given validation group
    if (group && !this._isInGroup(group))
      return;
    this.validationResult = true;
    // A field without constraint is valid
    if (!this.hasConstraints())
      return $.when();
    // Value could be passed as argument, needed to add more power to 'field:validate'
    if ('undefined' === typeof value || null === value)
    if (!this.needsValidation(value) && true !== force)
      return $.when();
    var groupedConstraints = this._getGroupedConstraints();
    var promises = [];
    $.each(groupedConstraints, (_, constraints) => {
      // Process one group of constraints at a time, we validate the constraints
      // and combine the promises together.
      var promise = $.when(
        ...$.map(constraints, constraint => this._validateConstraint(value, constraint))
      );
      promises.push(promise);
      if (promise.state() === 'rejected')
    });
  },
  // @returns a promise
  _validateConstraint: function(value, constraint) {
    // Map false to a failed promise
    if (false === result)
      result = $.Deferred().reject();
    return $.when(result).fail(errorMessage => {
      if (!(this.validationResult instanceof Array))
      this.validationResult.push({
        assert: constraint,
        errorMessage: 'string' === typeof errorMessage && errorMessage
      });
    });
  },
  // @returns Parsley field computed value that could be overrided or configured in DOM
  getValue: function () {
    var value;
    // Value could be overriden in DOM or with explicit options
    if ('function' === typeof this.options.value)
      value = this.options.value(this);
    else if ('undefined' !== typeof this.options.value)
      value = this.options.value;
      value = this.$element.val();
    // Handle wrong DOM or configurations
    if ('undefined' === typeof value || null === value)
      return '';
    return this._handleWhitespace(value);
  },
  // Actualize options that could have change since previous validation
  // Re-bind accordingly constraints (could be some new, removed or updated)
  refreshConstraints: function () {
    return this.actualizeOptions()._bindConstraints();
  },
  /**
  * Add a new constraint to a field
  *
  * @param {String}   name
  * @param {Mixed}    requirements      optional
  * @param {Boolean}  isDomConstraint   optional
  */
  addConstraint: function (name, requirements, priority, isDomConstraint) {
      var constraint = new ConstraintFactory(this, name, requirements, priority, isDomConstraint);
      // if constraint already exist, delete it and push new version
      if ('undefined' !== this.constraintsByName[constraint.name])
        this.removeConstraint(constraint.name);
      this.constraints.push(constraint);
      this.constraintsByName[constraint.name] = constraint;
    }
  },
  // Remove a constraint
  removeConstraint: function (name) {
      if (name === this.constraints[i].name) {
        this.constraints.splice(i, 1);
      }
    delete this.constraintsByName[name];
    return this;
  },
  // Update a constraint (Remove + re-add)
    return this.removeConstraint(name)
      .addConstraint(name, parameters, priority);
  },
  // # Internals
  // Internal only.
  // Bind constraints from config + options + DOM
  _bindConstraints: function () {
    var constraints = [];
    var constraintsByName = {};
    for (var i = 0; i < this.constraints.length; i++)
      if (false === this.constraints[i].isDomConstraint) {
        constraintsByName[this.constraints[i].name] = this.constraints[i];
      }
    this.constraints = constraints;
    // then re-add Parsley DOM-API constraints
    for (var name in this.options)
      this.addConstraint(name, this.options[name], undefined, true);
    return this._bindHtml5Constraints();
  },
  // Bind specific HTML5 constraints to be HTML5 compliant
  _bindHtml5Constraints: function () {
    // html5 required
    if (this.$element.hasClass('required') || this.$element.attr('required'))
      this.addConstraint('required', true, undefined, true);
    // html5 pattern
    if ('string' === typeof this.$element.attr('pattern'))
      this.addConstraint('pattern', this.$element.attr('pattern'), undefined, true);
    // range
    if ('undefined' !== typeof this.$element.attr('min') && 'undefined' !== typeof this.$element.attr('max'))
    // HTML5 min
    else if ('undefined' !== typeof this.$element.attr('min'))
      this.addConstraint('min', this.$element.attr('min'), undefined, true);
    // HTML5 max
    else if ('undefined' !== typeof this.$element.attr('max'))
    // length
      this.addConstraint('length', [this.$element.attr('minlength'), this.$element.attr('maxlength')], undefined, true);
    // HTML5 minlength
    else if ('undefined' !== typeof this.$element.attr('minlength'))
      this.addConstraint('minlength', this.$element.attr('minlength'), undefined, true);
    // HTML5 maxlength
      this.addConstraint('maxlength', this.$element.attr('maxlength'), undefined, true);
    // html5 types
    var type = this.$element.attr('type');
    if ('undefined' === typeof type)
      return this;
    // Small special case here for HTML5 number: integer validator if step attribute is undefined or an integer value, number otherwise
      return this.addConstraint('type', ['number', {
        step: this.$element.attr('step'),
      }], undefined, true);
    // Regular other HTML5 supported types
    } else if (/^(email|url|range)$/i.test(type)) {
    }
    return this;
  },
  // Field is required if have required constraint without `false` value
  _isRequired: function () {
    if ('undefined' === typeof this.constraintsByName.required)
      return false;
    return false !== this.constraintsByName.required.requirements;
  },
  // Shortcut to trigger an event
  _trigger: function (eventName) {
    return this.trigger('field:' + eventName);
  // Internal only
  // Handles whitespace in a value
  // Use `data-parsley-whitespace="squish"` to auto squish input value
  _handleWhitespace: function (value) {
    if (true === this.options.trimValue)
      ParsleyUtils.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"');
      value = value.replace(/\s{2,}/g, ' ');
    if (('trim' === this.options.whitespace) || ('squish' === this.options.whitespace) || (true === this.options.trimValue))
      value = ParsleyUtils.trimString(value);
  // Internal only.
  // Returns the constraints, grouped by descending priority.
  // The result is thus an array of arrays of constraints.
    if (false === this.options.priorityEnabled)
      return [this.constraints];
    var groupedConstraints = [];
    // Create array unique of priorities
    for (var i = 0; i < this.constraints.length; i++) {
      var p = this.constraints[i].priority;
      index[p].push(this.constraints[i]);
    }
    groupedConstraints.sort(function (a, b) { return b[0].priority - a[0].priority; });
    return groupedConstraints;
};
export default ParsleyField;
