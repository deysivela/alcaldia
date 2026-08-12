define(function () {
  // Serbian
  function ending (count, one, some, many) {
    if (count % 10 == 1 && count % 100 != 11) {
      return one;
    }
      (count % 100 < 12 || count % 100 > 14)) {
        return some;
    }
    return many;
  return {
    errorLoading: function () {
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      var message = 'Obrišite ' + overChars + ' simbol';
      message += ending(overChars, '', 'a', 'a');
      return message;
    inputTooShort: function (args) {
      var message = 'Ukucajte bar još ' + remainingChars + ' simbol';
      return message;
    },
    loadingMore: function () {
      return 'Preuzimanje još rezultata…';
    maximumSelected: function (args) {
      message += ending(args.maximum, 'u', 'e', 'i');
    },
    noResults: function () {
      return 'Ništa nije pronađeno';
    },
    searching: function () {
      return 'Pretraga…';
    }
});
