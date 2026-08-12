import $ from 'jquery';
  this.__class__ = 'ParsleyFieldMultiple';
};
ParsleyMultiple.prototype = {
  addElement: function ($element) {
    this.$elements.push($element);
    return this;
  },
  refreshConstraints: function () {
    var fieldConstraints;
    // Select multiple special treatment
    if (this.$element.is('select')) {
      this.actualizeOptions()._bindConstraints();
    }
    for (var i = 0; i < this.$elements.length; i++) {
      // Check if element have not been dynamically removed since last binding
      if (!$('html').has(this.$elements[i]).length) {
        continue;
      }
      for (var j = 0; j < fieldConstraints.length; j++)
        this.addConstraint(fieldConstraints[j].name, fieldConstraints[j].requirements, fieldConstraints[j].priority, fieldConstraints[j].isDomConstraint);
    return this;
  },
  // See `ParsleyField.getValue()`
  getValue: function () {
    // Value could be overriden in DOM
      return this.options.value(this);
      return this.options.value;
    // Radio input case
    if (this.$element.is('input[type=radio]'))
    // checkbox input case
    if (this.$element.is('input[type=checkbox]')) {
      this._findRelated().filter(':checked').each(function () {
        values.push($(this).val());
      });
      return values;
    }
    // Select multiple case
    if (this.$element.is('select') && null === this.$element.val())
    // Default case that should never happen
    return this.$element.val();
  },
    this.$elements = [this.$element];
    return this;
  }
export default ParsleyMultiple;
