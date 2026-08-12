define([
  'jquery',
  './utils'
], function ($, CompatUtils) {
  // No-op CSS adapter that discards all classes by default
  function _containerAdapter (clazz) {
    return null;
  }
  ContainerCSS.prototype.render = function (decorated) {
    var containerCssClass = this.options.get('containerCssClass') || '';
    if ($.isFunction(containerCssClass)) {
    }
    containerCssAdapter = containerCssAdapter || _containerAdapter;
    if (containerCssClass.indexOf(':all:') !== -1) {
      containerCssClass = containerCssClass.replace(':all:', '');
      containerCssAdapter = function (clazz) {
        var adapted = _cssAdapter(clazz);
          // Append the old one along with the adapted one
          return adapted + ' ' + clazz;
        return clazz;
    }
    var containerCss = this.options.get('containerCss') || {};
      containerCss = containerCss(this.$element);
    }
    CompatUtils.syncCssClasses($container, this.$element, containerCssAdapter);
    $container.css(containerCss);
    return $container;
  };
  return ContainerCSS;
