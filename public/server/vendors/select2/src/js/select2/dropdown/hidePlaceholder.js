define([
  function HidePlaceholder (decorated, $element, options, dataAdapter) {
    this.placeholder = this.normalizePlaceholder(options.get('placeholder'));
    decorated.call(this, $element, options, dataAdapter);
  HidePlaceholder.prototype.append = function (decorated, data) {
    data.results = this.removePlaceholder(data.results);
  };
  HidePlaceholder.prototype.normalizePlaceholder = function (_, placeholder) {
      placeholder = {
        id: '',
      };
    }
    return placeholder;
  };
  HidePlaceholder.prototype.removePlaceholder = function (_, data) {
    var modifiedData = data.slice(0);
    for (var d = data.length - 1; d >= 0; d--) {
      if (this.placeholder.id === item.id) {
        modifiedData.splice(d, 1);
    }
    return modifiedData;
  return HidePlaceholder;
});
