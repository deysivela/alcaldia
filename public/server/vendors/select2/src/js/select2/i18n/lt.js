define(function () {
  // rules from
  // http://www.unicode.org/cldr/charts/latest/supplemental/language_plural_rules.html#lt
  function ending(count, one, few, other) {
    if (count % 10 === 1 && (count % 100 < 11 || count % 100 > 19)) {
      return one;
    } else if (
      (count % 10 >= 2 && count % 10 <= 9) &&
      (count % 100 < 11 || count % 100 > 19)) {
      return few;
    } else {
      return other;
    }
  }
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      var message = 'Pašalinkite ' + overChars + ' simbol';
      return message;
    inputTooShort: function (args) {
      var message = 'Įrašykite dar ' + remainingChars + ' simbol';
      message += ending(remainingChars, 'į', 'ius', 'ių');
      return message;
    },
      return 'Kraunama daugiau rezultatų…';
    maximumSelected: function (args) {
      message += ending(args.maximum, 'ą', 'us', 'ų');
      return message;
    },
    noResults: function () {
      return 'Atitikmenų nerasta';
    },
    searching: function () {
    }
});
