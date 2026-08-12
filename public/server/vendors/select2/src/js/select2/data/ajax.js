define([
  './array',
  '../utils',
  'jquery'
], function (ArrayAdapter, Utils, $) {
  function AjaxAdapter ($element, options) {
    this.ajaxOptions = this._applyDefaults(options.get('ajax'));
      this.processResults = this.ajaxOptions.processResults;
    }
    AjaxAdapter.__super__.constructor.call(this, $element, options);
  Utils.Extend(AjaxAdapter, ArrayAdapter);
  AjaxAdapter.prototype._applyDefaults = function (options) {
      data: function (params) {
          q: params.term
        });
      },
      transport: function (params, success, failure) {
        var $request = $.ajax(params);
        $request.then(success);
        $request.fail(failure);
        return $request;
      }
    return $.extend({}, defaults, options, true);
  };
    return results;
  };
  AjaxAdapter.prototype.query = function (params, callback) {
    var self = this;
    if (this._request != null) {
      if ($.isFunction(this._request.abort)) {
        this._request.abort();
      }
    }
    var options = $.extend({
      type: 'GET'
    if (typeof options.url === 'function') {
      options.url = options.url.call(this.$element, params);
    }
    if (typeof options.data === 'function') {
      options.data = options.data.call(this.$element, params);
    function request () {
      var $request = options.transport(options, function (data) {
        if (self.options.get('debug') && window.console && console.error) {
          // Check to make sure that the response included a `results` key.
          if (!results || !results.results || !$.isArray(results.results)) {
              'Select2: The AJAX results did not return an array in the ' +
              '`results` key of the response.'
            );
        }
        callback(results);
      }, function () {
        // Only works if the transport exposes a status property
        if ($request.status && $request.status === '0') {
          return;
        self.trigger('results:message', {
          message: 'errorLoading'
        });
      });
      self._request = $request;
    }
    if (this.ajaxOptions.delay && params.term != null) {
      if (this._queryTimeout) {
        window.clearTimeout(this._queryTimeout);
      this._queryTimeout = window.setTimeout(request, this.ajaxOptions.delay);
    } else {
      request();
    }
  };
  return AjaxAdapter;
});
