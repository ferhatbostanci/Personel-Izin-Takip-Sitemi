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

                <!-- Dynamic Table Simple -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">KAYITLI PERSONEL LİSTESİ</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
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
                                    <span class="badge badge-warning"><?= $staff['title'] ?></span>
                                </td>
                                <td class="text-center  ">
                                    <div class="custom-control custom-switch custom-control-lg mb-2">
                                        <input type="checkbox" class="custom-control-input" dataID="<?= $staff['id'] ?>" id="checkbox-<?= $staff['id'] ?>" onchange="changeActive(this);" <?= $staff['active'] ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="checkbox-<?= $staff['id'] ?>"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-lg btn-light js-tooltip-enabled" href="<?= base_url('staff/edit/') . $staff['id'] ?>">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <!--<a class="btn btn-sm btn-light js-tooltip-enabled" href="<?= base_url('staff/delete/') . $staff['id'] ?>">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>-->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>

    <script>
        function changeActive(data) {
            var status = data.checked ? 1 : 0;
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