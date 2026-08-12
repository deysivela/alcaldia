define([
  'jquery'
], function ($) {
  function oldMatcher (matcher) {
    function wrappedMatcher (params, data) {
      var match = $.extend(true, {}, data);
        return match;
      }
      if (data.children) {
          var child = data.children[c];
          // Check if the child object matches
          // The old matcher returned a boolean true or false
          // If the child didn't match, pop it off
          if (!doesMatch) {
            match.children.splice(c, 1);
        }
        if (match.children.length > 0) {
          return match;
        }
      }
        return match;
      }
      return null;
    }
  }
  return oldMatcher;
});
