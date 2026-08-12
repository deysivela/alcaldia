define(function () {
  // Danish
  return {
    errorLoading: function () {
      return 'Resultaterne kunne ikke indlæses.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return message;
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      var message = 'Angiv venligst ' + remainingChars + ' tegn mere';
      return message;
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      var message = 'Du kan kun vælge ' + args.maximum + ' emne';
      if (args.maximum != 1) {
        message += 'r';
      }
      return message;
    noResults: function () {
      return 'Ingen resultater fundet';
    },
      return 'Søger…';
    }
  };
});
