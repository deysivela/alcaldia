define(function () {
  // German
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      return 'Bitte ' + remainingChars + ' Zeichen mehr eingeben';
    loadingMore: function () {
      return 'Lade mehr Ergebnisse…';
    },
    maximumSelected: function (args) {
      var message = 'Sie können nur ' + args.maximum + ' Eintr';
      if (args.maximum === 1) {
        message += 'ag';
        message += 'äge';
      }
      message += ' auswählen';
      return message;
    },
      return 'Keine Übereinstimmungen gefunden';
    searching: function () {
      return 'Suche…';
    }
  };
});
