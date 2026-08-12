define(function () {
  // Chinese (Simplified)
  return {
    errorLoading: function () {
      return '无法载入结果。';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      return message;
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;
      var message = '请再输入至少' + remainingChars + '个字符';
      return message;
    loadingMore: function () {
    },
    maximumSelected: function (args) {
      var message = '最多只能选择' + args.maximum + '个项目';
      return message;
    },
    noResults: function () {
      return '未找到结果';
    searching: function () {
      return '搜索中…';
    }
  };
});
