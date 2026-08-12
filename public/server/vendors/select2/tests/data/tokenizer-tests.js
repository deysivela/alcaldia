module('Data adaptor - Tokenizer');
  assert.expect(2);
  var SelectData = require('select2/data/select');
  var Tags = require('select2/data/tags');
  var Options = require('select2/options');
  var Utils = require('select2/utils');
  var TokenizedSelect = Utils.Decorate(
    Utils.Decorate(SelectData, Tags),
  );
  var options = new Options({
    tags: true,
    tokenSeparators: [',']
  });
  var container = new MockContainer();
  var $container = $('<div></div>');
  var data = new TokenizedSelect($select, options);
  data.bind(container, $container);
  data.on('select', function () {
  });
  data.query({
  }, function () {
  });
});
  assert.expect(3);
  var SelectData = require('select2/data/select');
  var Tokenizer = require('select2/data/tokenizer');
  var Options = require('select2/options');
  var Utils = require('select2/utils');
  var $ = require('jquery');
  var TokenizedSelect = Utils.Decorate(
    Utils.Decorate(SelectData, Tags),
    Tokenizer
  var $select = $('#qunit-fixture .single');
  var options = new Options({
    tokenSeparators: [','],
    createTag: function () {
      assert.ok(true, 'createTag should have been called');
    }
  });
  container.dropdown = container.selection = {};
  var data = new TokenizedSelect($select, options);
  data.bind(container, $container);
  data.on('select', function (params) {
    if (params.data == null) {
      assert.ok(false, 'Null data should never be selected');
  });
  data.query({
    term: 'first,second'
  }, function () {
    assert.ok(true, 'The callback should have succeeded');
});
test('createTag returning null does not cut the term', function (assert) {
  assert.expect(4);
  var Tokenizer = require('select2/data/tokenizer');
  var Tags = require('select2/data/tags');
  var Utils = require('select2/utils');
  var TokenizedSelect = Utils.Decorate(
    Utils.Decorate(SelectData, Tags),
  );
  var $select = $('#qunit-fixture .single');
  var options = new Options({
    tags: true,
    tokenSeparators: [',', '"'],
      var term = params.term;
      // Ignore blanks
      if (term.length === 0) {
        return null;
      }
      // Ignore the leading quote
        return null;
      }
      if (term[0] === '"' && term[term.length - 1] !== '"') {
        return null;
      }
      return {
        id: term,
      };
  });
  var container = new MockContainer();
  container.dropdown = container.selection = {};
  var $container = $('<div></div>');
  var data = new TokenizedSelect($select, options);
  data.on('select', function (params) {
    assert.ok(params.data, 'Data should not be null');
    assert.equal(
      params.data.id,
      '"first, second"',
    );
    assert.equal(
      params.data.text,
      'first, second',
    );
  });
  data.query({
    term: '"first, second",abc'
    assert.ok(true, 'The callback should have succeeded');
  });
});
test('works with multiple tokens given', function (assert) {
  var SelectData = require('select2/data/select');
  var Tags = require('select2/data/tags');
  var Options = require('select2/options');
  var Utils = require('select2/utils');
  var $ = require('jquery');
  var TokenizedSelect = Utils.Decorate(
    Utils.Decorate(SelectData, Tags),
  );
  var $select = $('#qunit-fixture .multiple');
    tags: true,
  });
  var container = new MockContainer();
  var $container = $('<div></div>');
  var data = new TokenizedSelect($select, options);
  data.on('select', function () {
    assert.ok(true, 'The select event should be triggered');
  });
  data.query({
    term: 'first,second,third'
    assert.ok(true, 'The callback should have succeeded');
  });
  assert.equal(
    $select.children('option').length,
    3,
    'The two new tags should have been created'
});