<?php session_start();
// have to have sesson values from the app startup to be able to path to user related stuff
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>60 Ways To Leave Your Mother (Alone)</title>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
			document.cookie = 'resolution=' + Math.max(screen.width, screen.height) + ("devicePixelRatio" in window ? "," + devicePixelRatio : ",1") + '; path=/';

		</script>
		<!-- Asynchronous google analytics; this is the official snippet.
   Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.-->
   
  <script>
  
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-3340666-2']);
    _gaq.push(['_trackPageview']);
  
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  
  </script>
        <script>//some script here. Just testing.</script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.lazyload.js" type="text/javascript"></script>
		<script src="js/jquery.scrollstop.js" type="text/javascript"></script>
		<script src='js/swipe.js' type="text/javascript"></script>
		<link rel="stylesheet" href="./css/base.css" type="text/css" media="all">
		<link rel="stylesheet" href="./css/narrow.css" type="text/css" media="screen and (max-height: 485px) and (orientation:portrait)">
		<link rel="stylesheet" href="./css/shallow.css" type="text/css" media="screen and (max-height: 255px) and (orientation:landscape)">
		<!--<link rel="stylesheet" href="./css/medium.css" type="text/css" media="screen and (min-width: 600px) and (max-width: 900px)">-->
		<link rel="stylesheet" href="./css/large.css" media="screen and (min-width: 1151px)">
	</head>
	<body>
		<?php /*echo "the new image width appears to be " . $_SESSION['myVar'];*/

		$slides = file('database/60ways.txt');
		$products = '';
		$myInt = 0;

		foreach ($slides as $v) {
			/* Split the file row by the vertical lines
			 * Using preg_split to remove unnecessary spaces and tabulations
			 *
			 * these lines below were taken out to test some CSS nonsense
			 *
			 * 			<a class="slideInfo60ways" href="'.$data[2].'">
			 * 				<div class="title60ways">'.$data[0].'</div>
			 * 				<div class="description60ways">'.$data[1].'</div>
			 * 			</a>
			 * 				<img class="lazy" src="images/grey.gif" data-original="images/60ways/' . $data[3] . '">
			 *
			 */
			$data = preg_split('/\s*\|\s*/', $v);
			$products .= '

<div class="slide60ways" id="slide60ways' . $myInt . '">
<div class="slideImage60ways" id="slideImage60ways' . $myInt . '">
<img class="' . $data[1] . '" src="images/60ways/' . $data[3] . '" data-original="images/60ways/' . $data[4] . '">
</div>
</div>
';
			$myInt++;
		}
		?>
		<div class="wrapper">
			<div id="slider60ways">
				<ul>
					<?=$products
					?>
				</ul>
				<div class="footer">
					<a href="#" id="prev" onClick="slider60ways.prev();return false;">prev</a>
					<a href="#" id="copyright" onClick="http://60ways.com/swipey">® 2012 Michael Buckley & Toil and Toil Books</a>
					<a href="#" id="next" onClick="slider60ways.next();return false;">next</a>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		//http://stackoverflow.com/questions/2517408/how-can-i-implement-lazy-loading-on-a-page-with-500-images
		//https://docs.google.com/spreadsheet/ccc?key=0Aqln2akPWiMIdERkY3J2OXdOUVJDTkNSQ2ZsV3hoWVE#gid=2
		//http://net.tutsplus.com/tutorials/javascript-ajax/how-to-create-an-infinite-scroll-web-gallery/
		//http://stackoverflow.com/questions/6173382/cant-able-to-get-the-properties-of-touchstart-event
		//make a function that will set the src attribute to the "next" image
		function loadLazy() {
			$slideNumber = slider60ways.getPos();
			$slideImageContainer = $('#slideImage60ways' + $slideNumber);
			$prevSlideImageContainer = $('#slideImage60ways' + ($slideNumber - 1));
			$nextSlideImageContainer = $('#slideImage60ways' + ($slideNumber + 1));
			$nextNextSlideImageContainer = $('#slideImage60ways' + ($slideNumber + 2));
			//alert($slideImageContainer.selector);
			// retrieve the image inside this element
			var elem = $slideImageContainer.find('img');
			var prevElem = $prevSlideImageContainer.find('img');
			var nextElem = $nextSlideImageContainer.find('img');
			var nextNextElem = $nextNextSlideImageContainer.find('img');
			// set the 'src' to the 'data-original' value
			elem.attr('src', elem.data('original'));
			prevElem.attr('src', prevElem.data('original'));
			nextElem.attr('src', nextElem.data('original'));
			nextNextElem.attr('src', nextNextElem.data('original'));
		}

		//reference:
		//http://stackoverflow.com/questions/10281210/jquery-update-image-src-on-hover
		//http://stackoverflow.com/questions/652763/jquery-object-to-string
		//http://www.neowin.net/forum/topic/696738-passing-a-variable-to-a-jquery-selector/
	</script>
	<script type="text/javascript">
		function lazylazy() {
			$("img.lazy").lazyload({
				effect: "fadeIn",
				threshold : 2000
			});
		}
	</script>

	<script type="text/javascript">
		//instantiate a swipe object and pass in a bunch of
		//options, especially "callback" which fires on every slide change.
		var slider60ways = new Swipe(document.getElementById('slider60ways'), {
			startSlide : 0,
			speed : 700,
			auto : 10000,
			callback : lazylazy
		});

	</script>
	<script type="text/javascript">
		function myOrientResizeFunction() {
			var theWindow = $(window), $slider = $("#slider60ways");

			if(theWindow.width() < theWindow.height()) {
				$slider.removeClass().addClass('slider60waysVert');
				//alert(("width=" + theWindow.width() + "height=" + theWindow.height() + ", thus the window is vertical and the div background should be orange"));
			} else {
				$slider.removeClass().addClass('slider60waysHorz');
				//alert(("width=" + theWindow.width() + "height=" + theWindow.height() + ", thus the window is horizontal and the div background should be yellow"));
			}
		}

		//bind to resize
		$(window).resize(function() {
			myOrientResizeFunction()
		});
		//if you need to call it at page load to resize elements etc.
		$(window).load(function() {
			myOrientResizeFunction()
		});
		//check for the orientation event and bind accordingly
		if(window.DeviceOrientationEvent) {
			window.addEventListener('orientationchange', myOrientResizeFunction, false);
		}
		//  reference : http://blog.stevensanderson.com/2011/10/05/full-height-app-layouts-a-css-trick-to-make-it-easier/
	</script>
</html>