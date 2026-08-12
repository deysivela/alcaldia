define(function () {
  // French
  return {
    errorLoading: function () {
      return 'Les résultats ne peuvent pas être chargés.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars !== 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Saisissez ' + remainingChars + ' caractère';
      if (remainingChars !== 1) {
        message += 's';
      return message;
    loadingMore: function () {
      return 'Chargement de résultats supplémentaires…';
    },
      var message = 'Vous pouvez seulement sélectionner ' +
        args.maximum + ' élément';
      if (args.maximum !== 1) {
        message += 's';
      }
      return message;
    },
    noResults: function () {
    },
    searching: function () {
      return 'Recherche en cours…';
  };
});
