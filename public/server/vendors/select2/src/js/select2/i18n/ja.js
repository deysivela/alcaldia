define(function () {
  // Japanese
  return {
    errorLoading: function () {
      return '結果が読み込まれませんでした';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return message;
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      var message = '少なくとも ' + remainingChars + ' 文字を入力してください';
      return message;
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      var message = args.maximum + ' 件しか選択できません';
      return message;
    },
    noResults: function () {
      return '対象が見つかりません';
    searching: function () {
      return '検索しています…';
    }
  };
});
