<?php
/* Redirect browser */
header("Location: http://toilandtoil.com");

/* Make sure that code below does not get executed when we redirect. */
exit;
?>

<?php session_start();
// have to have sesson values from the app startup to be able to path to user related stuff
?>

<!DOCTYPE html>
<html lang="en">
<!--Most code and all content © michael buckley. The rest of the actually good code was begged, borrowed or stolen from folks much smarter than I. And accredited where applicable. --Michael J. Buckley 2012 -->
<head>
    <title>60 Ways To Leave Your Mother (Alone)</title>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript">
        document.cookie = 'resolution=' + Math.max(screen.width, screen.height) + ("devicePixelRatio" in window ? "," + devicePixelRatio : ",1") + '; path=/';
    </script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.lazyload.js" type="text/javascript"></script>
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

<?php include 'php/60ways_book_slideshow.php'; ?>

<div class="wrapper">
    <?php include 'php/controls.php'; ?>
    <div class="shading_left"></div>
    <div class="shading_right"></div>
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
    function lazylazy() {
        $("img.lazy").lazyload({
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