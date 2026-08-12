define([
  'jquery'
], function ($) {
  function EventRelay () { }
    var self = this;
    var relayEvents = [
      'open', 'opening',
      'close', 'closing',
      'select', 'selecting',
      'unselect', 'unselecting'
    ];
    var preventableEvents = ['opening', 'closing', 'selecting', 'unselecting'];
    container.on('*', function (name, params) {
      if ($.inArray(name, relayEvents) === -1) {
      }
      // The parameters should always be an object
      params = params || {};
      // Generate the jQuery event for the Select2 event
      var evt = $.Event('select2:' + name, {
      });
      self.$element.trigger(evt);
      if ($.inArray(name, preventableEvents) === -1) {
        return;
      }
      params.prevented = evt.isDefaultPrevented();
  };
});
