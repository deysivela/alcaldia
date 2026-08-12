/**
 *
 * @param {String} name
 * @return {Object} exports
 * @api public
 */
function require(name) {
  var module = require.modules[name];
  if (!('exports' in module) && typeof module.definition === 'function') {
    module.client = module.component = true;
    module.definition.call(this, module.exports = {}, module);
  }
  return module.exports;
}
/**
 * Meta info, accessible in the global scope unless you use AMD option.
require.loader = 'component';
/**
 */
require.helper = {};
require.helper.semVerSort = function(a, b) {
  var bArray = b.version.split('.');
    var aInt = parseInt(aArray[i], 10);
    var bInt = parseInt(bArray[i], 10);
    if (aInt === bInt) {
      var aLex = aArray[i].substr((""+aInt).length);
      var bLex = bArray[i].substr((""+bInt).length);
      if (aLex === '' && bLex !== '') return 1;
      if (aLex !== '' && bLex === '') return -1;
      if (aLex !== '' && bLex !== '') return aLex > bLex ? 1 : -1;
      continue;
    } else if (aInt > bInt) {
      return 1;
    } else {
      return -1;
    }
  }
  return 0;
}
/**
 * Find and require a module which name starts with the provided name.
 * If multiple modules exists, the highest semver is used. 
 * This function can only be used for remote dependencies.
 * @param {String} name - module name: `user~repo`
 * @param {Boolean} returnPath - returns the canonical require path if true, 
 *                               otherwise it returns the epxorted module
 */
  function showError(name) {
    throw new Error('failed to find latest module of "' + name + '"');
  }
  // only remotes with semvers, ignore local files conataining a '/'
  var remoteRegexp = /(.*)~(.*)/;
  if (!remoteRegexp.test(name)) showError(name);
  var moduleNames = Object.keys(require.modules);
  var semVerCandidates = [];
  var otherCandidates = []; // for instance: name of the git branch
  for (var i=0; i<moduleNames.length; i++) {
    var moduleName = moduleNames[i];
    if (new RegExp(name + '@').test(moduleName)) {
        var version = moduleName.substr(name.length+1);
        var semVerMatch = versionRegexp.exec(moduleName);
        if (semVerMatch != null) {
          semVerCandidates.push({version: version, name: moduleName});
        } else {
          otherCandidates.push({version: version, name: moduleName});
        } 
    }
  }
  if (semVerCandidates.concat(otherCandidates).length === 0) {
    showError(name);
  }
  if (semVerCandidates.length > 0) {
    var module = semVerCandidates.sort(require.helper.semVerSort).pop().name;
    if (returnPath === true) {
      return module;
    }
    return require(module);
  }
  // if the build contains more than one branch of the same module
  // you should not use this funciton
  var module = otherCandidates.sort(function(a, b) {return a.name > b.name})[0].name;
  if (returnPath === true) {
    return module;
  }
  return require(module);
}
/**
 * Registered modules.
 */
require.modules = {};
/**
 * Register module at `name` with callback `definition`.
 *
 * @param {String} name
 * @param {Function} definition
 * @api private
require.register = function (name, definition) {
  require.modules[name] = {
    definition: definition
};
 * Define a module's exports immediately with `exports`.
 *
 * @param {String} name
 * @param {Generic} exports
 * @api private
 */
require.define = function (name, exports) {
    exports: exports
  };
};
require.register("abpetkov~transitionize@0.0.3", function (exports, module) {
/**
 * https://github.com/abpetkov/transitionize
 *
 * Authored by Alexander Petkov
 * https://github.com/abpetkov
 *
 * Copyright 2013, Alexander Petkov
 * License: The MIT License (MIT)
 *
 */
/**
 * Expose `Transitionize`.
 */
module.exports = Transitionize;
 * Initialize new Transitionize.
 *
 * @param {Object} element
 * @param {Object} props
 * @api public
 */
function Transitionize(element, props) {
  if (!(this instanceof Transitionize)) return new Transitionize(element, props);
  this.element = element;
  this.props = props || {};
  this.init();
}
 * Detect if Safari.
 *
 * @returns {Boolean}
 */
  return (/Safari/).test(navigator.userAgent) && (/Apple Computer/).test(navigator.vendor);
};
/**
 * Loop though the object and push the keys and values in an array.
 * Apply the CSS3 transition to the element and prefix with -webkit- for Safari.
 *
 * @api private
Transitionize.prototype.init = function() {
  var transitions = [];
    transitions.push(key + ' ' + this.props[key]);
  }
  this.element.style.transition = transitions.join(', ');
  if (this.isSafari()) this.element.style.webkitTransition = transitions.join(', ');
});
require.register("ftlabs~fastclick@v0.6.11", function (exports, module) {
/**
 * @preserve FastClick: polyfill to remove click delays on browsers with touch UIs.
 *
 * @version 0.6.11
 * @copyright The Financial Times Limited [All Rights Reserved]
 * @license MIT License (see LICENSE.txt)
 */
/*global define, Event, Node*/
/**
 * Instantiate fast-clicking listeners on the specificed layer.
 *
 * @constructor
 * @param {Element} layer The layer to listen on
function FastClick(layer) {
	'use strict';
	/**
	 * Whether a click is currently being tracked.
	 *
	 */
	this.trackingClick = false;
	/**
	 * Timestamp for when when click tracking started.
	 * @type number
	 */
	this.trackingClickStart = 0;
	/**
	 * The element being tracked for a click.
	 *
	 * @type EventTarget
	 */
	this.targetElement = null;
	 * X-coordinate of touch start event.
	 *
	this.touchStartX = 0;
	/**
	 * Y-coordinate of touch start event.
	 *
	 * @type number
	 */
	this.touchStartY = 0;
	/**
	 * ID of the last touch, retrieved from Touch.identifier.
	 */
	this.lastTouchIdentifier = 0;
	/**
	 * Touchmove boundary, beyond which a click will be cancelled.
	 *
	 * @type number
	/**
	 * The FastClick layer.
	 *
	 * @type Element
	 */
	this.layer = layer;
	}
	/** @type function() */
	this.onClick = function() { return FastClick.prototype.onClick.apply(self, arguments); };
	/** @type function() */
	this.onMouse = function() { return FastClick.prototype.onMouse.apply(self, arguments); };
	/** @type function() */
	this.onTouchMove = function() { return FastClick.prototype.onTouchMove.apply(self, arguments); };
	/** @type function() */
	this.onTouchEnd = function() { return FastClick.prototype.onTouchEnd.apply(self, arguments); };
	/** @type function() */
	this.onTouchCancel = function() { return FastClick.prototype.onTouchCancel.apply(self, arguments); };
	if (FastClick.notNeeded(layer)) {
	// Set up event handlers as required
	if (this.deviceIsAndroid) {
		layer.addEventListener('mouseover', this.onMouse, true);
		layer.addEventListener('mousedown', this.onMouse, true);
		layer.addEventListener('mouseup', this.onMouse, true);
	}
	layer.addEventListener('touchmove', this.onTouchMove, false);
	layer.addEventListener('touchend', this.onTouchEnd, false);
	layer.addEventListener('touchcancel', this.onTouchCancel, false);
	// Hack is required for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
	// which is how FastClick normally stops click events bubbling to callbacks registered on the FastClick
	// layer when they are cancelled.
			var rmv = Node.prototype.removeEventListener;
			if (type === 'click') {
				rmv.call(layer, type, callback.hijacked || callback, capture);
			} else {
				rmv.call(layer, type, callback, capture);
			}
			var adv = Node.prototype.addEventListener;
			if (type === 'click') {
				adv.call(layer, type, callback.hijacked || (callback.hijacked = function(event) {
					if (!event.propagationStopped) {
						callback(event);
					}
			} else {
				adv.call(layer, type, callback, capture);
			}
	}
	// If a handler is already declared in the element's onclick attribute, it will be fired before
	// adding it as listener.
	if (typeof layer.onclick === 'function') {
		// - the old one won't work if passed to addEventListener directly.
		oldOnClick = layer.onclick;
			oldOnClick(event);
		}, false);
	}
}
 * Android requires exceptions.
 *
 */
FastClick.prototype.deviceIsAndroid = navigator.userAgent.indexOf('Android') > 0;
/**
 *
 * @type boolean
 */
FastClick.prototype.deviceIsIOS = /iP(ad|hone|od)/.test(navigator.userAgent);
/**
 * iOS 4 requires an exception for select elements.
 * @type boolean
 */
FastClick.prototype.deviceIsIOS4 = FastClick.prototype.deviceIsIOS && (/OS 4_\d(_\d)?/).test(navigator.userAgent);
/**
 * iOS 6.0(+?) requires the target element to be manually derived
 * @type boolean
 */
FastClick.prototype.deviceIsIOSWithBadTarget = FastClick.prototype.deviceIsIOS && (/OS ([6-9]|\d{2})_\d/).test(navigator.userAgent);
/**
 * Determine whether a given element requires a native click.
 *
 * @param {EventTarget|Element} target Target DOM element
 * @returns {boolean} Returns true if the element needs a native click
 */
FastClick.prototype.needsClick = function(target) {
	'use strict';
	switch (target.nodeName.toLowerCase()) {
	case 'button':
	case 'select':
	case 'textarea':
		if (target.disabled) {
			return true;
		}
		break;
	case 'input':
		// File inputs need real clicks on iOS 6 due to a browser bug (issue #68)
		if ((this.deviceIsIOS && target.type === 'file') || target.disabled) {
			return true;
		}
		break;
	case 'video':
		return true;
	}
	return (/\bneedsclick\b/).test(target.className);
/**
 * Determine whether a given element requires a call to focus to simulate click into element.
 *
 * @param {EventTarget|Element} target Target DOM element
 * @returns {boolean} Returns true if the element requires a call to focus to simulate native click.
 */
FastClick.prototype.needsFocus = function(target) {
	'use strict';
	switch (target.nodeName.toLowerCase()) {
	case 'select':
		return !this.deviceIsAndroid;
	case 'input':
		switch (target.type) {
		case 'button':
		case 'checkbox':
		case 'radio':
		case 'submit':
			return false;
		}
		// No point in attempting to focus disabled inputs
		return !target.disabled && !target.readOnly;
	}
};
/**
 * Send a click event to the specified element.
 *
 * @param {EventTarget|Element} targetElement
FastClick.prototype.sendClick = function(targetElement, event) {
	'use strict';
	var clickEvent, touch;
	// On some Android devices activeElement needs to be blurred otherwise the synthetic click will have no effect (#24)
	if (document.activeElement && document.activeElement !== targetElement) {
		document.activeElement.blur();
	// Synthesise a click event, with an extra attribute so it can be tracked
	clickEvent = document.createEvent('MouseEvents');
	clickEvent.initMouseEvent(this.determineEventType(targetElement), true, true, window, 1, touch.screenX, touch.screenY, touch.clientX, touch.clientY, false, false, false, false, 0, null);
	clickEvent.forwardedTouchEvent = true;
	targetElement.dispatchEvent(clickEvent);
};
FastClick.prototype.determineEventType = function(targetElement) {
	'use strict';
	//Issue #159: Android Chrome Select Box does not open with a synthetic click event
		return 'mousedown';
	}
	return 'click';
};
/**
 * @param {EventTarget|Element} targetElement
 */
	'use strict';
	var length;
	if (this.deviceIsIOS && targetElement.setSelectionRange && targetElement.type.indexOf('date') !== 0 && targetElement.type !== 'time') {
		length = targetElement.value.length;
		targetElement.setSelectionRange(length, length);
	} else {
	}
};
/**
 * Check whether the given target element is a child of a scrollable layer and if so, set a flag on it.
 *
 */
FastClick.prototype.updateScrollParent = function(targetElement) {
	scrollParent = targetElement.fastClickScrollParent;
	// Attempt to discover whether the target element is contained within a scrollable layer. Re-check if the
	// target element was moved to another parent.
	if (!scrollParent || !scrollParent.contains(targetElement)) {
		parentElement = targetElement;
		do {
			if (parentElement.scrollHeight > parentElement.offsetHeight) {
				scrollParent = parentElement;
				targetElement.fastClickScrollParent = parentElement;
				break;
			}
			parentElement = parentElement.parentElement;
		} while (parentElement);
	}
	// Always update the scroll top tracker if possible.
	if (scrollParent) {
		scrollParent.fastClickLastScrollTop = scrollParent.scrollTop;
	}
};
/**
 * @param {EventTarget} targetElement
 * @returns {Element|EventTarget}
 */
	'use strict';
	// On some older browsers (notably Safari on iOS 4.1 - see issue #56) the event target may be a text node.
	if (eventTarget.nodeType === Node.TEXT_NODE) {
		return eventTarget.parentNode;
	}
	return eventTarget;
 * On touch start, record the position and scroll offset.
 *
 * @param {Event} event
 * @returns {boolean}
 */
FastClick.prototype.onTouchStart = function(event) {
	'use strict';
	var targetElement, touch, selection;
	// Ignore multiple touches, otherwise pinch-to-zoom is prevented if both fingers are on the FastClick element (issue #111).
		return true;
	}
	targetElement = this.getTargetElementFromEventTarget(event.target);
	touch = event.targetTouches[0];
		// Only trusted events will deselect text on iOS (issue #49)
		if (selection.rangeCount && !selection.isCollapsed) {
			return true;
		}
		if (!this.deviceIsIOS4) {
			// Weird things happen on iOS when an alert or confirm dialog is opened from a click event callback (issue #23):
			// when the user next taps anywhere else on the page, new touchstart and touchend events are dispatched
			// Sadly, there is an issue on iOS 4 that causes some normal touch events to have the same identifier as an
			// immediately preceeding touch event (issue #52), so this fix is unavailable on that platform.
				event.preventDefault();
				return false;
			}
			this.lastTouchIdentifier = touch.identifier;
			// 1) the user does a fling scroll on the scrollable layer
			// 2) the user stops the fling scroll with another tap
			// is made to ensure that a parent layer was not scrolled before sending a synthetic click (issue #42).
			this.updateScrollParent(targetElement);
		}
	}
	this.trackingClick = true;
	this.trackingClickStart = event.timeStamp;
	this.touchStartX = touch.pageX;
	this.touchStartY = touch.pageY;
	// Prevent phantom clicks on fast double-tap (issue #36)
	if ((event.timeStamp - this.lastClickTime) < 200) {
		event.preventDefault();
	}
	return true;
};
 *
 * @param {Event} event
 * @returns {boolean}
 */
FastClick.prototype.touchHasMoved = function(event) {
	'use strict';
	var touch = event.changedTouches[0], boundary = this.touchBoundary;
	if (Math.abs(touch.pageX - this.touchStartX) > boundary || Math.abs(touch.pageY - this.touchStartY) > boundary) {
	}
};
/**
 * Update the last position.
 *
 * @param {Event} event
 * @returns {boolean}
 */
FastClick.prototype.onTouchMove = function(event) {
	'use strict';
	if (!this.trackingClick) {
	}
	// If the touch has moved, cancel the click tracking
	if (this.targetElement !== this.getTargetElementFromEventTarget(event.target) || this.touchHasMoved(event)) {
		this.targetElement = null;
	}
	return true;
};
/**
 * @param {EventTarget|HTMLLabelElement} labelElement
 * @returns {Element|null}
 */
FastClick.prototype.findControl = function(labelElement) {
	'use strict';
	// Fast path for newer browsers supporting the HTML5 control attribute
		return labelElement.control;
	}
	// All browsers under test that support touch events also support the HTML5 htmlFor attribute
	if (labelElement.htmlFor) {
	}
	// If no for attribute exists, attempt to retrieve the first labellable descendant element
};
/**
 * On touch end, determine whether to send a click event at once.
 *
 * @param {Event} event
 * @returns {boolean}
 */
FastClick.prototype.onTouchEnd = function(event) {
	'use strict';
	if (!this.trackingClick) {
		return true;
	}
	// Prevent phantom clicks on fast double-tap (issue #36)
		this.cancelNextClick = true;
		return true;
	// Reset to prevent wrong click cancel on input (issue #156).
	this.lastClickTime = event.timeStamp;
	trackingClickStart = this.trackingClickStart;
	this.trackingClick = false;
	this.trackingClickStart = 0;
	// On some iOS devices, the targetElement supplied with the event is invalid if the layer
	// for this to function correctly, it must be called *after* the event target is checked!
	if (this.deviceIsIOSWithBadTarget) {
		touch = event.changedTouches[0];
		// In certain cases arguments of elementFromPoint can be negative, so prevent setting targetElement to null
		targetElement = document.elementFromPoint(touch.pageX - window.pageXOffset, touch.pageY - window.pageYOffset) || targetElement;
		targetElement.fastClickScrollParent = this.targetElement.fastClickScrollParent;
	}
	targetTagName = targetElement.tagName.toLowerCase();
	if (targetTagName === 'label') {
		forElement = this.findControl(targetElement);
			this.focus(targetElement);
				return false;
			}
			targetElement = forElement;
		}
	} else if (this.needsFocus(targetElement)) {
		// Case 1: If the touch started a while ago (best guess is 100ms based on tests for issue #36) then focus will be triggered anyway. Return early and unset the target element reference so that the subsequent click will be allowed through.
		// Case 2: Without this exception for input elements tapped when the document is contained in an iframe, then any inputted text won't be visible even though the value attribute is updated as the user types (issue #37).
		if ((event.timeStamp - trackingClickStart) > 100 || (this.deviceIsIOS && window.top !== window && targetTagName === 'input')) {
			this.targetElement = null;
		}
		this.focus(targetElement);
		// Select elements need the event to go through on iOS 4, otherwise the selector menu won't open.
			this.targetElement = null;
			event.preventDefault();
		return false;
	}
	if (this.deviceIsIOS && !this.deviceIsIOS4) {
		// Don't send a synthetic click event if the target element is contained within a parent layer that was scrolled
		scrollParent = targetElement.fastClickScrollParent;
		if (scrollParent && scrollParent.fastClickLastScrollTop !== scrollParent.scrollTop) {
	}
	// Prevent the actual click from going though - unless the target node is marked as requiring
	// real clicks or if it is in the whitelist in which case only non-programmatic clicks are permitted.
	if (!this.needsClick(targetElement)) {
		event.preventDefault();
		this.sendClick(targetElement, event);
	}
	return false;
};
 * On touch cancel, stop tracking the click.
 *
 * @returns {void}
FastClick.prototype.onTouchCancel = function() {
	'use strict';
};
/**
 * Determine mouse events which should be permitted.
 *
 * @param {Event} event
 * @returns {boolean}
 */
FastClick.prototype.onMouse = function(event) {
	'use strict';
	// If a target element was never set (because a touch event was never fired) allow the event
	if (!this.targetElement) {
	}
	if (event.forwardedTouchEvent) {
		return true;
	}
	// Programmatically generated events targeting a specific element should be permitted
		return true;
	}
	// to prevent ghost/doubleclicks.
	if (!this.needsClick(this.targetElement) || this.cancelNextClick) {
		// Prevent any user-added listeners declared on FastClick element from being fired.
		if (event.stopImmediatePropagation) {
			event.stopImmediatePropagation();
		} else {
			// Part of the hack for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
			event.propagationStopped = true;
		// Cancel the event
		event.stopPropagation();
		event.preventDefault();
		return false;
	// If the mouse event is permitted, return true for the action to go through.
	return true;
};
/**
 * naturally after a delay after a touch (which needs to be cancelled to avoid duplication), or
 * an actual click which should be permitted.
 *
 * @param {Event} event
FastClick.prototype.onClick = function(event) {
	'use strict';
	var permitted;
	// It's possible for another FastClick-like library delivered with third-party code to fire a click event before FastClick does (issue #44). In that case, set the click-tracking flag back to false and return early. This will cause onTouchEnd to return early.
	if (this.trackingClick) {
		this.targetElement = null;
		this.trackingClick = false;
		return true;
	}
	if (event.target.type === 'submit' && event.detail === 0) {
		return true;
	}
	// Only unset targetElement if the click is not permitted. This will ensure that the check for !targetElement in onMouse fails and the browser's click doesn't go through.
	if (!permitted) {
		this.targetElement = null;
	}
	// If clicks are permitted, return true for the action to go through.
};
/**
 *
 */
FastClick.prototype.destroy = function() {
	'use strict';
	if (this.deviceIsAndroid) {
		layer.removeEventListener('mouseover', this.onMouse, true);
		layer.removeEventListener('mousedown', this.onMouse, true);
		layer.removeEventListener('mouseup', this.onMouse, true);
	}
	layer.removeEventListener('click', this.onClick, true);
	layer.removeEventListener('touchmove', this.onTouchMove, false);
	layer.removeEventListener('touchend', this.onTouchEnd, false);
	layer.removeEventListener('touchcancel', this.onTouchCancel, false);
};
 * Check whether FastClick is needed.
 *
 * @param {Element} layer The layer to listen on
 */
FastClick.notNeeded = function(layer) {
	'use strict';
	var metaViewport;
	var chromeVersion;
	if (typeof window.ontouchstart === 'undefined') {
		return true;
	}
	chromeVersion = +(/Chrome\/([0-9]+)/.exec(navigator.userAgent) || [,0])[1];
	if (chromeVersion) {
		if (FastClick.prototype.deviceIsAndroid) {
			metaViewport = document.querySelector('meta[name=viewport]');
			if (metaViewport) {
				// Chrome on Android with user-scalable="no" doesn't need FastClick (issue #89)
					return true;
				// Chrome 32 and above with width=device-width or less don't need FastClick
				if (chromeVersion > 31 && window.innerWidth <= window.screen.width) {
					return true;
				}
			}
		} else {
			return true;
	}
	if (layer.style.msTouchAction === 'none') {
		return true;
	}
	return false;
};
/**
 * Factory method for creating a FastClick object
 * @param {Element} layer The layer to listen on
 */
FastClick.attach = function(layer) {
	'use strict';
	return new FastClick(layer);
};
	// AMD. Register as an anonymous module.
	define(function() {
	});
} else if (typeof module !== 'undefined' && module.exports) {
	module.exports = FastClick.attach;
	module.exports.FastClick = FastClick;
} else {
	window.FastClick = FastClick;
}
});
require.register("component~indexof@0.0.3", function (exports, module) {
module.exports = function(arr, obj){
    if (arr[i] === obj) return i;
  }
  return -1;
};
});
require.register("component~classes@1.2.1", function (exports, module) {
/**
 * Module dependencies.
var index = require('component~indexof@0.0.3');
/**
 * Whitespace regexp.
 */
/**
 * toString reference.
 */
/**
 * Wrap `el` in a `ClassList`.
 *
 * @param {Element} el
 * @api public
 */
module.exports = function(el){
  return new ClassList(el);
/**
 * Initialize a new ClassList for `el`.
 *
 * @param {Element} el
 */
function ClassList(el) {
  if (!el) throw new Error('A DOM element reference is required');
  this.list = el.classList;
}
/**
 *
 * @param {String} name
 * @api public
 */
ClassList.prototype.add = function(name){
    this.list.add(name);
    return this;
  }
  // fallback
  var arr = this.array();
  var i = index(arr, name);
  if (!~i) arr.push(name);
  this.el.className = arr.join(' ');
  return this;
};
/**
 * pass a regular expression to remove
 * any which match.
 *
 * @param {String|RegExp} name
 * @return {ClassList}
 * @api public
ClassList.prototype.remove = function(name){
  if ('[object RegExp]' == toString.call(name)) {
    return this.removeMatching(name);
  }
  if (this.list) {
    return this;
  }
  // fallback
  var arr = this.array();
  if (~i) arr.splice(i, 1);
  this.el.className = arr.join(' ');
  return this;
 * Remove all classes matching `re`.
 *
 * @param {RegExp} re
 * @return {ClassList}
 * @api private
 */
ClassList.prototype.removeMatching = function(re){
  var arr = this.array();
    if (re.test(arr[i])) {
      this.remove(arr[i]);
    }
  }
  return this;
/**
 * Toggle class `name`, can force state via `force`.
 *
 * For browsers that support classList, but do not support `force` yet,
 * the mistake will be detected and corrected.
 *
 * @return {ClassList}
 * @api public
 */
ClassList.prototype.toggle = function(name, force){
  // classList
  if (this.list) {
    if ("undefined" !== typeof force) {
      if (force !== this.list.toggle(name, force)) {
        this.list.toggle(name); // toggle again to correct
    } else {
      this.list.toggle(name);
    }
    return this;
  // fallback
  if ("undefined" !== typeof force) {
      this.remove(name);
      this.add(name);
    }
    if (this.has(name)) {
      this.remove(name);
    } else {
      this.add(name);
    }
  }
  return this;
};
/**
 * Return an array of classes.
 * @return {Array}
 * @api public
 */
ClassList.prototype.array = function(){
  var str = this.el.className.replace(/^\s+|\s+$/g, '');
  if ('' === arr[0]) arr.shift();
  return arr;
};
/**
 *
 * @param {String} name
 */
ClassList.prototype.has =
ClassList.prototype.contains = function(name){
  return this.list
    ? this.list.contains(name)
    : !! ~index(this.array(), name);
};
});
require.register("component~event@0.1.4", function (exports, module) {
    prefix = bind !== 'addEventListener' ? 'on' : '';
 * Bind `el` event `type` to `fn`.
 *
 * @param {Element} el
 * @param {String} type
 * @param {Function} fn
 * @param {Boolean} capture
 * @return {Function}
 * @api public
 */
exports.bind = function(el, type, fn, capture){
  el[bind](prefix + type, fn, capture || false);
};
 * Unbind `el` event `type`'s callback `fn`.
 *
 * @param {Element} el
 * @param {String} type
 * @param {Function} fn
 * @param {Boolean} capture
 * @return {Function}
 * @api public
 */
  el[unbind](prefix + type, fn, capture || false);
  return fn;
};
});
function one(selector, el) {
}
exports = module.exports = function(selector, el){
  el = el || document;
};
  el = el || document;
  return el.querySelectorAll(selector);
};
  if (!obj.one) throw new Error('.one callback required');
  one = obj.one;
  exports.all = obj.all;
  return exports;
};
});
require.register("component~matches-selector@0.1.5", function (exports, module) {
/**
 */
var query = require('component~query@0.0.3');
/**
 */
var proto = Element.prototype;
/**
 * Vendor function.
 */
var vendor = proto.matches
  || proto.mozMatchesSelector
  || proto.msMatchesSelector
  || proto.oMatchesSelector;
/**
 * Expose `match()`.
module.exports = match;
/**
 * Match `el` to `selector`.
 *
 * @param {Element} el
 * @param {String} selector
 * @return {Boolean}
 */
function match(el, selector) {
  if (!el || el.nodeType !== 1) return false;
  if (vendor) return vendor.call(el, selector);
  var nodes = query.all(selector, el.parentNode);
  for (var i = 0; i < nodes.length; ++i) {
  }
  return false;
}
});
require.register("component~closest@0.1.4", function (exports, module) {
var matches = require('component~matches-selector@0.1.5')
module.exports = function (element, selector, checkYoSelf, root) {
  root = root || document
  // Make sure `element !== document` and `element != null`
  // otherwise we get an illegal invocation
  while ((element = element.parentNode) && element !== document) {
    if (matches(element, selector))
      return element
    // After `matches` on the edge case that
    // the selector matches the root
    // (when the root is not the document)
      return
  }
}
});
/**
 * Module dependencies.
 */
var closest = require('component~closest@0.1.4')
  , event = require('component~event@0.1.4');
 * Delegate event `type` to `selector`
 * and invoke `fn(e)`. A callback function
 * is returned which may be passed to `.unbind()`.
 *
 * @param {Element} el
 * @param {String} selector
 * @param {String} type
 * @param {Boolean} capture
 * @return {Function}
 * @api public
 */
exports.bind = function(el, selector, type, fn, capture){
  return event.bind(el, type, function(e){
    var target = e.target || e.srcElement;
    if (e.delegateTarget) fn.call(el, e);
  }, capture);
};
/**
 * Unbind event `type`'s callback `fn`.
 *
 * @param {Element} el
 * @param {String} type
 * @param {Function} fn
 * @api public
 */
exports.unbind = function(el, type, fn, capture){
  event.unbind(el, type, fn, capture);
};
});
require.register("component~events@1.0.9", function (exports, module) {
/**
 * Module dependencies.
 */
var events = require('component~event@0.1.4');
/**
 * Expose `Events`.
 */
module.exports = Events;
/**
 * Initialize an `Events` with the given
 * `el` object which events will be bound to,
 * and the `obj` which will receive method calls.
 *
 * @param {Object} el
 * @param {Object} obj
 * @api public
function Events(el, obj) {
  if (!(this instanceof Events)) return new Events(el, obj);
  if (!el) throw new Error('element required');
  if (!obj) throw new Error('object required');
  this.el = el;
  this.obj = obj;
  this._events = {};
}
/**
 * Subscription helper.
 */
Events.prototype.sub = function(event, method, cb){
  this._events[event] = this._events[event] || {};
  this._events[event][method] = cb;
/**
 * Bind to `event` with optional `method` name.
 * with the "on" prefix.
 *
 * Examples:
 *
 *  Direct event handling:
 *
 *    events.bind('click', 'remove')
 *    events.bind('click', 'sort', 'asc')
 *
 *  Delegated event handling:
 *
 *    events.bind('click li > a')
 *    events.bind('click a.sort-ascending', 'sort', 'asc')
 *    events.bind('click a.sort-descending', 'sort', 'desc')
 *
 * @param {String} event
 * @param {String|function} [method]
 * @return {Function} callback
 * @api public
Events.prototype.bind = function(event, method){
  var e = parse(event);
  var el = this.el;
  var obj = this.obj;
  var name = e.name;
  var method = method || 'on' + name;
  // callback
    var a = [].slice.call(arguments).concat(args);
    obj[method].apply(obj, a);
  }
  // bind
    cb = delegate.bind(el, e.selector, name, cb);
  } else {
    events.bind(el, name, cb);
  }
  // subscription for unbinding
  this.sub(name, method, cb);
  return cb;
};
/**
 * Unbind a single binding, all bindings for `event`,
 *
 * Examples:
 *
 *  Unbind direct handlers:
 *     events.unbind('click', 'remove')
 *     events.unbind('click')
 *     events.unbind()
 *
 * Unbind delegate handlers:
 *
 *     events.unbind('click', 'remove')
 *     events.unbind('click')
 *     events.unbind()
 *
 * @param {String|Function} [method]
 * @api public
 */
Events.prototype.unbind = function(event, method){
  if (0 == arguments.length) return this.unbindAll();
  // no bindings for this event
  var bindings = this._events[event];
  if (!bindings) return;
  // no bindings for this method
  if (!cb) return;
  events.unbind(this.el, event, cb);
};
/**
 *
 * @api private
 */
Events.prototype.unbindAll = function(){
    this.unbindAllOf(event);
  }
};
/**
 * Unbind all events for `event`.
 *
 * @param {String} event
 */
  var bindings = this._events[event];
  if (!bindings) return;
  for (var method in bindings) {
    this.unbind(event, method);
};
 * Parse `event`.
 *
 * @param {String} event
 * @api private
function parse(event) {
  var parts = event.split(/ +/);
  return {
    selector: parts.join(' ')
  }
}
});
require.register("switchery", function (exports, module) {
 * Switchery 0.8.1
 * http://abpetkov.github.io/switchery/
 *
 * https://github.com/abpetkov
 * Copyright 2013-2015, Alexander Petkov
 * License: The MIT License (MIT)
 * http://opensource.org/licenses/MIT
 *
 */
/**
 * External dependencies.
 */
  , fastclick = require('ftlabs~fastclick@v0.6.11')
  , classes = require('component~classes@1.2.1')
  , events = require('component~events@1.0.9');
/**
 * Expose `Switchery`.
 */
module.exports = Switchery;
/**
 * Set Switchery default values.
 * @api public
var defaults = {
    color             : '#64bd63'
  , jackColor         : '#fff'
  , jackSecondaryColor: null
  , disabled          : false
  , speed             : '0.4s'
  , size              : 'default'
};
/**
 * Create Switchery object.
 *
 * @param {Object} element
 * @param {Object} options
 * @api public
 */
function Switchery(element, options) {
  if (!(this instanceof Switchery)) return new Switchery(element, options);
  this.options = options || {};
    if (this.options[i] == null) {
      this.options[i] = defaults[i];
    }
  }
  if (this.isDisabled() === true) this.disable();
}
 * Hide the target element.
 *
 * @api private
 */
Switchery.prototype.hide = function() {
  this.element.style.display = 'none';
};
/**
 * Show custom switch after the target element.
 *
 * @api private
 */
Switchery.prototype.show = function() {
  this.insertAfter(this.element, switcher);
};
/**
 * Create custom switch.
 *
 * @returns {Object} this.switcher
 * @api private
Switchery.prototype.create = function() {
  this.switcher = document.createElement('span');
  this.jack = document.createElement('small');
  this.switcher.appendChild(this.jack);
  this.switcher.className = this.options.className;
  this.events = events(this.switcher, this);
  return this.switcher;
};
/**
 *
 * @param {Object} reference
 * @param {Object} target
 */
  reference.parentNode.insertBefore(target, reference.nextSibling);
/**
 * Set switch jack proper position.
 *
 * @api private
 */
  var checked = this.isChecked()
    , switcher = this.switcher
    , jack = this.jack;
  else if (clicked && !checked) checked = true;
    this.element.checked = true;
    if (window.getComputedStyle) jack.style.left = parseInt(window.getComputedStyle(switcher).width) - parseInt(window.getComputedStyle(jack).width) + 'px';
    else jack.style.left = parseInt(switcher.currentStyle['width']) - parseInt(jack.currentStyle['width']) + 'px';
    if (this.options.color) this.colorize();
    this.setSpeed();
  } else {
    jack.style.left = 0;
    this.element.checked = false;
    this.switcher.style.boxShadow = 'inset 0 0 0 0 ' + this.options.secondaryColor;
    this.switcher.style.backgroundColor = (this.options.secondaryColor !== defaults.secondaryColor) ? this.options.secondaryColor : '#fff';
    this.jack.style.backgroundColor = (this.options.jackSecondaryColor !== this.options.jackColor) ? this.options.jackSecondaryColor : this.options.jackColor;
    this.setSpeed();
  }
};
/**
 * Set speed.
 *
 */
Switchery.prototype.setSpeed = function() {
  var switcherProp = {}
        'background-color': this.options.speed
      , 'left': this.options.speed.replace(/[a-z]/, '') / 2 + 's'
    };
  if (this.isChecked()) {
        'border': this.options.speed
      , 'box-shadow': this.options.speed
      , 'background-color': this.options.speed.replace(/[a-z]/, '') * 3 + 's'
    };
  } else {
    switcherProp = {
        'border': this.options.speed
      , 'box-shadow': this.options.speed
    };
  }
  transitionize(this.switcher, switcherProp);
  transitionize(this.jack, jackProp);
};
/**
 * Set switch size.
 *
 * @api private
 */
Switchery.prototype.setSize = function() {
  var small = 'switchery-small'
    , normal = 'switchery-default'
    , large = 'switchery-large';
  switch (this.options.size) {
    case 'small':
      classes(this.switcher).add(small)
    case 'large':
      classes(this.switcher).add(large)
      break;
    default:
      classes(this.switcher).add(normal)
      break;
  }
/**
 * Set switch color.
 *
 * @api private
 */
  var switcherHeight = this.switcher.offsetHeight / 2;
  this.switcher.style.backgroundColor = this.options.color;
  this.switcher.style.borderColor = this.options.color;
  this.switcher.style.boxShadow = 'inset 0 0 0 ' + switcherHeight + 'px ' + this.options.color;
  this.jack.style.backgroundColor = this.options.jackColor;
};
 * Handle the onchange event.
 *
 * @api private
 */
  if (document.dispatchEvent) {
    var event = document.createEvent('HTMLEvents');
    event.initEvent('change', true, true);
    this.element.dispatchEvent(event);
  } else {
    this.element.fireEvent('onchange');
  }
};
/**
 * Handle the native input element state change.
 * A `change` event must be fired in order to detect the change.
 *
 * @api private
 */
Switchery.prototype.handleChange = function() {
  var self = this
    , el = this.element;
  if (el.addEventListener) {
    el.addEventListener('change', function() {
      self.setPosition();
    });
  } else {
      self.setPosition();
    });
  }
/**
 * Handle the switch click event.
 *
 */
Switchery.prototype.handleClick = function() {
  var switcher = this.switcher;
  this.events.bind('click', 'bindClick');
};
 * Attach all methods that need to happen on switcher click.
 *
 * @api private
 */
Switchery.prototype.bindClick = function() {
    , labelParent = (parent === 'label') ? false : true;
  this.setPosition(labelParent);
  this.handleOnchange(this.element.checked);
};
/**
 *
 * @api private
 */
Switchery.prototype.markAsSwitched = function() {
  this.element.setAttribute('data-switchery', true);
};
 * Check if an individual switch is already handled.
 *
 * @api private
Switchery.prototype.markedAsSwitched = function() {
  return this.element.getAttribute('data-switchery');
};
/**
 *
 * @api private
 */
Switchery.prototype.init = function() {
  this.hide();
  this.show();
  this.setSize();
  this.markAsSwitched();
  this.handleChange();
  this.handleClick();
};
/**
 * See if input is checked.
 *
 * @api public
Switchery.prototype.isChecked = function() {
  return this.element.checked;
};
/**
 * See if switcher should be disabled.
 *
 * @returns {Boolean}
 * @api public
 */
Switchery.prototype.isDisabled = function() {
  return this.options.disabled || this.element.disabled || this.element.readOnly;
};
/**
 *
 * @api public
 */
  this.events.unbind();
};
/**
 * Enable disabled switch element.
 * @api public
 */
Switchery.prototype.enable = function() {
  if (this.element.disabled) this.element.disabled = false;
  this.switcher.style.opacity = 1;
  this.events.bind('click', 'bindClick');
};
/**
 * Disable switch element.
 * @api public
 */
Switchery.prototype.disable = function() {
  if (!this.options.disabled) this.options.disabled = true;
  if (!this.element.disabled) this.element.disabled = true;
  if (!this.element.readOnly) this.element.readOnly = true;
  this.switcher.style.opacity = this.options.disabledOpacity;
  this.destroy();
};
});
if (typeof exports == "object") {
} else if (typeof define == "function" && define.amd) {
  define("Switchery", [], function(){ return require("switchery"); });
} else {
  (this || window)["Switchery"] = require("switchery");
}
})()
