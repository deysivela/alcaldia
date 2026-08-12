module('Decorators');
test('overridden - method', function (assert) {
  BaseClass.prototype.hello = function () {
    return 'A';
  function DecoratorClass () {}
  DecoratorClass.prototype.hello = function () {
    return 'B';
  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);
  assert.strictEqual(inst.hello(), 'B');
});
test('overridden - constructor', function (assert) {
    this.inherited = true;
  BaseClass.prototype.hello = function () {
  };
  function DecoratorClass (decorated) {
  }
  DecoratorClass.prototype.other = function () {
    return 'B';
  };
  var inst = new DecoratedClass();
  assert.ok(inst.called);
  assert.ok(!inst.inherited);
test('not overridden - method', function (assert) {
  function BaseClass () {}
  BaseClass.prototype.hello = function () {
  };
  function DecoratorClass () {}
  DecoratorClass.prototype.other = function () {
  };
  var inst = new DecoratedClass();
});
test('not overridden - constructor', function (assert) {
  function BaseClass () {
  }
  BaseClass.prototype.hello = function () {
  };
  function DecoratorClass () {}
  DecoratorClass.prototype.other = function () {
  };
  var inst = new DecoratedClass();
  assert.ok(inst.called);
});
  function BaseClass () {}
    return 'A';
  function DecoratorClass (decorated) {}
  DecoratorClass.prototype.hello = function (decorated) {
  };
  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);
  var inst = new DecoratedClass();
  assert.strictEqual(inst.hello(), 'BAC');
test('inherited - constructor', function (assert) {
  function BaseClass () {
    this.inherited = true;
  BaseClass.prototype.hello = function () {
  };
  function DecoratorClass (decorated) {
    this.called = true;
  }
    return 'B';
  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);
  var inst = new DecoratedClass();
  assert.ok(inst.inherited);
});
  function BaseClass (testArgument) {
    this.baseCalled = true;
    this.baseTestArgument = testArgument;
  BaseClass.prototype.test = function (a) {
  };
  function MiddleClass (decorated, testArgument) {
    this.middleCalled = true;
    decorated.call(this, testArgument);
  MiddleClass.prototype.test = function (decorated, a) {
  };
  function DecoratorClass (decorated, testArgument) {
    this.decoratorTestArgument = testArgument;
    decorated.call(this, testArgument);
  }
  DecoratorClass.prototype.test = function (decorated, a) {
  };
  var DecoratedClass = Utils.Decorate(
    Utils.Decorate(BaseClass, MiddleClass),
  );
  var inst = new DecoratedClass('test');
  assert.ok(inst.middleCalled, 'The middle class constructor was called');
  assert.ok(inst.decoratorCalled, 'The decorator constructor was called');
  assert.strictEqual(inst.middleTestArgument, 'test');
  assert.strictEqual(inst.decoratorTestArgument, 'test');
  var out = inst.test('test');
});
