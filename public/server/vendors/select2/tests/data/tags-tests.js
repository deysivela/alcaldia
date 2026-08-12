module('Data adapters - Tags');
var Tags = require('select2/data/tags');
var $ = require('jquery');
var Utils = require('select2/utils');
var SelectTags = Utils.Decorate(SelectData, Tags);
var options = new Options({
});
test('does not trigger on blank or null terms', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.query({
  }, function (data) {
    assert.equal(data.results.length, 1);
    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
  data.query({
  }, function (data) {
    var item = data.results[0];
    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
});
test('white space is trimmed by default', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.query({
  }, function (data) {
    var item = data.results[0];
    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
    term: ' One '
  }, function (data) {
    var item = data.results[0];
    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
test('does not trigger for additional pages', function (assert) {
  data.query({
    page: 2
  }, function (data) {
    var item = data.results[0];
    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
test('creates tag at beginning', function (assert) {
  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 2);
    assert.equal(first.id, 'o');
    assert.equal(first.text, 'o');
});
test('tags can be the only result', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.query({
  }, function (data) {
    var item = data.results[0];
    assert.equal(item.id, 'test');
    assert.equal(item.text, 'test');
  });
test('tags are injected as options', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);
    var $children = $('#qunit-fixture .single option');
    var $tag = $children.last();
    assert.equal($tag.text(), 'test');
  });
});
test('old tags are removed automatically', function (assert) {
  data.query({
    term: 'first'
    assert.equal(data.results.length, 1);
    var $children = $('#qunit-fixture .single option');
    assert.equal($children.length, 2);
  });
    term: 'second'
    assert.equal(data.results.length, 1);
    var $children = $('#qunit-fixture .single option');
    assert.equal($children.length, 2);
    var $tag = $children.last();
    assert.equal($tag.text(), 'second');
  });
test('insertTag controls the tag location', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.insertTag = function (data, tag) {
    data.push(tag);
  data.query({
  }, function (data) {
    var item = data.results[1];
    assert.equal(item.text, 'o');
  });
});
test('insertTag can be controlled through the options', function (assert) {
    insertTag: function (data, tag) {
      data.push(tag);
  });
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.query({
    term: 'o'
    assert.equal(data.results.length, 2);
    assert.equal(item.id, 'o');
    assert.equal(item.text, 'o');
});
test('createTag controls the tag object', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.createTag = function (params) {
      id: 0,
    };
  data.query({
  }, function (data) {
    assert.equal(data.results.length, 1);
    var item = data.results[0];
    assert.equal(item.id, 0);
  });
});
  var data = new SelectTags($('#qunit-fixture .single'), options);
  data.createTag = function (params) {
    return null;
  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 1);
});
  var data = new SelectTags(
    $('#qunit-fixture .single'),
    new Options({
      tags: true,
        return {
          id: params.term,
          text: params.term,
          tag: true
        };
      }
    })
  data.query({
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);
    assert.equal(item.id, 'test');
    assert.equal(item.tag, true);
  });
});