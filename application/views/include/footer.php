    <!--
    OneUI JS Core

    Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
    to handle those dependencies through webpack. Please check out /_es6/main/bootstrap.js for more info.

    If you like, you could also include them separately directly from the /js/core folder in the following
    order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

    /js/core/jquery.min.js
    /js/core/bootstrap.bundle.min.js
    /js/core/simplebar.min.js
    /js/core/jquery-scrollLock.min.js
    /js/core/jquery.appear.min.js
    /js/core/js.cookie.min.js
    -->
    <script src="<?= base_url('assets/js/oneui.core.min.js') ?>"></script>

    <!--
    OneUI JS
    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at /_es6/main/app.js
    -->
    <script src="<?= base_url('assets/js/oneui.app.min.js') ?>"></script>

</body>
</html>