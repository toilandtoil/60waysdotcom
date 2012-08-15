<?php session_start();
// have to have sesson values from the app startup to be able to path to user related stuff
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>60 Ways To Leave Your Mother (Alone)</title>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript">
        document.cookie = 'resolution=' + Math.max(screen.width, screen.height) + ("devicePixelRatio" in window ? "," + devicePixelRatio : ",1") + '; path=/';
    </script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.lazyload.js" type="text/javascript"></script>
    <!--<script src="js/jquery.scrollstop.js" type="text/javascript"></script>-->
    <!--  Asynchronous google analytics; this is the official snippet. Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3340666-2']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script> -->

    <script src='js/swipe.js' type="text/javascript"></script>
    <script src='js/google_analytics.js' type="text/javascript"></script>
    <link rel="stylesheet" href="./css/base.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/narrow.css" type="text/css"
          media="screen and (max-height: 485px) and (orientation:portrait)">
    <link rel="stylesheet" href="./css/shallow.css" type="text/css"
          media="screen and (max-height: 255px) and (orientation:landscape)">
    <!--<link rel="stylesheet" href="./css/medium.css" type="text/css" media="screen and (min-width: 600px) and (max-width: 900px)">-->
    <link rel="stylesheet" href="./css/large.css" media="screen and (min-width: 1151px)">
</head>
<body>
<?php include 'php/header.php'; ?>

<?php include 'php/60ways_book_slideshow.php'; ?>

<div class="wrapper">
    <div id="slider60ways">
        <ul>
            <?=$products
            ?>
        </ul>
    </div>
</div>

<?php include 'php/footer.php'; ?>
</body>
<script type="text/javascript">
    //http://stackoverflow.com/questions/2517408/how-can-i-implement-lazy-loading-on-a-page-with-500-images
    //https://docs.google.com/spreadsheet/ccc?key=0Aqln2akPWiMIdERkY3J2OXdOUVJDTkNSQ2ZsV3hoWVE#gid=2
    //http://net.tutsplus.com/tutorials/javascript-ajax/how-to-create-an-infinite-scroll-web-gallery/
    //http://stackoverflow.com/questions/6173382/cant-able-to-get-the-properties-of-touchstart-event
    //http://stackoverflow.com/questions/10281210/jquery-update-image-src-on-hover
    //http://stackoverflow.com/questions/652763/jquery-object-to-string
    //http://www.neowin.net/forum/topic/696738-passing-a-variable-to-a-jquery-selector/
</script>
<script type="text/javascript">
    function lazylazy() {
        $("img.lazy").lazyload({
            effect:"fadeIn",
            threshold:2000
        });
    }
</script>

<script type="text/javascript">
    //instantiate a swipe object and pass in a bunch of
    //options, especially "callback" which fires on every slide change.
    var slider60ways = new Swipe(document.getElementById('slider60ways'), {
        startSlide:0,
        speed:700,
        auto:10000,
        callback:lazylazy
    });

</script>
<script type="text/javascript">
    function myOrientResizeFunction() {
        var theWindow = $(window), $slider = $("#slider60ways");

        if (theWindow.width() < theWindow.height()) {
            $slider.removeClass().addClass('slider60waysVert');
            //alert(("width=" + theWindow.width() + "height=" + theWindow.height() + ", thus the window is vertical and the div background should be orange"));
        } else {
            $slider.removeClass().addClass('slider60waysHorz');
            //alert(("width=" + theWindow.width() + "height=" + theWindow.height() + ", thus the window is horizontal and the div background should be yellow"));
        }
    }

    //bind to resize
    $(window).resize(function () {
        myOrientResizeFunction()
    });
    //if you need to call it at page load to resize elements etc.
    $(window).load(function () {
        myOrientResizeFunction()
    });
    //check for the orientation event and bind accordingly
    if (window.DeviceOrientationEvent) {
        window.addEventListener('orientationchange', myOrientResizeFunction, false);
    }
    //  reference : http://blog.stevensanderson.com/2011/10/05/full-height-app-layouts-a-css-trick-to-make-it-easier/
</script>
</html>