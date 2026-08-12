define(function () {
  // Icelandic
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars <= 1) {
      }
      return message + 'i';
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Vinsamlegast skrifið ' + remainingChars + ' staf';
      if (remainingChars > 1) {
        message += 'i';
      message += ' í viðbót';
    },
    loadingMore: function () {
      return 'Sæki fleiri niðurstöður…';
    maximumSelected: function (args) {
    },
    noResults: function () {
      return 'Ekkert fannst';
    },
    searching: function () {
      return 'Leita…';
    }
  };
});
