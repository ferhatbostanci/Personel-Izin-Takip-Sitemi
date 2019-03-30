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
                        <!-- DataTables init on table by adding .js-dataTable-simple class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>
                                <th>AD-SOYAD</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">ÜNVAN</th>
                                <th style="width: 100px;">İŞLEMLER</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach($stafflist as $staff){ $i++; ?>
                            <tr>
                                <td class="text-center font-size-sm"><?= $i ?></td>
                                <td class="font-w600 font-size-sm"><?= $staff['name'] ?></td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning"><?= $staff['title'] ?></span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-light js-tooltip-enabled" href="<?= base_url('staff/edit/') . $staff['id'] ?>">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
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

<?php $this->load->view('include/footer'); ?>