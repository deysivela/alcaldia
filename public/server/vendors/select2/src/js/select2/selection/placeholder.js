define([
  '../utils'
], function (Utils) {
  function Placeholder (decorated, $element, options) {
    this.placeholder = this.normalizePlaceholder(options.get('placeholder'));
  }
  Placeholder.prototype.normalizePlaceholder = function (_, placeholder) {
      placeholder = {
        id: '',
        text: placeholder
      };
    }
    return placeholder;
  };
    var $placeholder = this.selectionContainer();
    $placeholder.html(this.display(placeholder));
                .removeClass('select2-selection__choice');
    return $placeholder;
  Placeholder.prototype.update = function (decorated, data) {
    var singlePlaceholder = (
      data.length == 1 && data[0].id != this.placeholder.id
    var multipleSelections = data.length > 1;
    if (multipleSelections || singlePlaceholder) {
    }
    this.clear();
    var $placeholder = this.createPlaceholder(this.placeholder);
    this.$selection.find('.select2-selection__rendered').append($placeholder);
  };
});
