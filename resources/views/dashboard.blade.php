<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/style.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/magnific-popup.css" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/responsive.css" type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('canvas/css/colors.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/card.css') }}" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Document Title
    ============================================= -->
    <title>AllForU</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="/" class="standard-logo" data-dark-logo="canvas/images/logo-dark.png"><img
                                src="canvas/images/afu-logo.png" alt="Canvas Logo"></a>
                    <a href="/" class="retina-logo" data-dark-logo="canvas/images/logo-dark@2x.png"><img
                                src="canvas/images/afu-logo.png"
                                alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                @include('layouts.nav')

            </div>

        </div>

    </header><!-- #header end -->

    @include('layouts.page-title')

    <!-- Content
    ============================================= -->
    <section id="content" style="background-color:#E7EAF5;">

        <div class="content-wrap" style="padding-top:45px;">

            @if (Auth::user()->student_leader == 1 && Auth::user()->club_id == NULL)
                <div class="modal-on-load" data-target="#myModal1"></div>

                <!-- Modal -->
                <div class="modal1 mfp-hide" id="myModal1">
                    <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
                        <div class="center" style="padding: 50px;">
                            <h3>Hey, we noticed you are a student leader!</h3>
                            <p class="nobottommargin">Your club/organization doesn't seem to be listed on our platform yet, click the button below to add it in!</p>

                        </div>
                        <div class="section center nomargin" style="padding: 30px;">
                            <a href="/admin/clubs/create" class="button" >Let's go!</a>
                            {{--onClick="$.magnificPopup.close();return false;"--}}
                        </div>
                    </div>
                </div>
            @endif

                @desktop
                <div class="container clearfix" style="width: 600px;">
                @elsedesktop
                <div class="container clearfix">
                @enddesktop

                <h3>Welcome back, {{ Auth::user()->name }}!</h3>
                @if (Auth::user()->student_leader == 1 && Auth::user()->club_id != NULL)
                        <center>
                            <a href="/admin/{{ $event->id }}" class="button button-3d button-xlarge
                                    button-rounded button-aqua
                                    text-center">LEARN MORE</a></center>
                @endif

                <div class="title-block">
                    <h1>Events</h1>
                    <span></span>
                </div>
                @foreach ($events as $event)
                    @if ($event->club != NULL)
                        @include('cards.event', ['event' => $event])
                    @endif
                @endforeach

                <div class="clear"></div>

                <!-- Related Portfolio Items
                ============================================= -->
                <div class="title-block">
                    <h1>Societies</h1>
                    <span></span>
                </div>


                <div id="related-portfolio" class="owl-carousel portfolio-carousel carousel-widget"
                     data-margin="0" data-nav="true"
                     data-autoplay="5000"
                     data-items-xxs="1" data-items-xs="1" data-items-sm="1" data-items-lg="1">
                    @foreach ($clubs as $club)
                        <div class="oc-item">
                            @include('cards.club-carousel', [ 'club' => $club ])
                        </div>
                    @endforeach
                </div><!-- .portfolio-carousel end -->
            </div>
        </div>
    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <footer style="display:none;" id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_two_third">

                    <div class="col_one_third">

                        <div class="widget clearfix">

                            <img src="canvas/images/footer-widget-logo.png" alt="" class="footer-logo">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp;
                                <strong>Flexible</strong> Design Standards.</p>

                            <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third">

                        <div class="widget widget_links clearfix">

                            <h4>Blogroll</h4>

                            <ul>
                                <li><a href="canvas/http://codex.wordpress.org/">Documentation</a></li>
                                <li>
                                    <a href="canvas/http://wordpress.org/support/forum/requests-and-feedback">Feedback</a>
                                </li>
                                <li><a href="canvas/http://wordpress.org/extend/plugins/">Plugins</a></li>
                                <li><a href="canvas/http://wordpress.org/support/">Support Forums</a></li>
                                <li><a href="canvas/http://wordpress.org/extend/themes/">Themes</a></li>
                                <li><a href="canvas/http://wordpress.org/news/">WordPress Blog</a></li>
                                <li><a href="canvas/http://planet.wordpress.org/">WordPress Planet</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Recent Posts</h4>

                            <div id="post-list-footer">
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="50" data-to="15065421"
                                                                         data-refresh-interval="80" data-speed="3000"
                                                                         data-comma="true"></span></div>
                                <h5 class="nobottommargin">Total Downloads</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="100" data-to="18465"
                                                                         data-refresh-interval="50" data-speed="2000"
                                                                         data-comma="true"></span></div>
                                <h5 class="nobottommargin">Clients</h5>
                            </div>

                        </div>

                    </div>

                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp;
                            Inside Scoops:</h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post"
                              class="nobottommargin">
                            <div class="input-group divcenter">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                                       class="form-control required email" placeholder="Enter your Email">
                                <span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
                            </div>
                        </form>
                    </div>

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin"
                                   style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#">
                                    <small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on
                                        Facebook
                                    </small>
                                </a>
                            </div>
                            <div class="col-md-6 clearfix">
                                <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin"
                                   style="margin-right: 10px;">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#">
                                    <small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS
                                        Feeds
                                    </small>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i
                            class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i
                            class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="canvas/js/jquery.js"></script>
<script type="text/javascript" src="canvas/js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="canvas/js/functions.js"></script>
<script>
    $(window).load(function () {
        $('.card-wrapper').addClass('loaded');
    })

    $('.more-info').click(function () {
        $(".card").toggleClass('flip');
        $('.arrow').remove();
    });
    //    $('#background').click(function(){
    //        $('#card').removeClass('flip');
    //    })
</script>
</body>
</html>