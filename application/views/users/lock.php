<?php $this->load->view('include/header'); ?>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('<?= base_url() ?>assets/images/photos/alanya.jpg');">
                <div class="hero-static bg-white-75">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Unlock Block -->
                                <div class="block block-themed block-fx-shadow mb-0">

                                    <div class="block-header bg-danger">
                                        <h3 class="block-title">Hesap KİLİTLENDİ</h3>
                                    </div>

                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5 text-center">

                                            <img class="img-avatar img-avatar96" src="<?= base_url('assets/images/avatars/default.png') ?>" alt="">
                                            <p class="font-w600 my-2">
                                                <?= $this->session->userdata('user_name') . ' ' . $this->session->userdata('user_surname') ?>
                                            </p>

                                            <form class="js-validation-lock" action="<?= base_url('users/lock') ?>" method="POST">
                                                <div class="form-group py-3 text-left">
                                                    <input type="password" class="form-control form-control-lg form-control-alt <?= $this->session->flashdata('password_error') ? 'is-invalid' : '' ?>" name="password" placeholder="Parolanız" required>
                                                    <span class="invalid-feedback" style="display: unset;">
                                                        <?= $this->session->flashdata('password_error') ?>
                                                    </span>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-light">
                                                            <i class="fa fa-fw fa-lock-open mr-1"></i>
                                                            Kilidi aç
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- END Unlock Block -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.7.0/dist/sweetalert2.all.min.js"></script>

<?php if ($this->session->flashdata('activation_message')): ?>
    <script>
        Swal.fire({
            title: "<?= $this->session->flashdata('activation_message')['title'] ?>",
            text: "<?= $this->session->flashdata('activation_message')['text'] ?>",
            type: "<?= $this->session->flashdata('activation_message')['type'] ?>",
            confirmButtonText: "Tamam",
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    </script>
<?php endif; ?>

<?php $this->load->view('include/footer'); ?>