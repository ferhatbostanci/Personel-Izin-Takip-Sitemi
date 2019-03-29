<?php $this->load->view('include/header'); ?>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('<?= base_url() ?>assets/images/photos/alanya.jpg');">
                <div class="hero-static bg-white-95">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <!-- Sign In Block -->
                                <div class="block block-themed block-fx-shadow mb-0">

                                    <div class="block-header bg-success">
                                        <h3 class="block-title">Kayıt Ol</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option js-tooltip-enabled" href="<?= base_url('users/login') ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Giriş Yap">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">

                                            <h1 class="mb-2">ALKÜ Personel İzin Takip Sistemi</h1>
                                            <p>Yeni bir hesap oluşturmak için lütfen aşağıdaki bilgileri doldurunuz.</p>

                                            <!-- Register Form -->
                                            <form action="<?= base_url('users/register') ?>" method="POST">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt <?= form_error('name') ? 'is-invalid' : '' ?>" name="name" placeholder="Adınız" value="<?= set_value('name') ?>" maxlength="50" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('name') ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt <?= form_error('surname') ? 'is-invalid' : '' ?>" name="surname" placeholder="Soyadınız" value="<?= set_value('surname') ?>" maxlength="50" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('surname') ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-lg form-control-alt <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Üniversite E-Posta Adresiniz" value="<?= set_value('email') ?>" maxlength="50" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('email') ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt <?= form_error('password') ? 'is-invalid' : '' ?>" name="password" placeholder="Parolanız" value="<?= set_value('password') ?>" minlength="6" maxlength="32" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('password') ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt <?= form_error('passwordconfirm') ? 'is-invalid' : '' ?>" name="passwordconfirm" placeholder="Parolanız Tekrar" value="<?= set_value('passwordconfirm') ?>" minlength="6" maxlength="32" required>
                                                        <span class="invalid-feedback" style="display: unset;">
                                                            <?= form_error('passwordconfirm') ?>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-success">
                                                            <i class="fa fa-fw fa-plus mr-1"></i>
                                                            Kayıt Ol
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Register Form -->

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

<?php if ($this->session->flashdata('register_message')): ?>
    <script>
        Swal.fire({
            title: "<?= $this->session->flashdata('register_message')['title'] ?>",
            text: "<?= $this->session->flashdata('register_message')['text'] ?>",
            type: "<?= $this->session->flashdata('register_message')['type'] ?>",
            confirmButtonText: "Tamam",
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    </script>
<?php endif; ?>

<?php $this->load->view('include/footer'); ?>