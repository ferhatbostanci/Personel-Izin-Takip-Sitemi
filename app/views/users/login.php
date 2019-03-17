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

                                    <div class="block-header">
                                        <h3 class="block-title">Giriş Yap</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option font-size-sm" href="#">Parolamı unuttum?</a>
                                        </div>
                                    </div>

                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">

                                            <h1 class="mb-2">ALKÜ Personel İzin Takip Sistemi</h1>
                                            <p>Hoşgeldiniz, lütfen giriş yapınız.</p>

                                            <!-- Sign In Form -->
                                            <form class="js-validation-signin" action="" method="POST" onsubmit="return sendForm(this)">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-alt form-control-lg" id="email" name="email" placeholder="Üniversite E-Posta Adresiniz" required>
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

    <script>
        function sendForm(frm) {
            var email = frm.email.value;
            if(email.indexOf("@alanya.edu.tr") > 0 && email.substring(email.indexOf('@'), email.lenght) == "@alanya.edu.tr"){
                return true;
            }else{
                Swal.fire({
                    type: 'warning',
                    title: 'Dikkat',
                    text: 'Lütfen üniversite e-posta adresinizi giriniz!',
                });
                return false;
            }
        }
    </script>

<?php require APPROOT . '/views/inc/footer.php' ?>