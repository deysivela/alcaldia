import $ from 'jquery';
import ParsleyUtils from './utils';
import ParsleyAbstract from './abstract';
import ParsleyForm from './form';
import ParsleyField from './field';
import ParsleyMultiple from './multiple';
  this.$element = $(element);
  // If the element has already been bound, returns its saved Parsley instance
  if (savedparsleyFormInstance) {
    // If the saved instance has been bound without a ParsleyForm parent and there is one given in this call, add it
    if ('undefined' !== typeof parsleyFormInstance && savedparsleyFormInstance.parent === window.Parsley) {
      savedparsleyFormInstance._resetOptions(savedparsleyFormInstance.options);
    }
    return savedparsleyFormInstance;
  }
  // Parsley must be instantiated with a DOM element or jQuery $element
    throw new Error('You must bind Parsley on an existing element.');
  if ('undefined' !== typeof parsleyFormInstance && 'ParsleyForm' !== parsleyFormInstance.__class__)
  this.parent = parsleyFormInstance || window.Parsley;
  return this.init(options);
};
  init: function (options) {
    this.__class__ = 'Parsley';
    this.__id__ = ParsleyUtils.generateID();
    // Pre-compute options
    this._resetOptions(options);
    if (this.$element.is('form') || (ParsleyUtils.checkAttr(this.$element, this.options.namespace, 'validate') && !this.$element.is(this.options.inputs)))
      return this.bind('parsleyForm');
    // Every other element is bound as a `ParsleyField` or `ParsleyFieldMultiple`
    return this.isMultiple() ? this.handleMultiple() : this.bind('parsleyField');
  },
    return (this.$element.is('input[type=radio], input[type=checkbox]')) || (this.$element.is('select') && 'undefined' !== typeof this.$element.attr('multiple'));
  },
  // Maybe some refactoring would be appreciated here...
  handleMultiple: function () {
    var name;
    var parsleyMultipleInstance;
    // Handle multiple name
    if (this.options.multiple)
    else if ('undefined' !== typeof this.$element.attr('name') && this.$element.attr('name').length)
      this.options.multiple = name = this.$element.attr('name');
    else if ('undefined' !== typeof this.$element.attr('id') && this.$element.attr('id').length)
    // Special select multiple input
    if (this.$element.is('select') && 'undefined' !== typeof this.$element.attr('multiple')) {
      this.options.multiple = this.options.multiple || this.__id__;
      return this.bind('parsleyFieldMultiple');
    // Else for radio / checkboxes, we need a `name` or `data-parsley-multiple` to properly bind it
    } else if (!this.options.multiple) {
      return this;
    }
    // Remove special chars
    this.options.multiple = this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g, '');
    // Add proper `data-parsley-multiple` to siblings if we have a valid multiple name
    if ('undefined' !== typeof name) {
      $('input[name="' + name + '"]').each((i, input) => {
          $(input).attr(this.options.namespace + 'multiple', this.options.multiple);
      });
    }
    // Check here if we don't already have a related multiple instance saved
    for (var i = 0; i < $previouslyRelated.length; i++) {
      parsleyMultipleInstance = $($previouslyRelated.get(i)).data('Parsley');
      if ('undefined' !== typeof parsleyMultipleInstance) {
        if (!this.$element.data('ParsleyFieldMultiple')) {
          parsleyMultipleInstance.addElement(this.$element);
        break;
      }
    // Create a secret ParsleyField instance for every multiple field. It will be stored in `data('ParsleyFieldMultiple')`
    // And will be useful later to access classic `ParsleyField` stuff while being in a `ParsleyFieldMultiple` instance
    this.bind('parsleyField', true);
    return parsleyMultipleInstance || this.bind('parsleyFieldMultiple');
  },
  // Return proper `ParsleyForm`, `ParsleyField` or `ParsleyFieldMultiple`
  bind: function (type, doNotStore) {
    switch (type) {
      case 'parsleyForm':
        parsleyInstance = $.extend(
          new ParsleyForm(this.$element, this.domOptions, this.options),
          new ParsleyAbstract(),
        )._bindFields();
        break;
      case 'parsleyField':
          new ParsleyField(this.$element, this.domOptions, this.options, this.parent),
          new ParsleyAbstract(),
          window.ParsleyExtend
        break;
      case 'parsleyFieldMultiple':
        parsleyInstance = $.extend(
          new ParsleyMultiple(),
          new ParsleyAbstract(),
        )._init();
        break;
      default:
    }
    if (this.options.multiple)
      ParsleyUtils.setAttr(this.$element, this.options.namespace, 'multiple', this.options.multiple);
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
};
export default ParsleyFactory;
