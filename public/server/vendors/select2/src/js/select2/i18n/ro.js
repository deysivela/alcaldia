define(function () {
  // Romanian
  return {
    errorLoading: function () {
      return 'Rezultatele nu au putut fi incărcate.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars !== 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Vă rugăm să introduceți ' + remainingChars +
        'sau mai multe caractere';
      return message;
    loadingMore: function () {
      return 'Se încarcă mai multe rezultate…';
    maximumSelected: function (args) {
      var message = 'Aveți voie să selectați cel mult ' + args.maximum;
      message += ' element';
      if (args.maximum !== 1) {
        message += 'e';
      }
      return message;
    },
      return 'Nu au fost găsite rezultate';
    },
    searching: function () {
    }
  };
});
