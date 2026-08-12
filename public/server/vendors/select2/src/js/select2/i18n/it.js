define(function () {
  // Italian
  return {
    errorLoading: function () {
      return 'I risultati non possono essere caricati.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars !== 1) {
      } else {
        message += 'e';
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Per favore inserisci ' +remainingChars+ ' o più caratteri';
      return message;
    },
      return 'Caricando più risultati…';
    maximumSelected: function (args) {
      var message = 'Puoi selezionare solo ' + args.maximum + ' element';
      if (args.maximum !== 1) {
        message += 'i';
      } else {
        message += 'o';
      }
    },
    noResults: function () {
      return 'Nessun risultato trovato';
    },
    searching: function () {
    }
  };
});
