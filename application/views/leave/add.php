<?php $this->load->view('include/header'); ?>

    <!-- Page Container -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">

        <?php $this->load->view('include/bodyheader'); ?>

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill h3 my-2">
                            İzni Ekle
                            <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                                Bu bölümde personellere izin ekleyebilirsiniz.
                            </small>
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <form action="<?= base_url('leave/add') ?>" method="POST">

                            <h2 class="content-heading border-bottom mb-4 pb-2">Personel Seçimi</h2>

                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-size-sm text-muted">
                                        Lütfen ilgili personeli listeden seçiniz
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="form-group">
                                        <select class="js-select2 form-control" name="staffid" style="width: 100%;" data-placeholder="Personel seç..." autocomplete="off" required>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <?php foreach($stafflist as $staff): ?>
                                            <option value="<?= $staff['id'] ?>"><?= $staff['name'] . ' ' . $staff['surname'] ?> (<?= $staff['title'] ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading border-bottom mb-4 pb-2">İzin Süresi</h2>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-size-sm text-muted">
                                        İzin başlangıç ve bitiş tarihlerini seçiniz
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-6">
                                    <div class="form-group">
                                        <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-date-language="tr" data-week-start="1" data-autoclose="true" data-today-highlight="true">

                                            <input type="text" class="form-control" name="startdate" placeholder="Başlangıç" data-week-start="1" data-autoclose="true" data-today-highlight="true" autocomplete="off" required>

                                            <div class="input-group-prepend input-group-append">
                                                <span class="input-group-text font-w600">
                                                    <i class="fa fa-fw fa-arrow-right"></i>
                                                </span>
                                            </div>

                                            <input type="text" class="form-control" name="enddate" placeholder="Bitiş" data-week-start="1" data-autoclose="true" data-today-highlight="true" autocomplete="off" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading border-bottom mb-4 pb-2">İzin Türü</h2>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-size-sm text-muted">
                                        Personelin ne tür izin aldığını seçiniz
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="form-group">
                                        <select class="form-control" name="leavetype" autocomplete="off" required>
                                            <option value="0">Lütfen seçiniz</option>
                                            <?php foreach($leavetypes as $leavetype): ?>
                                                <option value="<?= $leavetype['id'] ?>"><?= $leavetype['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mb-4"></h2>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8 col-xl-5">
                                    <button type="submit" class="btn btn-success">Gönder</button>
                                </div>
                            </div>

                            <div class="form-group">

                            </div>

                        </form>
                    </div>
                </div>
                <!-- END Select2 -->
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <?php $this->load->view('include/bodyfooter'); ?>

    </div>


<?php $this->load->view('include/footer'); ?>