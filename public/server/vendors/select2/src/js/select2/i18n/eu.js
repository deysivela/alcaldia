define(function () {
  // Basque
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars == 1) {
      } else {
        message += overChars + ' karaktere';
      }
      message += ' gutxiago';
      return message;
    inputTooShort: function (args) {
      var message = 'Idatzi ';
      if (remainingChars == 1) {
        message += 'karaktere bat';
      } else {
      }
      return message;
    },
    loadingMore: function () {
      return 'Emaitza gehiago kargatzen…';
    },
      if (args.maximum === 1) {
      } else {
        return args.maximum + ' elementu hauta ditzakezu soilik';
      }
    },
    noResults: function () {
      return 'Ez da bat datorrenik aurkitu';
    },
    searching: function () {
      return 'Bilatzen…';
    }
  };
});
