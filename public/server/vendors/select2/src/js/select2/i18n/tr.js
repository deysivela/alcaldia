define(function () {
  // Turkish
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return message;
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      var message = 'En az ' + remainingChars + ' karakter daha girmelisiniz';
      return message;
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      var message = 'Sadece ' + args.maximum + ' seçim yapabilirsiniz';
      return message;
    },
    noResults: function () {
      return 'Sonuç bulunamadı';
    searching: function () {
      return 'Aranıyor…';
    }
  };
});
