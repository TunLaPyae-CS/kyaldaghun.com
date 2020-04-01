<?php
require 'vendor/autoload.php';
require 'db_connect.php';
use \Mailjet\Resources;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response']) && isset($_POST['submit']) && isset($_POST['email']) && !empty($_POST['email'])) {

// Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfkKt0UAAAAADVfVKPzbfkyQYZ0HnolGCoKIoGX';
    $recaptcha_response = $_POST['recaptcha_response'];
    $message = false;
// Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

// Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        $mj = new \Mailjet\Client('f295b8b1f061a57883b2973ffbcf4132','b2157e4a82583775d03a041251b98382',true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => 'no-reply@myatchel.com',
                        'Name' => 'Myat Chel Entertainment Website'
                    ],
                    'To' => [
                        [
                            'Email' => "founder@myatchel.com",
                            'Name' => "Myat Chel Entertainment"
                        ]
                    ],
                    'ReplyTo' => [
                        'Email' => $_POST['email'],
                        'Name' => $_POST['name']
                    ],
                    'Subject' => "Contact from  Myat Chel Website",
                    'TextPart' => "Name : {$_POST['name']}\n\rEmail : {$_POST['email']}\n\r\n\r{$_POST['message']}",
                    'CustomID' => "MyatChelContactForm"
                ]
            ]
        ];
        $message = $_POST['email'];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        if ($response->success()) {
            header( "Refresh: 3 url=index.php" );
            echo '/>
      <title>Thank you!</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css">
</head><body><div style="text-align: center;">
<h2>Thank you...</h2>
<a href="index.php">click here if you are not redirected in a few seconds</a></div>
</body>
</html>';
            exit();
        }
    } else {
        $message = $recaptcha->score.'You are underscored.';
    }
}

//$mysqli = new mysqli('localhost','root', '','shwemyatchel_ytvideos') or die(mysqli_error($mysqli));
//$mysqli = new mysqli('10.148.0.6','myatchel_ytvideos', 'vv0nd3R*fuL','myatchel_ytvideos') or die(mysqli_error($mysqli));

$result = $mysqli->query("SELECT COUNT(*) FROM data");
$vcount = $result->fetch_row();
$page = ceil($vcount[0]/12);
if (isset($_GET['page']) && $_GET['page'] <= $page && $_GET['page'] > 0) {
    $page_number = $_GET['page'];
    $active_page = $page_number;
    $page_number--;
} elseif (isset($_GET['page']) && $_GET['page'] > $page) {
    $page_number = $page - 1;
} else  {
    $page_number = 0;
    $active_page = 1;
}
$vstart = $page_number * 12 + 1;
$vend = $page_number * 12 + 12;
if ($vend > $vcount[0]) {
    $vend = $vcount[0];
}
?>

<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Myat Chel Entertainment</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Watch your favorite Myanmar Movies Online."/>
		<meta name="keywords" content="myanmar film, myanmar movie, arri, myanmar motion picture, myanmar content, myat chel, myat chel"/>
		<link rel="stylesheet" href="assets/css/essentials.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/mystyle.css" />
		<link rel="stylesheet" href="assets/css/layout.css" />
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <script src="https://www.google.com/recaptcha/api.js?render=6LfkKt0UAAAAACTlhpwF4kJ7dYp9UCiFhPcEvqbH"></script>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6Ld7xNkUAAAAAL6E_FfGvVW34qdCucNpnwIH1JrQ', { action: 'contact' }).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });
            <?php
                    if(isset($message)) {
                        echo 'alert("'.$message.'")';
                    }
            ?>
        </script>
	</head>
	<body id="top">

			<!-- Banner -->
			<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly. data-video="images/banner"
			-->
            <div class="clearfix">
            <header id="header" class="alt">
                <h1><a href="index.php"><img src="images/smc-icon.png" /></a></h1>
            </header>
            </div>
			<!-- OWL SLIDER -->
            <div class="clearfix">
			<section id="slider">
				<div class="owl-carousel buttons-autohide controlls-over m-0 " data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": false, "transitionStyle":"fade"}'>
					<div class="item-1 item-even">
						<div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="image-container">
                                <span class="desktop">
                                    <img class="img-fluid" src="images/mgma-1920x600.jpg">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/W9whA5sr2vE?ecver=1">
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
                                    <img class="img-fluid" src="images/banner2-1920x600.jpg">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/W9whA5sr2vE?ecver=1">
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
                                    <img class="img-fluid" src="images/toe-shel-1920x600.jpg">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/W9whA5sr2vE?ecver=1">
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
                                    <img class="img-fluid" src="images/ah-myar-hnint-ma-thet-sine-thaw-thu-Banner-1920x600.jpg">
                                </span>
                                <div class="video-container responsive" yt-video-data="https://www.youtube.com/embed/W9whA5sr2vE?ecver=1">
                                </div>
                            </div>
                        </span>
                        </div>
                    </div>
				</div>

			</section>
            </div>
			<!-- /OWL SLIDER -->

			<!-- Main -->
				<div id="main">
					<div class="inner">

					<!-- Boxes -->
						<div class="about text-black">
                            <p><img src="images/smc-logo.png" /></p>
							<h1>Watch your favorite Myanmar Movies on YouTube!</h1>
							<p>Subscribe our <a href="https://www.youtube.com/channel/UC5pUbhXjcYZzcs1lzGndncw?sub_confirmation=1" target="_blank"> <img src="images/youtube-icon.png" /> <b>YouTube Channel</b></a></p>
                        </div>
                        <div style="border-top:2px solid #2e2e2e;padding-top:20px;text-align:center;">
                            <h1>Latest Feature Films</h1>
                        </div>
                        <div class="thumbnails">
                            <div class="box" style="background-color: #fff;">
                                <img src="images/picture1.jpg" alt="" style="width: 250px; height: auto;" />
                            </div>
                            <div class="box" style="background-color: #fff;">
                                <img src="images/picture2.jpg" alt="" style="width: 250px; height: auto;" />
                            </div>
                            <div class="box" style="background-color: #fff;">
                                <img src="images/picture3.jpg" alt="" style="width: 250px; height: auto;" />
                            </div>
                            <div class="box" style="background-color: #fff;">
                                <img src="images/picture4.jpg" alt="" style="width: 250px; height: auto;" />
                            </div>
                        </div>
                        <div class="row justify-content-end" style="border-top:2px solid #2e2e2e;padding-top:20px;">Page: <?php echo $active_page; ?> , Video: <?php echo "$vstart - $vend"; ?> <br /><br /></div>

                        <div class="thumbnails">
                            <?php

                            if ($page_number == 0) {
                                $result = $mysqli->query("SELECT * FROM data ORDER BY data.id DESC LIMIT 12");
                            } else {
                                $offset = $page_number * 12;
                                $result = $mysqli->query("SELECT * FROM data ORDER BY data.id DESC LIMIT 12 OFFSET $offset");
                            }
                            while ($row = $result->fetch_assoc()) {
                               if (strlen($row['description']) > 100) {

                                    // truncate string
                                    $stringCut = substr($row['description'], 0, 100);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                   $row['description'] = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                }
                                ?>
                                <div class="box">
                                    <a href="https://youtu.be/<?php echo $row['vid']; ?>" class="image fit"><img src="https://i4.ytimg.com/vi/<?php echo $row['vid']; ?>/hqdefault.jpg" alt="" /></a>
                                    <div class="inner">
                                        <h4><a href="https://youtu.be/<?php echo $row['vid']; ?>"><?php echo $row['title']; ?></a></h4>
                                        <p><a href="https://youtu.be/<?php echo $row['vid']; ?>" class="button style3 fit" data-poptrox="youtube,800x400">Watch Now</a></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

						</div>

						<div align="center" style="border-top:2px solid #2e2e2e;padding-top:20px;">
							Pages : &nbsp;&nbsp;
                            <?php
                                for ($i=1; $i<=$page; $i++) {
                                    if ($i == $active_page) {
                                        echo '&nbsp;&nbsp;'.$i.'&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;';
                                    } else {
                                        echo '&nbsp;&nbsp;<a href="index.php?page='.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;';
                                    }
                                 }
                            ?>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<div class="map">
							<div class="box">
								<h2>Myat Chel Entertainment</h2>
								<p>No.254 Ground, 36th Street,<br/>
                                    Kyauktada Township 11181,<br />
									Yangon, Myanmar.<br />
									<br />
									Tel: 09 514 0692<br />
									Email: <a href="mailto:founder@myatchel.com">founder@myatchel.com</a>
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
										src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA6SxoERHXMv_7aKpfWh_-M8qjYdOxGT80&q=မျက်ခြယ်" allowfullscreen>
								</iframe>
							</div>
						</div>

                        <div class="contactForm">
                            <form name="contact_form" method="POST" action="index.php">

                                <h1 class="title">
                                    Contact Form
                                </h1>

                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                        <input type="text" name="name" class="input" placeholder="Name" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control">
                                        <input type="email" name="email" class="input" placeholder="Email Address" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Message</label>
                                    <div class="control">
                                        <textarea name="message" class="textarea" placeholder="Message" required></textarea>
                                    </div>
                                </div>

                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-link" name="submit">Send Message</button>
                                    </div>
                                </div>

                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                            </form>
                        </div>


						<ul class="icons">
							<li><a href="https://www.facebook.com/MyatChelMotionPicturesProduction" class="icon fa-facebook" target="_"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.youtube.com/channel/UC5pUbhXjcYZzcs1lzGndncw" class="icon fa-youtube" target="_"><span class="label">YouTube</span></a></li>
							<li><a href="mailto:founder@myatchel.com" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright text-black">2020 &copy; Myat Chel Entertainment</p>
					</div>
				</footer>

		<!-- Scripts -->
			<script>var plugin_path = 'assets/plugins/';</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
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