define([
  function MaximumInputLength (decorated, $e, options) {
    this.maximumInputLength = options.get('maximumInputLength');
    decorated.call(this, $e, options);
  MaximumInputLength.prototype.query = function (decorated, params, callback) {
    params.term = params.term || '';
        params.term.length > this.maximumInputLength) {
      this.trigger('results:message', {
        args: {
          maximum: this.maximumInputLength,
          input: params.term,
          params: params
        }
      });
      return;
    }
    decorated.call(this, params, callback);
  };
});
