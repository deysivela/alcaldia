define([
  function SelectOnClose () { }
  SelectOnClose.prototype.bind = function (decorated, container, $container) {
    decorated.call(this, container, $container);
    container.on('close', function (params) {
    });
  SelectOnClose.prototype._handleSelectOnClose = function (_, params) {
    if (params && params.originalSelect2Event != null) {
      var event = params.originalSelect2Event;
      // Don't select an item if the close event was triggered from a select or
      if (event._type === 'select' || event._type === 'unselect') {
        return;
      }
    var $highlightedResults = this.getHighlightedResults();
    // Only select highlighted results
    if ($highlightedResults.length < 1) {
      return;
    }
    var data = $highlightedResults.data('data');
    if (
      (data.element == null && data.selected)
    ) {
      return;
    }
        data: data
  };
  return SelectOnClose;
});
