# Skycons

JavaScript using the HTML5 canvas tag. They're easy to use, and pretty
lightweight, so they shouldn't rain on your parade:
<canvas id="icon1" width="128" height="128"></canvas>
<script>
var skycons = new Skycons({"color": "pink"});
// you can add a canvas by it's ID...
skycons.add("icon1", Skycons.PARTLY_CLOUDY_DAY);
// ...or by the canvas DOM element itself.
// if you're using the Forecast API, you can also supply
// strings: "partly-cloudy-day" or "rain".
skycons.play();
// you can also halt animation with skycons.pause()
skycons.set("icon1", Skycons.PARTLY_CLOUDY_NIGHT);
// want to remove one altogether? no problem:
</script>
Skycons were designed for [Forecast](http://forecast.io/) by those wacky folks
excellent [Climacons](http://adamwhitcroft.com/climacons/). The source code has
fit! ♡
[cc0]: http://creativecommons.org/publicdomain/zero/1.0/

---

Several kind folks have made variants of Skycons:

-   [Color Skycons](https://github.com/maxdow/skycons) by Maxime Warnier
