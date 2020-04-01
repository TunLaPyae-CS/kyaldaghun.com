<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Shwe Myat Chel Media</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Watch your favorite Myanmar Movies Online."/>
		<meta name="keywords" content="myanmar film, myanmar movie, arri, myanmar motion picture, myanmar content, shwe myat chel, myat chel"/>
		<link rel="stylesheet" href="assets/css/essentials.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/mystyle.css" />
		<link rel="stylesheet" href="assets/css/layout.css" />
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	</head>
	<body id="top">

			<!-- Banner -->
			<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly. data-video="images/banner"
			-->

			<!-- OWL SLIDER -->
			<section id="slider">
				<div class="owl-carousel buttons-autohide controlls-over m-0 " data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": false, "transitionStyle":"fade"}'>
					<div class="item-1 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="https://shwesinoo.sgp1.digitaloceanspaces.com/sso_web/movies/qHMiB2lcDq2UNxHqT7OIj5SR/banner-original.png">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/oK0FMBX2zow?ecver=1">
                                </div>
                            </div>
                        </span>
						</div>
					</div>
					<div class="item-2 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="https://shwesinoo.sgp1.digitaloceanspaces.com/sso_web/movies/S54xuzV0n31oeYealNNc9ZCb/banner-original.png">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/_LtAkkBleRQ?ecver=1">
                                </div>
                            </div>
                        </span>
						</div>
					</div>
					<div class="item-3 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="https://shwesinoo.sgp1.digitaloceanspaces.com/sso_web/movies/TocAGo59S8AVlsuADChFRhZ0/banner-original.png">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/N8lpyTgNfU4?ecver=1">
                                </div>
                            </div>
                        </span>
						</div>
					</div>
					<div class="item-4 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="https://shwesinoo.sgp1.digitaloceanspaces.com/sso_web/movies/zU0DLtCJDlq3IUJ7oLe6FOFx/banner-original.png">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/o5z_vScYQU8?ecver=1">
                                </div>
                            </div>
                        </span>
						</div>
					</div>
					<div class="item-5 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="https://shwesinoo.sgp1.digitaloceanspaces.com/sso_web/movies/AA8j1W5JOpPguNdP69NO3fAM/banner-original.png">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/znzLvmrKgHk?ecver=1">
                                </div>
                            </div>
                        </span>
						</div>
					</div>
				</div>

			</section>
			<!-- /OWL SLIDER -->

			<!-- Main -->
				<div id="main">
					<div class="inner">

					<!-- Boxes -->
						<div class="about">
							<h1>Watch your favorite Myanmar Movies on YouTube!</h1>
							<p>Subscribe our <a href="https://www.youtube.com/channel/UC7IAmmGfPXZd01LYKW8bn6g?sub_confirmation=1" target="_blank"> <img src="images/youtube-icon.png" /> <b>YouTube Channel</b></a></p>
						</div>
						<div class="thumbnails">
                            <?php
                            $xml_link = 'https://www.youtube.com/feeds/videos.xml?channel_id=UC7IAmmGfPXZd01LYKW8bn6g';
                            $result = simplexml_load_file($xml_link) or die("Error: Cannot create object");
                            $newArray = [];
                            $i = 0;
                            foreach($result->entry as $row) {
                                foreach ($row->xpath('yt:videoId') as $video) {
                                    $id = $video;
                                }
                                $title = $row->title;
                                $url = $row->link->attributes()->href;
                                foreach ($row->xpath('media:group') as $media) {
                                    foreach ($media->xpath('media:thumbnail') as $thumbnail) {
                                        $image = $thumbnail->attributes()->url;
                                    }
                                    foreach ($media->xpath('media:description') as $desc) {
                                        $cast = $desc;
                                    }

                                }
                                if (strlen($cast) > 100) {

                                    // truncate string
                                    $stringCut = substr($cast, 0, 100);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $cast = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $cast .= '... <br /><br /><a href="https://youtu.be/'.$id.'" data-poptrox="youtube,800x400">Watch</a>';
                                } else {
                                    $cast .= '... <br /><br /><a href="https://youtu.be/'.$id.'" data-poptrox="youtube,800x400">Watch</a>';
                                }
                                echo '<div class="box">
                                    <a href="https://youtu.be/'.$id.'" class="image fit"><img src="'.$image.'" alt="" /></a>
                                    <div class="inner">
                                        <h3><a href="https://youtu.be/'.$id.'">'.$title.'</a></h3>
                                        <p>'.$cast.'</p>
                                    </div>
                                </div>';
                                $i++;
                                if ($i == 20) {
                                    break;
                                }
                            }
                            ?>
						</div>

						<div align="center" style="border-top:2px solid #2e2e2e;padding-top:20px;">
							Watch more at our <a href="https://www.youtube.com/channel/UC7IAmmGfPXZd01LYKW8bn6g/videos" target="_blank">YouTube Channel</a>.
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<div class="map">
							<div class="box">
								<h2>Shwe Myat Chel Media</h2>
								<p>No. 48, Union Lane,<br/>
									Bahan 11201, Yangon<br />
									Myanmar.<br />
									<br />
									Tel: 09 514 0692<br />
									Email: <a href="mailto:info@shwemyatchel.com">info@shwemyatchel.com</a>
								</p>
							</div>
							<div class="box">
								<header>
									<h1>Find us on Map</h1>
								</header>
								<iframe
										width="360"
										height="270"
										frameborder="0" style="border:0"
										src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA6SxoERHXMv_7aKpfWh_-M8qjYdOxGT80&q=Shwe+Myat+Chel+Media" allowfullscreen>
								</iframe>
							</div>
						</div>


						<ul class="icons">
							<li><a href="https://www.facebook.com/Shwe-Myat-Chel-Media-106892880772626" class="icon fa-facebook" target="_"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.youtube.com/channel/UC7IAmmGfPXZd01LYKW8bn6g" class="icon fa-youtube" target="_"><span class="label">YouTube</span></a></li>
							<li><a href="mailto:info@shwemyatchel.com" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">2020 &copy; Shwe Myat Chel Media</p>
					</div>
				</footer>

		<!-- Scripts -->
			<script>var plugin_path = 'assets/plugins/';</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/scripts.js"></script>

			<script type="text/javascript">
				var owlie = $("div[class^='owl-carousel']");
				var isPause;
				var myInterval;
				var timer = 0;
				$(document).ready(function() {
					$('.video-container').each(function() {
						var container = owlie.find('.video-container:has(iframe)');
						if (!container.length) {
							var playIcon = '<img class="play-icon" src="images/play-icon.png" />';
							$(this).empty().append(playIcon);
							$('.play-icon').hide();
						}
					});
				});

				$(".video-container").on('mouseover tap',function() {
					var container = owlie.find('.video-container:has(iframe)');
					if (!container.length) {
						$('.play-icon').show();
						owlie.trigger('owl.stop');
						clearInterval(myInterval);
					}
				});

				$(".video-container").on('mouseout mouseleave',function() {
					var container = owlie.find('.video-container:has(iframe)');
					if (!container.length) {
						$('.play-icon').hide();
						playSlider();
					}
				});

				$(".video-container").click(function(){
					var src = $(this).attr('yt-video-data');
					var yt = '<iframe width="100%" height="100%" class="media-youtube-player video-embed" src="' + src + '?wmode=opaque&amp;autoplay=1&amp;modestbranding=0&amp;rel=0&amp;showinfo=1&amp;color=red&amp;enablejsapi=1" frameborder="0" allowfullscreen="">Video</iframe>';
					owlie.trigger('owl.stop');
					clearInterval(myInterval);
					$(this).empty().append(yt);
				});

				function sliderOnNext() {
					var container = owlie.find('.video-container:has(iframe)');
					if (container.length) {
						var playIcon = '<img class="play-icon" src="images/play-icon.png" />';
						container.empty().append(playIcon);
						timer = 0;
						playSlider();
					}
				}
				function sliderOnPrev() {
					var container = owlie.find('.video-container:has(iframe)');
					if (container.length) {
						var playIcon = '<img id="video-icon" class="play-icon" src="images/play-icon.png" />';
						container.empty().append(playIcon);
						timer = 0;
						playSlider();
					}
				}
				function playSlider() {
					isPause = false;
					clearInterval(myInterval);
					myInterval = setInterval(triggerPlay, 1000);
				}
				function triggerPlay() {
					if(isPause === false){
						timer = timer + 1;
						if (timer >= 7) {
							timer = 0;
							owlie.trigger('owl.next');
						}
					}
				}

			</script>
	</body>
</html>