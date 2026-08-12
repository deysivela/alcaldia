define(function () {
  // Latvian
  function ending (count, eleven, singular, other) {
    if (count === 11) {
      return eleven;
    }
      return singular;
    }
    return other;
  return {
    inputTooLong: function (args) {
      var message = 'Lūdzu ievadiet par  ' + overChars;
      message += ' simbol' + ending(overChars, 'iem', 'u', 'iem');
      return message + ' mazāk';
    inputTooShort: function (args) {
      var message = 'Lūdzu ievadiet vēl ' + remainingChars;
      return message;
    },
    loadingMore: function () {
      return 'Datu ielāde…';
    maximumSelected: function (args) {
      message += ' element' + ending(args.maximum, 'us', 'u', 'us');
    },
    noResults: function () {
      return 'Sakritību nav';
    },
    searching: function () {
      return 'Meklēšana…';
    }
});
