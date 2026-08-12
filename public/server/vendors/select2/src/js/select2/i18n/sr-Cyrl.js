define(function () {
  // Serbian Cyrilic
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
      var message = 'Обришите ' + overChars + ' симбол';
      message += ending(overChars, '', 'а', 'а');
      return message;
    inputTooShort: function (args) {
      var message = 'Укуцајте бар још ' + remainingChars + ' симбол';
      return message;
    },
    loadingMore: function () {
      return 'Преузимање још резултата…';
    maximumSelected: function (args) {
      message += ending(args.maximum, 'у', 'е', 'и');
    },
    noResults: function () {
      return 'Ништа није пронађено';
    },
    searching: function () {
      return 'Претрага…';
    }
});
