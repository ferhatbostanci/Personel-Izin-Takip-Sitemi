    <script src="<?= base_url('assets/js/oneui.core.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/oneui.app.min.js') ?>"></script>

    <!-- Page JS Plugins -->
    <?php if(isset($jsload)){ foreach($jsload as $js){ ?>
<script src="<?= base_url() ?>assets/js/<?= $js ?>"></script>
    <?php }} ?>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
    <script>jQuery(function(){ One.helpers(['datepicker', 'select2']); });</script>

</body>
</html>