define(function () {
  // Catalan
  return {
    errorLoading: function () {
      return 'La càrrega ha fallat';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars == 1) {
      } else {
        message += 'àcters';
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Si us plau, introdueix ' + remainingChars + ' car';
      if (remainingChars == 1) {
        message += 'àcter';
        message += 'àcters';
      return message;
    },
    loadingMore: function () {
      return 'Carregant més resultats…';
    },
      var message = 'Només es pot seleccionar ' + args.maximum + ' element';
      if (args.maximum != 1) {
        message += 's';
      }
      return message;
    },
    noResults: function () {
    },
    searching: function () {
      return 'Cercant…';
  };
});
