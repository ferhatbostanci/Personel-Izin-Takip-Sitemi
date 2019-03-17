    <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out <?= URLROOT ?>/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the <?= URLROOT ?>/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            <?= URLROOT ?>/js/core/jquery.min.js
            <?= URLROOT ?>/js/core/bootstrap.bundle.min.js
            <?= URLROOT ?>/js/core/simplebar.min.js
            <?= URLROOT ?>/js/core/jquery-scrollLock.min.js
            <?= URLROOT ?>/js/core/jquery.appear.min.js
            <?= URLROOT ?>/js/core/js.cookie.min.js
        -->
    <script src="<?= URLROOT ?>/js/oneui.core.min.js"></script>

    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at <?= URLROOT ?>/_es6/main/app.js
        -->
    <script src="<?= URLROOT ?>/js/oneui.app.min.js"></script>

    <!-- Page JS Plugins -->
    <?php
    if(isset($data['js'])){
        foreach($data['js'] as $jsloc){
    ?><script src="<?= URLROOT . $jsloc ?>"></script>
    <?php
        }
    }
    ?>

</body>
</html>