<?php require APPROOT . '/views/inc/header.php' ?>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="hero">
                <div class="hero-inner text-center">
                    <div class="content content-full bg-white overflow-hidden">
                        <div class="py-4">
                            <!-- Error Header -->
                            <h1 class="display-1 text-city invisible" data-toggle="appear" data-class="animated flipInX">404</h1>
                            <h2 class="h3 font-w300 text-muted invisible mb-5" data-toggle="appear" data-class="animated fadeInUp">Maalesef aradığınız sayfa bulunamadı.</h2>
                            <!-- END Error Header -->
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted">
                        <!-- Error Footer -->
                        <p class="mb-1">
                            Bize bunu bildirmek ister misiniz?
                        </p>
                        <a class="link-fx" href="javascript:void(0)">Rapor et</a> veya <a class="link-fx" href="javascript: history.go(-1)">Geri dön</a>
                        <!-- END Error Footer -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

<?php require APPROOT . '/views/inc/footer.php' ?>