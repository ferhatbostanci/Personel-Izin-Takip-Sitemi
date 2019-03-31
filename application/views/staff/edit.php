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
                            Personel Düzenle
                            <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                                Bu bölümde personel bilgilerini güncelleyebilirsiniz.
                            </small>
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="row">
                            <div class="col-lg-3">
                                <p class="font-size-sm text-muted">
                                    Lütfen personel bilgilerini eksiksiz giriniz
                                </p>
                            </div>
                            <div class="col-lg-9">
                                <form class="mb-5" action="<?= base_url('staff/edit') ?>" method="POST"">
                                <input type="text" name="id"  value="<?= isset($staff->id) ? $staff->id : set_value('id') ?>" hidden>
                                    <div class="form-group">
                                        <label for="name">Ad</label>
                                        <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" name="name" placeholder="Personelin Adı" value="<?= isset($staff->name) ? $staff->name : set_value('name') ?>" maxlength="50" required>
                                        <span class="invalid-feedback" style="display: unset;">
                                            <?= form_error('name') ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Soyad</label>
                                        <input type="text" class="form-control <?= form_error('surname') ? 'is-invalid' : '' ?>" name="surname" placeholder="Personelin Soyadı" value="<?= isset($staff->surname) ? $staff->surname : set_value('surname') ?>" maxlength="50" required>
                                        <span class="invalid-feedback" style="display: unset;">
                                            <?= form_error('surname') ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Ünvanı</label>
                                        <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" name="title" placeholder="Personelin Ünvanı" value="<?= isset($staff->title) ? $staff->title : set_value('title') ?>" maxlength="50" >
                                        <span class="invalid-feedback" style="display: unset;">
                                            <?= form_error('title') ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success mr-1 mb-3">
                                            <i class="fa fa-fw fa-thumbs-up mr-1"></i>
                                            Güncelle
                                        </button>
                                        <button type="button" class="btn btn-secondary mr-1 mb-3" onclick="window.history.back();">
                                            <i class="fa fa-fw fa-arrow-left mr-1"></i>
                                            Geri Git
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <?php $this->load->view('include/bodyfooter'); ?>

    </div>
    <!-- END Page Container -->

<?php $this->load->view('include/footer'); ?>