define(function () {
  // Spanish
  return {
    errorLoading: function () {
      return 'La carga falló';
    },
    inputTooLong: function (args) {
      var remainingChars = args.input.length - args.maximum;
      if (remainingChars == 1) {
      } else {
        message += 'acteres';
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Por favor, introduzca ' + remainingChars + ' car';
      if (remainingChars == 1) {
        message += 'ácter';
        message += 'acteres';
      return message;
    },
    loadingMore: function () {
      return 'Cargando más resultados…';
    },
      var message = 'Sólo puede seleccionar ' + args.maximum + ' elemento';
      if (args.maximum != 1) {
        message += 's';
      }
      return message;
    },
    noResults: function () {
    },
    searching: function () {
      return 'Buscando…';
  };
});
