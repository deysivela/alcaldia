define(function () {
  // Russian
  function ending (count, one, couple, more) {
    if (count % 10 < 5 && count % 10 > 0 &&
        count % 100 < 5 || count % 100 > 20) {
      if (count % 10 > 1) {
        return couple;
      }
    } else {
      return more;
    }
  }
  return {
      return 'Невозможно загрузить результаты';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      var message = 'Пожалуйста, введите на ' + overChars + ' символ';
      message += ending(overChars, '', 'a', 'ов');
      return message;
    inputTooShort: function (args) {
      var message = 'Пожалуйста, введите еще хотя бы ' + remainingChars +
      message += ending(remainingChars, '', 'a', 'ов');
      return message;
    },
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      message += ending(args.maximum, '', 'a', 'ов');
    },
    noResults: function () {
      return 'Совпадений не найдено';
    },
    searching: function () {
      return 'Поиск…';
    }
});
