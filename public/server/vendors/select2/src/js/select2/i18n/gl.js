define(function () {
  // Galician
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars === 1) {
      } else {
        message += overChars + ' caracteres';
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Engada ';
      if (remainingChars === 1) {
        message += 'un carácter';
        message += remainingChars + ' caracteres';
      return message;
    },
    loadingMore: function () {
      return 'Cargando máis resultados…';
    },
      var message = 'Só pode ';
      if (args.maximum === 1) {
        message += 'un elemento';
      } else {
        message += args.maximum + ' elementos';
      }
      return message;
    noResults: function () {
      return 'Non se atoparon resultados';
    },
    searching: function () {
      return 'Buscando…';
  };
});
