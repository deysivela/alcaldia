define(function () {
  // Hindi
  return {
    errorLoading: function () {
      return 'परिणामों को लोड नहीं किया जा सका।';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars > 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'कृपया ' + remainingChars + ' या अधिक अक्षर दर्ज करें';
      return message;
    },
      return 'अधिक परिणाम लोड हो रहे है...';
    maximumSelected: function (args) {
      var message = 'आप केवल ' + args.maximum + ' आइटम का चयन कर सकते हैं';
      return message;
    },
    noResults: function () {
      return 'कोई परिणाम नहीं मिला';
    },
    searching: function () {
      return 'खोज रहा है...';
    }
  };
});
