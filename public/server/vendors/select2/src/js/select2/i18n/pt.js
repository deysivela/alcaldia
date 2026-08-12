define(function () {
  // European Portuguese
  return {
    errorLoading: function () {
      return 'Os resultados não puderam ser carregados.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      message += overChars != 1 ? 'caracteres' : 'carácter';
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Introduza ' + remainingChars + ' ou mais caracteres';
      return message;
    },
      return 'A carregar mais resultados…';
    maximumSelected: function (args) {
      var message = 'Apenas pode seleccionar ' + args.maximum + ' ';
      message += args.maximum != 1 ? 'itens' : 'item';
      return message;
    },
    noResults: function () {
      return 'Sem resultados';
    searching: function () {
    }
  };
});
