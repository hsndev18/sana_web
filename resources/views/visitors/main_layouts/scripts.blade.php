<!-- All Scripts  -->

<!-- JS
    ============================================ -->
<script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/waypoint.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/sal.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/text-type.js') }}"></script>
<script src="{{ asset('assets/js/vendor/prism.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.style.swicher.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/backto-top.js') }}"></script>

<script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-one-page-nav.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
@livewireScripts


<!-- yield scripts it's
        optional section, if you want to add custom scripts for spacific page just use section scripts -->
@yield('scripts')
<!-- End Scripts -->

