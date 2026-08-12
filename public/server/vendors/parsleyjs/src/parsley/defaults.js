// All these options could be overriden and specified directly in DOM using
// `data-parsley-` default DOM-API
// eg: `inputs` can be set in DOM using `data-parsley-inputs="input, textarea"`
// eg: `data-parsley-stop-on-first-failing-constraint="false"`
  // ### General
  // Default data-namespace for DOM API
  // Supported inputs by default
  inputs: 'input, textarea, select',
  excluded: 'input[type=button], input[type=submit], input[type=reset], input[type=hidden]',
  // Stop validating field on highest priority failing constraint
  // ### Field only
  // identifier used to group together inputs (e.g. radio buttons...)
  // identifier (or array of identifiers) used to validate only a select group of inputs
  group: null,
  // Enable\Disable error messages
  // Key events threshold before validation
  validationThreshold: 3,
  focus: 'first',
  // event(s) that will trigger validation before first failure. eg: `input`...
  // event(s) that will trigger validation after first failure.
  triggerAfterFailure: 'input',
  // Class that would be added on every failing validation Parsley field
  // Same for success validation
  successClass: 'parsley-success',
  // Could also be (and given directly from DOM) a valid selector like `'#div'`
  classHandler: function (ParsleyField) {},
  // Could also be (and given directly from DOM) a valid selector like `'#div'`
  errorsContainer: function (ParsleyField) {},
  errorsWrapper: '<ul class="parsley-errors-list"></ul>',
  // li elem that would receive error message
};
export default ParsleyDefaults;
