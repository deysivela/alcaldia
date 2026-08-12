define([
  'jquery',
  './base',
  '../utils',
  '../keys'
], function ($, BaseSelection, Utils, KEYS) {
  function SingleSelection () {
    SingleSelection.__super__.constructor.apply(this, arguments);
  }
  SingleSelection.prototype.render = function () {
    $selection.addClass('select2-selection--single');
    $selection.html(
      '<span class="select2-selection__arrow" role="presentation">' +
      '</span>'
    );
    return $selection;
  };
  SingleSelection.prototype.bind = function (container, $container) {
    var self = this;
    var id = container.id + '-container';
    this.$selection.find('.select2-selection__rendered').attr('id', id);
    this.$selection.on('mousedown', function (evt) {
      // Only respond to left clicks
        return;
      self.trigger('toggle', {
      });
    });
      // User focuses on the container
    });
    this.$selection.on('blur', function (evt) {
      // User exits the container
    });
      if (!container.isOpen()) {
        self.$selection.focus();
      }
    });
      self.update(params.data);
    });
  };
    this.$selection.find('.select2-selection__rendered').empty();
  };
  SingleSelection.prototype.display = function (data, container) {
    var escapeMarkup = this.options.get('escapeMarkup');
    return escapeMarkup(template(data, container));
  };
  SingleSelection.prototype.selectionContainer = function () {
    return $('<span></span>');
  SingleSelection.prototype.update = function (data) {
    if (data.length === 0) {
      this.clear();
      return;
    var selection = data[0];
    var $rendered = this.$selection.find('.select2-selection__rendered');
    var formatted = this.display(selection, $rendered);
    $rendered.prop('title', selection.title || selection.text);
  };
  return SingleSelection;
