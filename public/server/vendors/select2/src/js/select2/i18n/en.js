define(function () {
  // English
  return {
    errorLoading: function () {
      return 'The results could not be loaded.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars != 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Please enter ' + remainingChars + ' or more characters';
      return message;
    },
      return 'Loading more results…';
    maximumSelected: function (args) {
      var message = 'You can only select ' + args.maximum + ' item';
      if (args.maximum != 1) {
        message += 's';
      }
      return message;
    },
      return 'No results found';
    },
    searching: function () {
    }
  };
});
