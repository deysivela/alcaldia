define(function () {
  // Hebrew
  return {
    errorLoading: function () {
      return 'שגיאה בטעינת התוצאות';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars === 1) {
      } else {
        message += overChars + ' תווים';
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'נא להכניס ';
      if (remainingChars === 1) {
        message += 'תו אחד';
        message += remainingChars + ' תווים';
      message += ' או יותר';
      return message;
    },
    loadingMore: function () {
      return 'טוען תוצאות נוספות…';
    maximumSelected: function (args) {
      if (args.maximum === 1) {
        message += 'פריט אחד';
      } else {
        message += args.maximum + ' פריטים';
      }
      return message;
    },
      return 'לא נמצאו תוצאות';
    },
    searching: function () {
      return 'מחפש…';
    }
});
