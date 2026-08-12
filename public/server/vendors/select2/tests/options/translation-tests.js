module('Options - Translations');
var Options = require('select2/options');
test('partial dictionaries can be passed', function (assert) {
    language: {
      searching: function () {
        return 'Something';
      }
    }
  });
  var translations = options.get('translations');
  assert.equal(
    'Something',
  );
  assert.equal(
    translations.get('noResults')(),
    'No results found',
    'You can still get English translations for keys not passed in'
});
