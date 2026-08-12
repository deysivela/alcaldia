# NProgress

Medium.
Installation

```html
<script src="nprogress.js"></script>
```

    $ bower install --save nprogress
    $ npm install --save nprogress

[bower]: http://bower.io/search/?q=nprogress
[npm]: https://www.npmjs.org/package/nprogress

Basic usage
Simply call `start()` and `done()` to control the progress bar.

```js
NProgress.done();
```

Using [Turbolinks] or similar? Ensure you're using Turbolinks 1.3.0+, and use
[here](https://github.com/rstacruz/nprogress/issues/8#issuecomment-23010560))

```js
$(document).on("page:change", function () {
    NProgress.done();
});
```

## Ideas

-   Add progress to your Ajax calls! Bind it to the jQuery `ajaxStart` and
-   Make a fancy loading bar even without Turbolinks/Pjax! Bind it to
    `$(document).ready` and `$(window).load`.
    Advanced usage
    **Percentages:** To set a progress percentage, call `.set(n)`, where _n_ is a
    number between `0..1`.

```js
NProgress.set(0.0); // Sorta same as .start()
NProgress.set(0.4);
```

**Incrementing:** To increment the progress bar, just use `.inc()`. This
every image load (or similar).

```js

```

If you want to increment by a specific value, you can pass that as a parameter:
NProgress.inc(0.2); // This will get the current status value and adds 0.2 until status is 0.994

```
even if it's not being shown. (The default behavior is that *.done()* will not
    do anything if *.start()* isn't called)
NProgress.done(true);
```

**Get the status value:** To get the status value, use `.status`
Configuration

---

Changes the minimum percentage used upon starting. (default: `0.08`)

```js
NProgress.configure({ minimum: 0.1 });
#### `template`
You can change the markup using `template`. To keep the progress
bar working, keep an element with `role='bar'` in there. See the [default template]
~~~ js
  template: "<div class='....'>...</div>"
});
```

Adjust animation settings using _easing_ (a CSS easing string)
and _speed_ (in ms). (default: `ease` and `200`)

```js

```

#### `trickle`

Turn off the automatic incrementing behavior by setting this to `false`. (default: `true`)
NProgress.configure({ trickle: false });

#### `trickleRate` and `trickleSpeed`

You can adjust the _trickleRate_ (how much to increase per trickle) and

```js
NProgress.configure({ trickleRate: 0.02, trickleSpeed: 800 });
#### `showSpinner`
Turn off loading spinner by setting it to false. (default: `true`)
~~~ js
```

#### `parent`

specify this to change the parent container. (default: `body`)

```js

```

## Customization

Just edit `nprogress.css` to your liking. Tip: you probably only want to find
and replace occurrences of `#29d`.
make your own!
Resources

---

## Support

**Bugs and requests**: submit them through the project's issues tracker.<br>
**Questions**: ask them at StackOverflow with the tag _nprogress_.<br>
[![StackOverflow](http://img.shields.io/badge/stackoverflow-nprogress-brightgreen.svg)](http://stackoverflow.com/questions/tagged/nprogress)
[![Chat](http://img.shields.io/badge/gitter-rstacruz / nprogress-brightgreen.svg)](https://gitter.im/rstacruz/nprogress)
[default template]:
https://github.com/rstacruz/nprogress/blob/master/nprogress.js#L31
[nprogress.js]: http://ricostacruz.com/nprogress/nprogress.js
[nprogress.css]: http://ricostacruz.com/nprogress/nprogress.css
Thanks
**NProgress** © 2013-2014, Rico Sta. Cruz. Released under the [MIT License].<br>
Authored and maintained by Rico Sta. Cruz with help from [contributors].

> [ricostacruz.com](http://ricostacruz.com) &nbsp;&middot;&nbsp;
> Twitter [@rstacruz](https://twitter.com/rstacruz)
> [MIT License]: http://mit-license.org/
> [![Status](https://api.travis-ci.org/rstacruz/nprogress.svg?branch=master)](http://travis-ci.org/rstacruz/nprogress)
> [![npm version](https://img.shields.io/npm/v/nprogress.png)](https://npmjs.org/package/nprogress "View this project on npm")
> [![spm package](http://spmjs.io/badge/nprogress)](http://spmjs.io/package/nprogress)
