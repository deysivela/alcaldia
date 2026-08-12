define([
  function countResults (data) {
    var count = 0;
    for (var d = 0; d < data.length; d++) {
      if (item.children) {
        count += countResults(item.children);
        count++;
      }
    }
    return count;
  }
  function MinimumResultsForSearch (decorated, $element, options, dataAdapter) {
    if (this.minimumResultsForSearch < 0) {
      this.minimumResultsForSearch = Infinity;
    decorated.call(this, $element, options, dataAdapter);
  }
    if (countResults(params.data.results) < this.minimumResultsForSearch) {
      return false;
    }
  };
  return MinimumResultsForSearch;
