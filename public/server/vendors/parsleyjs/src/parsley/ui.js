import $ from 'jquery';
import ParsleyUtils from './utils';
var diffResults = function (newResult, oldResult, deep) {
  var kept = [];
  for (var i = 0; i < newResult.length; i++) {
    var found = false;
      if (newResult[i].assert.name === oldResult[j].assert.name) {
        found = true;
      }
    if (found)
      kept.push(newResult[i]);
    else
      added.push(newResult[i]);
  return {
    kept: kept,
    added: added,
    removed: !deep ? diffResults(oldResult, newResult, true).added : []
  };
ParsleyUI.Form = {
  _actualizeTriggers: function () {
    this.$element.on('submit.Parsley', evt => { this.onSubmitValidate(evt); });
    this.$element.on('click.Parsley', 'input[type="submit"], button[type="submit"]', evt => { this.onSubmitButton(evt); });
    // UI could be disabled
    if (false === this.options.uiEnabled)
    this.$element.attr('novalidate', '');
  focus: function () {
    this._focusedField = null;
    if (true === this.validationResult || 'none' === this.options.focus)
    for (var i = 0; i < this.fields.length; i++) {
      var field = this.fields[i];
      if (true !== field.validationResult && field.validationResult.length > 0 && 'undefined' === typeof field.options.noFocus) {
        if ('first' === this.options.focus)
          break;
    }
    if (null === this._focusedField)
    return this._focusedField.focus();
  },
    // Reset all event listeners
    this.$element.off('.Parsley');
  }
};
ParsleyUI.Field = {
  _reflowUI: function () {
    this._buildUI();
    // If this field doesn't have an active UI don't bother doing something
      return;
    // Diff between two validation results
    // Then store current validation result for next reflow
    this._ui.lastValidationResult = this.validationResult;
    this._manageStatusClass();
    // Add, remove, updated errors messages
    this._manageErrorsMessages(diff);
    // Triggers impl
    // If field is not valid for the first time, bind keyup trigger to ease UX and quickly inform user
      this._failedOnce = true;
    }
  },
  getErrorsMessages: function () {
    // No error message, field is valid
    if (true === this.validationResult)
    var messages = [];
    for (var i = 0; i < this.validationResult.length; i++)
       this._getErrorMessage(this.validationResult[i].assert));
    return messages;
  // It's a goal of Parsley that this method is no longer required [#1073]
  addError: function (name, {message, assert, updateClass = true} = {}) {
    this._addError(name, {message, assert});
    if (updateClass)
  },
  // It's a goal of Parsley that this method is no longer required [#1073]
    this._buildUI();
    this._updateError(name, {message, assert});
    if (updateClass)
      this._errorClass();
  },
  // It's a goal of Parsley that this method is no longer required [#1073]
    this._buildUI();
    this._removeError(name);
    // edge case possible here: remove a standard Parsley error that is still failing in this.validationResult
    // but highly improbable cuz' manually removing a well Parsley handled error makes no sense.
    if (updateClass)
  },
    if (this.hasConstraints() && this.needsValidation() && true === this.validationResult)
      this._successClass();
    else if (this.validationResult.length > 0)
    else
      this._resetClass();
  _manageErrorsMessages: function (diff) {
    if ('undefined' !== typeof this.options.errorsMessagesDisabled)
      return;
    // Case where we have errorMessage option that configure an unique field error message, regardless failing validators
      if ((diff.added.length || diff.kept.length)) {
        this._insertErrorWrapper();
        if (0 === this._ui.$errorsWrapper.find('.parsley-custom-error-message').length)
            .append(
              $(this.options.errorTemplate)
              .addClass('parsley-custom-error-message')
            );
          .addClass('filled')
          .find('.parsley-custom-error-message')
          .html(this.options.errorMessage);
      return this._ui.$errorsWrapper
        .removeClass('filled')
        .find('.parsley-custom-error-message')
        .remove();
    // Show, hide, update failing constraints messages
    for (var i = 0; i < diff.removed.length; i++)
      this._removeError(diff.removed[i].assert.name);
    for (i = 0; i < diff.added.length; i++)
      this._addError(diff.added[i].assert.name, {message: diff.added[i].errorMessage, assert: diff.added[i].assert});
      this._updateError(diff.kept[i].assert.name, {message: diff.kept[i].errorMessage, assert: diff.kept[i].assert});
  },
  _addError: function (name, {message, assert}) {
    this._insertErrorWrapper();
    this._ui.$errorsWrapper
      .addClass('filled')
      .append(
        $(this.options.errorTemplate)
        .html(message || this._getErrorMessage(assert))
      );
  },
    this._ui.$errorsWrapper
      .addClass('filled')
      .find('.parsley-' + name)
      .html(message || this._getErrorMessage(assert));
  _removeError: function (name) {
    this._ui.$errorsWrapper
      .removeClass('filled')
      .find('.parsley-' + name)
      .remove();
  },
    var customConstraintErrorMessage = constraint.name + 'Message';
    if ('undefined' !== typeof this.options[customConstraintErrorMessage])
      return window.Parsley.formatMessage(this.options[customConstraintErrorMessage], constraint.requirements);
    return window.Parsley.getErrorMessage(constraint);
  },
    // UI could be already built or disabled
    if (this._ui || false === this.options.uiEnabled)
      return;
    var _ui = {};
    // Give field its Parsley id in DOM
    /** Generate important UI elements and store them in this **/
    // $errorClassHandler is the $element that woul have parsley-error and parsley-success classes
    _ui.$errorClassHandler = this._manageClassHandler();
    _ui.errorsWrapperId = 'parsley-id-' + (this.options.multiple ? 'multiple-' + this.options.multiple : this.__id__);
    _ui.$errorsWrapper = $(this.options.errorsWrapper).attr('id', _ui.errorsWrapperId);
    _ui.lastValidationResult = [];
    _ui.validationInformationVisible = false;
    // Store it in this for later
  // Determine which element will have `parsley-error` and `parsley-success` classes
  _manageClassHandler: function () {
    // An element selector could be passed through DOM with `data-parsley-class-handler=#foo`
    if ('string' === typeof this.options.classHandler && $(this.options.classHandler).length)
      return $(this.options.classHandler);
    // Class handled could also be determined by function given in Parsley options
    var $handler = this.options.classHandler.call(this, this);
    // If this function returned a valid existing DOM element, go for it
    if ('undefined' !== typeof $handler && $handler.length)
      return $handler;
    if (!this.options.multiple || this.$element.is('select'))
      return this.$element;
    // But if multiple element (radio, checkbox), that would be their parent
    return this.$element.parent();
  },
  _insertErrorWrapper: function () {
    // Nothing to do if already inserted
    if (0 !== this._ui.$errorsWrapper.parent().length)
      return this._ui.$errorsWrapper.parent();
    if ('string' === typeof this.options.errorsContainer) {
      if ($(this.options.errorsContainer).length)
        return $(this.options.errorsContainer).append(this._ui.$errorsWrapper);
        ParsleyUtils.warn('The errors container `' + this.options.errorsContainer + '` does not exist in DOM');
    } else if ('function' === typeof this.options.errorsContainer)
    if ('undefined' !== typeof $errorsContainer && $errorsContainer.length)
      return $errorsContainer.append(this._ui.$errorsWrapper);
    if (this.options.multiple)
      $from = $from.parent();
  },
  _actualizeTriggers: function () {
    var $toBind = this._findRelated();
    var trigger;
    $toBind.off('.Parsley');
      $toBind.on(ParsleyUtils.namespaceEvents(this.options.triggerAfterFailure, 'Parsley'), () => {
        this.validate();
    else if (trigger = ParsleyUtils.namespaceEvents(this.options.trigger, 'Parsley')) {
      $toBind.on(trigger, event => {
        this._eventValidate(event);
    }
  },
  _eventValidate: function (event) {
    // do not validate if val length < min threshold on first validation. Once field have been validated once and info
    // about success or failure have been displayed, always validate with this trigger to reflect every yalidation change.
    if (/key|input/.test(event.type))
        return;
    this.validate();
  },
    // Reset all event listeners
    this._failedOnce = false;
    this._actualizeTriggers();
    // Nothing to do if UI never initialized for this field
    if ('undefined' === typeof this._ui)
    // Reset all errors' li
    this._ui.$errorsWrapper
      .children()
      .remove();
    // Reset validation class
    // Reset validation flags and last validation result
    this._ui.lastValidationResult = [];
    this._ui.validationInformationVisible = false;
  _destroyUI: function () {
    this._resetUI();
    if ('undefined' !== typeof this._ui)
    delete this._ui;
  },
    this._ui.validationInformationVisible = true;
    this._ui.$errorClassHandler.removeClass(this.options.errorClass).addClass(this.options.successClass);
  },
    this._ui.validationInformationVisible = true;
    this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass);
  },
  _resetClass: function () {
    this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass);
  }
};
