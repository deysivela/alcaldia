define(function () {
  // Swedish
  return {
    errorLoading: function () {
      return 'Resultat kunde inte laddas.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return message;
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      var message = 'Vänligen skriv in ' + remainingChars +
                    ' eller fler tecken';
    },
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      var message = 'Du kan max välja ' + args.maximum + ' element';
      return message;
    },
    noResults: function () {
      return 'Inga träffar';
    searching: function () {
      return 'Söker…';
    }
  };
});
