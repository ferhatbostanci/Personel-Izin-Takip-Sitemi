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
                            Personel Listesi
                            <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                                Bu bölümde personelleri listeleyebilir, düzenleyebilir ve silme işlemi yapabilirsiniz.
                            </small>
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">

                <div class="alert alert-info d-flex align-items-center animated fadeIn" role="alert">
                    <div class="flex-00-auto">
                        <i class="fa fa-fw fa-info-circle"></i>
                    </div>
                    <div class="flex-fill ml-3">
                        <p class="mb-0">Personel artık üniversitede değilse <i class="alert-link">Durum</i> göstergesini pasif hale getiriniz! Güvenlik nedeniyle silme işlemi yapılmamakta.</p>
                    </div>
                </div>

                <!-- Dynamic Table Simple -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">KAYITLI PERSONEL LİSTESİ</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" onclick="window.location.reload();">
                                <i class="si si-reload"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>
                                <th>AD-SOYAD</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">ÜNVAN</th>
                                <th style="width: 100px;">DURUM</th>
                                <th style="width: 100px;">DÜZENLE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach($stafflist as $staff): $i++; ?>
                            <tr>
                                <td class="text-center font-size-sm"><?= $i ?></td>
                                <td class="font-w600 font-size-sm"><?= $staff['name'] . ' ' . $staff['surname'] ?></td>
                                <td class="d-none d-sm-table-cell">
                                    <?php if($staff['title']): ?>
                                    <span class="badge badge-pill badge-primary"><?= $staff['title'] ?></span>
                                        <?php if($staff['ten_year'] == 1): ?>
                                            <span class="badge badge-pill badge-info">10+</span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <span class="badge badge-pill badge-secondary">İşçi</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch custom-control-success custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" dataURL="<?= base_url('staff/edit/') . $staff['id'] ?>" dataID="<?= $staff['id'] ?>" id="checkbox-<?= $staff['id'] ?>" onchange="changeActive(this);" <?= $staff['active'] ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="checkbox-<?= $staff['id'] ?>"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" id="editbtn-<?= $staff['id'] ?>">
                                        <?php if($staff['active']): ?>
                                        <a class="btn btn-sm btn-dark js-tooltip-enabled" href="<?= base_url('staff/edit/') . $staff['id'] ?>">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <!--<a class="btn btn-sm btn-light js-tooltip-enabled" href="">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>-->
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table Simple -->

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
        function changeActive(data) {
            var id = data.getAttribute('dataID');
            var url = data.getAttribute('dataURL');
            var status = data.checked ? 1 : 0;

            // HTML DOM
            if(status){
                $("#editbtn-"+id).html("<a class='btn btn-sm btn-dark js-tooltip-enabled' href='" + url +"'><i class='fa fa-fw fa-pencil-alt'></i></a>");
            }else{
                $("#editbtn-"+id).html("");
            }

            // Ajax POST
            $.post("<?= base_url() ?>staff/change", {
                id: data.getAttribute('dataID'),
                status: status
            }).done(function( data ) {
                console.log(data);
            });
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