define([
  'jquery',
  './base',
  '../utils'
], function ($, BaseSelection, Utils) {
  function MultipleSelection ($element, options) {
    MultipleSelection.__super__.constructor.apply(this, arguments);
  }
  MultipleSelection.prototype.render = function () {
    $selection.addClass('select2-selection--multiple');
    $selection.html(
    );
  };
  MultipleSelection.prototype.bind = function (container, $container) {
    var self = this;
    this.$selection.on('click', function (evt) {
      self.trigger('toggle', {
      });
    });
      'click',
      function (evt) {
        // Ignore the event if it is disabled
        if (self.options.get('disabled')) {
          return;
        }
        var $selection = $remove.parent();
        var data = $selection.data('data');
        self.trigger('unselect', {
          originalEvent: evt,
          data: data
        });
      }
    );
  MultipleSelection.prototype.clear = function () {
    this.$selection.find('.select2-selection__rendered').empty();
  MultipleSelection.prototype.display = function (data, container) {
    var escapeMarkup = this.options.get('escapeMarkup');
    return escapeMarkup(template(data, container));
  };
  MultipleSelection.prototype.selectionContainer = function () {
    var $container = $(
      '<li class="select2-selection__choice">' +
        '<span class="select2-selection__choice__remove" role="presentation">' +
        '</span>' +
      '</li>'
    );
  };
  MultipleSelection.prototype.update = function (data) {
    this.clear();
      return;
    }
    for (var d = 0; d < data.length; d++) {
      var selection = data[d];
      var $selection = this.selectionContainer();
      var formatted = this.display(selection, $selection);
      $selection.append(formatted);
      $selection.prop('title', selection.title || selection.text);
      $selection.data('data', selection);
      $selections.push($selection);
    var $rendered = this.$selection.find('.select2-selection__rendered');
    Utils.appendMany($rendered, $selections);
  return MultipleSelection;
});
