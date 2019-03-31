<?php $this->load->view('include/header'); ?>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('<?= base_url() ?>assets/images/photos/alanya.jpg');">
                <div class="hero-static bg-white-75">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <!-- Sign In Block -->
                                <div class="block block-themed block-fx-shadow mb-0">

                                    <div class="block-header">
                                        <h3 class="block-title">Giriş Yap</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option js-tooltip-enabled" href="<?= base_url('users/register') ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kayıt Ol">
                                                <i class="fa fa-user-plus"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">

                                            <h1 class="mb-2">ALKÜ Personel İzin Takip Sistemi</h1>
                                            <p>Hoşgeldiniz, lütfen giriş yapınız.</p>

                                            <!-- Sign In Form -->
                                            <form action="<?= base_url('users/login') ?>" method="POST">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-alt form-control-lg <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Üniversite E-Posta Adresiniz" value="<?= set_value('email') ?>" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('email') ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt <?= form_error('password') || $this->session->flashdata('password_error') ? 'is-invalid' : '' ?>" name="password" placeholder="Parolanız" value="<?= set_value('password') ?>" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('password') ?>
                                                            <?= $this->session->flashdata('password_error') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button class="btn btn-block btn-primary" type="submit">
                                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i>
                                                            Giriş Yap
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Sign In Form -->

                                        </div>
                                    </div>

                                </div>
                                <!-- END Sign In Block -->
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