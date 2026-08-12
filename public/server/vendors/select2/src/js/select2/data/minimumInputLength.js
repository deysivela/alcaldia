define([
  function MinimumInputLength (decorated, $e, options) {
    this.minimumInputLength = options.get('minimumInputLength');
    decorated.call(this, $e, options);
  MinimumInputLength.prototype.query = function (decorated, params, callback) {
    params.term = params.term || '';
      this.trigger('results:message', {
        message: 'inputTooShort',
          minimum: this.minimumInputLength,
          input: params.term,
          params: params
        }
      });
      return;
    }
    decorated.call(this, params, callback);
  };
});
