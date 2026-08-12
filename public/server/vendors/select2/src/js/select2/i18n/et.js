define(function () {
  // Estonian
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars != 1) {
      }
      message += ' vähem';
      return message;
    inputTooShort: function (args) {
      var message = 'Sisesta ' + remainingChars + ' täht';
      if (remainingChars != 1) {
        message += 'e';
      }
      return message;
    loadingMore: function () {
      return 'Laen tulemusi…';
    },
      var message = 'Saad vaid ' + args.maximum + ' tulemus';
        message += 'e';
      } else {
        message += 't';
      }
      message += ' valida';
      return message;
    },
      return 'Tulemused puuduvad';
    },
    searching: function () {
      return 'Otsin…';
    }
});
