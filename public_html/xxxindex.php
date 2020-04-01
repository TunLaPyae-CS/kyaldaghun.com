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
		<link rel="stylesheet" href="assets/css/main.css" />
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
				<section id="banner">
					<div class="inner">
						<header>
							<h1>Shwe Myat Chel Media</h1>
						</header>
						<a href="#main" class="more">Learn More</a>
					</div>
				</section>

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
                                    $cast .= '... <br /><br /><a href="https://youtu.be/'.$id.'" class="button style3 fit" data-poptrox="youtube,800x400">Watch Now</a>';
                                } else {
                                    $cast .= '... <br /><br /><a href=https://youtu.be/'.$id.'" class="button style3 fit" data-poptrox="youtube,800x400">Watch Now</a>';
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>