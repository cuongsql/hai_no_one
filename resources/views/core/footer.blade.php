<footer>
    <div class="container container-profile  container-profile-main  " id="footer_">
        <div class="footer__container">
            <div class="footer clearfix">
                <ul class="nav pull-right">
                    <li><a href="/terms-of-use">Terms</a></li>
                    <li><a href="/privacy-and-policy">Privacy & Policy</a></li>
                    <li><a href="/about-us">About</a></li>
                    <li><a href="/contact_us">Contact Us</a></li>
                    <li><a href="/ads">Advertising</a></li>

                    <li><a href="/blog">Blog</a></li>
                    <li class="dropup">
                        <span class="dropdown-toggle" data-toggle="dropdown">
                            <a><svg fill="#7a7a7a" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg" class="feather feather-translate"
                                    style="margin-top: -3px;width: 15px;height: 15px;">
                                    <path
                                        d="M12.87,15.07L10.33,12.56L10.36,12.53C12.1,10.59 13.34,8.36 14.07,6H17V4H10V2H8V4H1V6H12.17C11.5,7.92 10.44,9.75 9,11.35C8.07,10.32 7.3,9.19 6.69,8H4.69C5.42,9.63 6.42,11.17 7.67,12.56L2.58,17.58L4,19L9,14L12.11,17.11L12.87,15.07M18.5,10H16.5L12,22H14L15.12,19H19.87L21,22H23L18.5,10M15.88,17L17.5,12.67L19.12,17H15.88Z">
                                    </path>
                                </svg>Language</a>
                        </span>
                        <ul class="dropdown-menu">
                            <li><a href='?lang=english'>English</a></li>
                            <li><a href='?lang=arabic'>Arabic</a></li>
                            <li><a href='?lang=dutch'>Dutch</a></li>
                            <li><a href='?lang=french'>French</a></li>
                            <li><a href='?lang=german'>German</a></li>
                            <li><a href='?lang=russian'>Russian</a></li>
                            <li><a href='?lang=spanish'>Spanish</a></li>
                            <li><a href='?lang=turkish'>Turkish</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li>
                        <span class="fluid copyright">Copyright &copy; 2020 Hai No One</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/footer.js') }}"></script>
<div class="lightbox__container"></div>
<script src="{{ asset('/apps/default/main/static/js/libs/lightGallery/src/js/lightgallery.js') }}"></script>
<script src="{{ asset('/apps/default/main/static/js/libs/lightGallery/modules/lg-zoom.js') }}"></script>
<script src="{{ asset('/apps/default/main/static/js/libs/lightGallery/modules/lg-fullscreen.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/apps/default/main/static/js/libs/lightGallery/src/css/lightgallery.css') }}">
<link rel="stylesheet" href="{{ asset('/apps/default/main/static/js/libs/lightGallery/src/css/lg-transitions.css') }}">

<script type="text/javascript">
if (is_logged()) {
    setInterval(function() {
        $.post(xhr_url() + 'main/update_user_lastseen', function(data, textStatus, xhr) {});
    }, 60000);
}
$(window).on("popstate", function(e) {
    location.reload();
});
</script>
<script src="{{ asset('js/header.js') }}"></script>
</body>
</html>

