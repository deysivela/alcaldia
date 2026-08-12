define(function () {
  // Bulgarian
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars > 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Моля въведете още ' + remainingChars + ' символ';
      if (remainingChars > 1) {
        message += 'a';
      return message;
    loadingMore: function () {
      return 'Зареждат се още…';
    },
      var message = 'Можете да направите до ' + args.maximum + ' ';
      if (args.maximum > 1) {
        message += 'избора';
      } else {
        message += 'избор';
      }
      return message;
    noResults: function () {
      return 'Няма намерени съвпадения';
    },
    searching: function () {
      return 'Търсене…';
  };
});
