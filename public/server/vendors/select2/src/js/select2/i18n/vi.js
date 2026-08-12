define(function () {
  // Vietnamese
  return {
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;
      if (overChars != 1) {
      }
      return message;
    },
      var remainingChars = args.minimum - args.input.length;
      var message = 'Vui lòng nhập nhiều hơn ' + remainingChars + ' ký tự"';
      return message;
    },
      return 'Đang lấy thêm kết quả…';
    maximumSelected: function (args) {
      var message = 'Chỉ có thể chọn được ' + args.maximum + ' lựa chọn';
      return message;
    },
    noResults: function () {
      return 'Không tìm thấy kết quả';
    },
      return 'Đang tìm…';
    }
  };
});
