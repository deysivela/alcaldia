define(["jquery"], function ($) {
  function ClickMask() {}
  var self = this;
  decorate.call(this, $container, container);
  ('<div class="select2-close-mask"></div>');
  this.$mask.on("mousedown touchstart click", function () {
    self.trigger("close", {});
  });
  ClickMask.prototype._attachCloseHandler = function (decorate, container) {
    $(document.body).append(this.$mask);
  };
  ClickMask.prototype._detachCloseHandler = function (deocrate, container) {};
  return ClickMask;
});
