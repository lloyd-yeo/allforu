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
    <link rel="stylesheet" href="{{ asset('canvas/css/colors.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/card.css') }}" type="text/css"/>
    <link rel="stylesheet" href="canvas/css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Document Title
    ============================================= -->
    <title>Login - AllForU</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin"
                 style="width: 100%; height: 100%; position: absolute; left: 0; top: 0;
                 background: url('canvas/images/afu-wallpaper.jpg') center center no-repeat; background-size: cover;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="row center">
                        <a href="index.html"><img style="-webkit-filter: invert(1); filter: invert(1);"
                                                  src="canvas/images/afu-logo.png" alt="AllForU Logo"></a>
                    </div>

                    <div class="panel panel-default divcenter noradius noborder"
                         style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                        <div class="panel-body" style="padding: 40px;">
                            <form id="login-form" role="form"
                                  method="POST"
                                  action="{{ url('register-profile') }}">
                                <h3>Register - New User</h3>

                                <input type="hidden"
                                       name="_token"
                                       value="{{ csrf_token() }}">

                                <div class="col_full">
                                    <label for="login-form-username">Name:</label>
                                    <input type="text" id="login-form-username" name="name" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-username">Email:</label>
                                    <input type="text" id="login-form-username" name="email" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password">Password:</label>
                                    <input type="password" id="login-form-password" name="password" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password">Confirm Password:</label>
                                    <input type="password" id="login-form-password-c" name="cpassword" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="login-form-submit"
                                            name="login-form-submit" value="register">Register
                                    </button>
                                </div>
                            </form>

                            <div class="line line-sm"></div>

                            <div class="center" style="display:none;">
                                <h4 style="margin-bottom: 15px;">or Login with:</h4>
                                @desktop
                                <div style="width:240px; margin-left:40px;">
                                    <div class="fb-login-button" data-max-rows="1"
                                         onlogin="checkLoginState();"
                                         data-scope="public_profile,email"
                                         data-width="236"
                                         data-size="large"
                                         data-button-type="login_with"
                                         data-show-faces="false"
                                         data-auto-logout-link="true"
                                         data-use-continue-as="true"></div>
                                    @elsedesktop
                                    <div>
                                        <div class="fb-login-button" data-max-rows="1"
                                             data-size="medium" data-button-type="login_with"
                                             data-show-faces="false"
                                             data-auto-logout-link="false"
                                             data-use-continue-as="false"></div>
                                        @enddesktop
                                    </div>
                                    {{--<a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>--}}
                                    {{--<span class="hidden-xs">or</span>--}}
                                    {{--<a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>--}}
                                </div>
                            </div>
                        </div>

                        <div class="row center dark">
                            <small>Copyrights &copy; All Rights Reserved by AllForU.</small>
                        </div>

                    </div>
                </div>

            </div>

    </section><!-- #content end -->

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
</script>
</body>
</html>