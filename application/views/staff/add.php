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
                            Personel Ekle
                            <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                                Bu bölümde yeni personel ekleyebilirsiniz.
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
                                    <form class="mb-5" action="<?= base_url('staff/add') ?>" method="POST"">
                                        <div class="form-group">
                                            <label for="name">Ad</label>
                                            <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" name="name" placeholder="Personelin Adı" value="<?= set_value('name') ?>" maxlength="50" required>
                                            <span class="invalid-feedback" style="display: unset;">
                                                <?= form_error('name') ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="surname">Soyad</label>
                                            <input type="text" class="form-control <?= form_error('surname') ? 'is-invalid' : '' ?>" name="surname" placeholder="Personelin Soyadı" value="<?= set_value('surname') ?>" maxlength="50" required>
                                            <span class="invalid-feedback" style="display: unset;">
                                                <?= form_error('surname') ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Ünvan</label>
                                            <span class="badge badge-info">İşçi ise boş bırakın</span>
                                            <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" name="title" placeholder="Personelin Ünvanı" onkeyup="changeTitle(this)" value="<?= set_value('title') ?>" maxlength="50">
                                            <span class="invalid-feedback" style="display: unset;">
                                                <?= form_error('title') ?>
                                            </span>
                                        </div>
                                        <div class="form-group" id="tenyear-div" hidden>
                                            <label>Görev süresi 10 yılı geçmiş mi?</label>
                                            <div class="custom-control custom-checkbox custom-control-light custom-control-lg mb-1">
                                                <input type="checkbox" class="custom-control-input" id="tenyear" name="tenyear" <?= set_value('tenyear') ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="tenyear">Evet</label>
                                            </div>
                                            <span class="invalid-feedback" style="display: unset;">
                                                <?= form_error('surname') ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Kaydet</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.7.0/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/js/plugins/jquery/jquery.slim.min.js') ?>"></script>

    <script>
        function changeTitle(data) {
            var tenyear = document.getElementById("tenyear-div");
            console.log(data.value);
            if(data.value == ''){
                tenyear.hidden = true;
            }else{
                tenyear.hidden = false;
            }
        }
    </script>

    <?php if($this->session->flashdata('add_message')): ?>
    <script>
        Swal.fire({
            title: "<?= $this->session->flashdata('add_message')['title'] ?>",
            text: "<?= $this->session->flashdata('add_message')['text'] ?>",
            type: "<?= $this->session->flashdata('add_message')['type'] ?>",
            confirmButtonText: "Tamam",
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    </script>
    <?php endif; ?>

<?php $this->load->view('include/footer'); ?>