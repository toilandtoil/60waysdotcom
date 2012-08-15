/**
 * Created with JetBrains PhpStorm.
 * User: Tess
 * Date: 8/14/12
 * Time: 9:10 PM
 * To change this template use File | Settings | File Templates.
 */

/* this is a test to see if I can keep the google analytics stuff in an external file. see: http://stackoverflow.com/questions/3263818/using-google-analytics-asynchnonous-code-from-external-js-file */
var _gaq = _gaq || [];

function loadtracking() {
    window._gaq.push(['_setAccount', 'UA-3340666-2']);
    window._gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
}

loadtracking();
