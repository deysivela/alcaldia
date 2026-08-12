[![Join the chat at https://gitter.im/moment/moment](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/moment/moment?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Coverage Status](https://coveralls.io/repos/moment/moment/badge.svg?branch=develop)](https://coveralls.io/r/moment/moment?branch=develop)
A lightweight JavaScript date library for parsing, validating, manipulating, and formatting dates.

## Port to ECMAScript 6 (version 2.10.0)

ECMAScript 6 modules and placed inside `src/`. Previously `moment.js`, `locale/*.js` and
the source is in `src/`, temporary build (ECMAScript 5) files are placed under
`locale/*.js` files are updated only on release.
If you want to use a particular revision of the code, make sure to run
`grunt transpile update-index`, so `moment.js` and `locales/*.js` are synced
with `src/*`. We might place that in a commit hook in the future.

## Upgrading to 2.0.0

There are a number of small backwards incompatible changes with version 2.0.0. [See the full descriptions here](https://gist.github.com/timrwood/e72f2eef320ed9e37c51#backwards-incompatible-changes)

-   Changed two digit year parsing cutoff to match strptime.
-   Removed `moment#sod` and `moment#eod` in favor of `moment#startOf` and `moment#endOf`.
-   Removed `moment.humanizeDuration()` in favor of `moment.duration().humanize()`.
-   Duplicate `Date` passed to `moment()` instead of referencing it.

## [Contributing](https://github.com/moment/moment/blob/develop/CONTRIBUTING.md)

write to [ichernev](https://github.com/ichernev).
Moment.js is freely distributable under the terms of the [MIT license](https://github.com/moment/moment/blob/develop/LICENSE).
[license-url]: LICENSE
[npm-version-image]: http://img.shields.io/npm/v/moment.svg?style=flat
[travis-url]: http://travis-ci.org/moment/moment
