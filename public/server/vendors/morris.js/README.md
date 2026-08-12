# Morris.js - pretty time-series line graphs

Morris.js is the library that powers the graphs on http://howmanyleft.co.uk/.
Cheers!
\- Olly (olly@oesmith.co.uk)
I'm unfortunately not able to actively support Morris.js any more. I keep an eye
If you're interested in actively contributing to Morris.js, please contact me on

## Requirements

older versions)

-   [Raphael.js](http://raphaeljs.com/) (>= 2.0)
    See [the website](http://morrisjs.github.com/morris.js/).

## Development

Fork, hack, possibly even add some tests, then send a pull request :)
the `.coffee` files, not in the compiled javascript files in the root directory
of the project.

### Developer quick-start

[nvm](https://github.com/creationix/nvm) for installing node in
With node installed, install [grunt](https://github.com/cowboy/grunt) using
with `npm install` in the morris.js project folder.
Note: I'm experimenting with using perceptual diffs to catch rendering
tests currently _only_ pass on OS X.

### 0.5.1 - 15th June 2014

-   Fix touch event handling.
-   Fix stacked=false in bar chart [#275](https://github.com/morrisjs/morris.js/issues/275)
-   Deprecate continuousLine option.
-   Update grunt dependency [#288](https://github.com/morrisjs/morris.js/issues/228)
-   Donut segment color config in data objects [#281](https://github.com/morrisjs/morris.js/issues/281)
-   Customisable line widths and point drawing [#272](https://github.com/morrisjs/morris.js/issues/272)
-   Option to disable axes individually [#253](https://github.com/morrisjs/morris.js/issues/253)
-   Range selection [#252](https://github.com/morrisjs/morris.js/issues/252)
-   Week format for x-labels [#250](https://github.com/morrisjs/morris.js/issues/250)
-   Experimenting with perceptual diffs.
-   setData method for donut charts [#211](https://github.com/morrisjs/morris.js/issues/211)
-   Automatic resizing [#111](https://github.com/morrisjs/morris.js/issues/111)
-   Fix travis builds [#298](https://github.com/morrisjs/morris.js/issues/298)
-   Option to set padding for X axis labels [#306](https://github.com/morrisjs/morris.js/issues/306)
-   Events on non-time series [#314](https://github.com/morrisjs/morris.js/issues/314)
-   Fix flickering hover box [#186](https://github.com/morrisjs/morris.js/issues/186)
-   xLabelAngle option (diagonal labels!!) [#239](https://github.com/morrisjs/morris.js/issues/239)
-   Fix area chart fill bug [#190](https://github.com/morrisjs/morris.js/issues/190)
-   Make event handlers chainable
-   Fix hovers with setData [#213](https://github.com/morrisjs/morris.js/issues/213)

### 0.4.2 - 14th April 2013

-   Fix DST handling [#191](https://github.com/morrisjs/morris.js/issues/191)
-   Parse data values from strings in Morris.Donut [#189](https://github.com/morrisjs/morris.js/issues/189)
-   Non-cumulative area charts [#199](https://github.com/morrisjs/morris.js/issues/199)
-   Round Y-axis labels to significant numbers [#162](https://github.com/morrisjs/morris.js/162)
-   Customising default hover content [#179](https://github.com/morrisjs/morris.js/179)

### 0.4.1 - 8th February 2013

-   Fix goal and event rendering. [#181](https://github.com/morrisjs/morris.js/issues/181)
-   Don't break when empty data is passed to setData [#142](https://github.com/morrisjs/morris.js/issues/142)
-   labelColor option for donuts [#159](https://github.com/morrisjs/morris.js/issues/159)

### 0.4.0 - 26th January 2013

-   Goals and events [#103](https://github.com/morrisjs/morris.js/issues/103).
-   Bower package manager metadata.
-   More flexible formatters [#107](https://github.com/morrisjs/morris.js/issues/107).
-   Color callbacks.
-   Decade intervals for time-axis labels.
-   Non-continous line tweaks [#116](https://github.com/morrisjs/morris.js/issues/116).
-   HTML hover [#134](https://github.com/morrisjs/morris.js/issues/134).
-   Disable axes [#114](https://github.com/morrisjs/morris.js/issues/114).

### 0.3.3 - 1st November 2012

-   **Bar charts!** [#101](https://github.com/morrisjs/morris.js/issues/101).

### 0.3.2 - 28th October 2012

-   **Area charts!** [#47](https://github.com/morrisjs/morris.js/issues/47).
-   Some major refactoring and test suite improvements.
-   Set smooth parameter per series [#91](https://github.com/morrisjs/morris.js/issues/91).

### 0.3.1 - 13th October 2012

-   Cycle `lineColors` on line charts to avoid running out of colours [#78](https://github.com/morrisjs/morris.js/issues/78).
-   Add method to select donut segments. [#79](https://github.com/morrisjs/morris.js/issues/79).
-   Don't go negative on yMin when all y values are zero. [#80](https://github.com/morrisjs/morris.js/issues/80).
-   Don't sort data when parseTime is false [#83](https://github.com/morrisjs/morris.js/issues/83).
-   Customise styling for points. [#87](https://github.com/morrisjs/morris.js/issues/87).
-   Donut charts!
-   Bugfix: infinite loop when data indicates horizontal line [#66](https://github.com/morrisjs/morris.js/issues/66).

### 0.2.10 - 26th June 2012

-   Support for decimal labels on y-axis [#58](https://github.com/morrisjs/morris.js/issues/58).
-   Redraw graphs with updated data using `setData` method [#64](https://github.com/morrisjs/morris.js/issues/64).

### 0.2.9 - 15th May 2012

-   Bugfix: Fix zero-value regression
-   Bugfix: Don't modify user-supplied data

### 0.2.8 - 10th May 2012

-   Customising x-axis labels with `xLabelFormat` option
-   Only use timezones when timezone info is specified
-   Fix old IE bugs (mostly in examples!)
-   Added `preunits` and `postunits` options
-   Better non-continuous series data support

### 0.2.7 - 2nd April 2012

-   Refactored x-axis labelling
-   Fix bug with single value in non time-series graphs
-   Partial series support (see `null` y-values in `examples/quarters.html`)

### 0.2.5 - 15th March 2012

-   Raw millisecond timestamp support (with `dateFormat` option)
-   YYYY-MM-DD HH:MM[:SS[.SSS]] date support
-   Decimal number labels
-   Negative y-values support
-   `units` options

### 0.2.3 - 6th Mar 2012

-   jQuery no-conflict compatibility
-   Support ISO week-number dates
-   Optionally hide hover on mouseout (`hideHover`)
-   Optionally skip parsing dates, treating X values as an equally-spaced series (`parseTime`)
-   Bugfix: mouseover error when options.data.length == 2

### 0.2.1 - 28th Feb 2012

-   Accept a DOM element _or_ an ID in `options.element`
-   Add `smooth` option
-   Add `ymax` option
    Copyright (c) 2012-2014, Olly Smith
    All rights reserved.
    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:
    list of conditions and the following disclaimer.
    this list of conditions and the following disclaimer in the documentation
    and/or other materials provided with the distribution.
    ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
    DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
    ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
    (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
    LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
    ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
    SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
