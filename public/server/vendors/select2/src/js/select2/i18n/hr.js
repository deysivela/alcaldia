define(function () {
  // Croatian
  function character (n) {
    var message = ' ' + n + ' znak';
      if (n % 10 > 1) {
        message += 'a';
      }
    } else {
      message += 'ova';
    }
    return message;
  return {
    errorLoading: function () {
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return 'Unesite ' + character(overChars);
    },
    inputTooShort: function (args) {
      return 'Unesite još ' + character(remainingChars);
    },
    loadingMore: function () {
      return 'Učitavanje rezultata…';
    maximumSelected: function (args) {
      return 'Maksimalan broj odabranih stavki je ' + args.maximum;
    },
    noResults: function () {
      return 'Nema rezultata';
    },
    searching: function () {
      return 'Pretraga…';
    }
  };
});
