import $ from 'jquery';
import ParsleyField from './field';
import ParsleyForm from './form';
import ParsleyUtils from './utils';
var deprecated = function () {
  ParsleyUtils.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley");
};
// Returns an event handler that calls `fn` with the arguments it expects
  // Store to allow unbinding
  if (!fn.parsleyAdaptedCallback) {
    fn.parsleyAdaptedCallback = function () {
      var args = Array.prototype.slice.call(arguments, 0);
      args.unshift(this);
      fn.apply(context || o, args);
    };
  }
  return fn.parsleyAdaptedCallback;
}
var eventPrefix = 'parsley:';
// Converts 'parsley:form:validate' into 'form:validate'
  if (name.lastIndexOf(eventPrefix, 0) === 0)
    return name.substr(eventPrefix.length);
  return name;
}
// $.listen is deprecated. Use Parsley.on instead.
$.listen = function (name, callback) {
  var context;
  if ('object' === typeof arguments[1] && 'function' === typeof arguments[2]) {
    context = arguments[1];
    callback = arguments[2];
  }
  if ('function' !== typeof callback)
    throw new Error('Wrong parameters');
  window.Parsley.on(eventName(name), adapt(callback, context));
};
  deprecated();
  if (!(instance instanceof ParsleyField) && !(instance instanceof ParsleyForm))
  if ('string' !== typeof name || 'function' !== typeof fn)
    throw new Error('Wrong parameters');
};
$.unsubscribe = function (name, fn) {
  deprecated();
  if ('string' !== typeof name || 'function' !== typeof fn)
  window.Parsley.off(eventName(name), fn.parsleyAdaptedCallback);
};
  deprecated();
  if (!(instance instanceof ParsleyField) && !(instance instanceof ParsleyForm))
  instance.off(eventName(name));
};
$.unsubscribeAll = function (name) {
  deprecated();
  window.Parsley.off(eventName(name));
  $('form,input,textarea,select').each(function () {
    if (instance) {
      instance.off(eventName(name));
    }
  });
};
// $.emit is deprecated. Use jQuery events instead.
  deprecated();
  var instanceGiven = (instance instanceof ParsleyField) || (instance instanceof ParsleyForm);
  var args = Array.prototype.slice.call(arguments, instanceGiven ? 2 : 1);
  args.unshift(eventName(name));
  if (!instanceGiven) {
    instance = window.Parsley;
  }
  instance.trigger(...args);
};
export default {};
