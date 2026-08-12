define([
  'jquery'
], function ($) {
  function Tokenizer (decorated, $element, options) {
    var tokenizer = options.get('tokenizer');
      this.tokenizer = tokenizer;
    }
    decorated.call(this, $element, options);
  Tokenizer.prototype.bind = function (decorated, container, $container) {
    decorated.call(this, container, $container);
      $container.find('.select2-search__field');
  };
    var self = this;
    function createAndSelect (data) {
      // Normalize the data object so we can use it for checks
      // Check if the data object already exists as a tag
      // Select it if it doesn't
        return $(this).val() === item.id;
      });
      // If an existing option wasn't found for it, create the option
        var $option = self.option(item);
        $option.attr('data-select2-tag', true);
        self._removeOldTags();
        self.addOptions([$option]);
      }
      select(item);
    }
    function select (data) {
      self.trigger('select', {
      });
    }
    params.term = params.term || '';
    if (tokenData.term !== params.term) {
      // Replace the search term if we have the search box
      if (this.$search.length) {
        this.$search.focus();
      }
      params.term = tokenData.term;
    }
    decorated.call(this, params, callback);
  Tokenizer.prototype.tokenizer = function (_, params, options, callback) {
    var term = params.term;
    var createTag = this.createTag || function (params) {
      return {
        id: params.term,
        text: params.term
      };
    };
      var termChar = term[i];
      if ($.inArray(termChar, separators) === -1) {
        continue;
      }
      var partParams = $.extend({}, params, {
        term: part
      });
      var data = createTag(partParams);
        i++;
        continue;
      }
      callback(data);
      // Reset the term to not include the tokenized portion
      term = term.substr(i + 1) || '';
    }
    return {
    };
  };
});
