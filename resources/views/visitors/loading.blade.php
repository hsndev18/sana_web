<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <title>Sign In || AiWave- AI SaaS Website HTML5 UI Kit</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/favicon.png">
    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<main class="page-wrapper">
    <!-- Start Sign up Area  -->
    <div class="signup-area">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12 bg-color-blackest left-wrapper">
                    <div class="sign-up-box">
                        <div class="loader-container">
                            <div class="loader-circle"></div>
                            <div class="loader-circle"></div>
                            <div class="loader-circle"></div>
                            <div class="loader-circle"></div>
                        </div>
                        <div class="signup-box-bottom">
                            <livewire:visitors.video.loading :videoId="$videoId"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="close-button" href="javascript:void(0)">
            <i class="fa-sharp fa-regular fa-bell"></i>
        </a>
    </div>
    <!-- End Sign up Area  -->
</main>

<!-- All Scripts  -->
<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- JS
============================================ -->
<script src="{{ asset("assets/js/vendor/modernizr.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/waypoint.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/wow.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/counterup.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/sal.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/slick.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/text-type.js") }}"></script>
<script src="{{ asset("assets/js/vendor/prism.js") }}"></script>
<script src="{{ asset("assets/js/vendor/jquery.style.swicher.js") }}"></script>
<script src="{{ asset("assets/js/vendor/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("assets/js/vendor/backto-top.js") }}"></script>

<script src="{{ asset("assets/js/vendor/js.cookie.js") }}"></script>
<script src="{{ asset("assets/js/vendor/jquery-one-page-nav.js") }}"></script>
<!-- Main JS -->
<script src="{{ asset("assets/js/main.js") }}"></script>
</body>

</html>
