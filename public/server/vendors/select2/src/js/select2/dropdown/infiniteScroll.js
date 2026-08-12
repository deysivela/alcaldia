define([
  'jquery'
], function ($) {
  function InfiniteScroll (decorated, $element, options, dataAdapter) {
    this.lastParams = {};
    this.$loadingMore = this.createLoadingMore();
  }
  InfiniteScroll.prototype.append = function (decorated, data) {
    this.$loadingMore.remove();
    decorated.call(this, data);
    if (this.showLoadingMore(data)) {
      this.$results.append(this.$loadingMore);
  };
    var self = this;
    decorated.call(this, container, $container);
    container.on('query', function (params) {
      self.lastParams = params;
    });
    container.on('query:append', function (params) {
      self.loading = true;
    this.$results.on('scroll', function () {
      var isLoadMoreVisible = $.contains(
        document.documentElement,
        self.$loadingMore[0]
      if (self.loading || !isLoadMoreVisible) {
        return;
      }
      var currentOffset = self.$results.offset().top +
      var loadingMoreOffset = self.$loadingMore.offset().top +
        self.$loadingMore.outerHeight(false);
      if (currentOffset + 50 >= loadingMoreOffset) {
        self.loadMore();
      }
  };
  InfiniteScroll.prototype.loadMore = function () {
    this.loading = true;
    params.page++;
    this.trigger('query:append', params);
  };
  InfiniteScroll.prototype.showLoadingMore = function (_, data) {
  };
  InfiniteScroll.prototype.createLoadingMore = function () {
    var $option = $(
      '<li ' +
      'class="select2-results__option select2-results__option--load-more"' +
    );
    var message = this.options.get('translations').get('loadingMore');
    return $option;
  return InfiniteScroll;
