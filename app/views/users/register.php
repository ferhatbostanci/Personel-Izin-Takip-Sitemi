<?php require APPROOT . '/views/inc/header.php' ?>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('<?= URLROOT ?>/images/photos/alanya.jpg');">
                <div class="hero-static bg-white-95">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <!-- Sign In Block -->
                                <div class="block block-themed block-fx-shadow mb-0">

                                    <div class="block-header bg-success">
                                        <h3 class="block-title">Kayıt Ol</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option js-tooltip-enabled" href="<?= URLROOT ?>/users/login" data-toggle="tooltip" data-placement="left" title="" data-original-title="Giriş Yap">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">

                                            <h1 class="mb-2">ALKÜ Personel İzin Takip Sistemi</h1>
                                            <p>Yeni bir hesap oluşturmak için lütfen aşağıdaki bilgileri doldurunuz.</p>

                                            <!-- Sign In Form -->
                                            <form class="js-validation-signin" action="" method="POST" onsubmit="return sendForm(this)">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt" id="name" name="name" placeholder="Adınız" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-alt" id="surname" name="surname" placeholder="Soyadınız" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="Üniversite E-Posta Adresiniz" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Parolanız" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt" id="passwordconfirm" name="passwordconfirm" placeholder="Pazrolanız Tekrar" required>
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

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            if(<?= isset($data['sweet']) ? 1 : 0 ?>){
                Swal.fire({
                    type: "<?= $data['sweet']['type'] ?>",
                    title: "<?= $data['sweet']['title'] ?>",
                    text: "<?= $data['sweet']['text'] ?>",
                });
            }
        }, false);

        function sendForm(frm){
            var email = frm.email.value;
            var pass = frm.password.value;
            var passcon = frm.passwordconfirm.value;
            return true;
            /*if(email.indexOf("@alanya.edu.tr") > 0 && email.substring(email.indexOf('@'), email.lenght) == "@alanya.edu.tr"){
                if(pass == passcon){
                    return true;
                }else{
                    Swal.fire({
                        type: 'warning',
                        title: 'Dikkat',
                        text: 'Parolalarınız eşleşmiyor!',
                    });
                    return false;
                }
            }else{
                Swal.fire({
                    type: 'warning',
                    title: 'Dikkat',
                    text: 'Lütfen üniversite e-posta adresinizi giriniz!',
                });
                return false;
            }*/
        }

    </script>

<?php require APPROOT . '/views/inc/footer.php' ?>