    <script src="<?= base_url('assets/js/oneui.core.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/oneui.app.min.js') ?>"></script>

    <!-- Page JS Plugins -->
    <?php if(isset($jsload)){ foreach($jsload as $js){ ?>
<script src="<?= base_url() ?>assets/js/<?= $js ?>"></script>
    <?php }} ?>

</body>
</html>