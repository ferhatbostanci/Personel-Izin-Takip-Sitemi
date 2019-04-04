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


                        <div class="row">
                            <div class="col-lg-3">
                                <p class="font-size-sm text-muted">
                                    Lütfen personel izin bilgilerini eksiksiz giriniz
                                </p>
                            </div>
                            <div class="col-lg-9">
                                <form action="<?= base_url('leave/add') ?>" method="POST"">
                                    <div class="form-group">
                                        <label for="name">Personel</label>
                                        <select class="js-select2 form-control" id="staffid" name="staffid" style="width: 100%;" data-placeholder="Personel seç..." autocomplete="off" onchange="changeStaff(this);" required>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <?php foreach($stafflist as $staff): ?>
                                                <option value="<?= $staff['id'] ?>" <?= set_value('staffid') == $staff['id'] ? 'selected' : '' ?> ><?= $staff['name'] . ' ' . $staff['surname'] ?> (<?= $staff['title'] ? $staff['title'] : 'İşçi'  ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div id="staffcount"></div>
                                        <span class="invalid-feedback" style="display: unset;">
                                            <?= form_error('staffid') ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">İzin Süresi</label>
                                        <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-date-language="tr" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                            <input type="text" class="form-control" id="startdate" name="startdate" placeholder="Başlangıç" data-week-start="1" data-autoclose="true" data-today-highlight="true" autocomplete="off" value="<?= set_value('startdate') ?>" required>
                                            <div class="input-group-prepend input-group-append">
                                                <span class="input-group-text font-w600">
                                                    <i class="fa fa-fw fa-arrow-right"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="enddate" name="enddate" placeholder="Bitiş" data-week-start="1" data-autoclose="true" data-today-highlight="true" autocomplete="off" value="<?= set_value('enddate') ?>" required>
                                            <span class="invalid-feedback" style="display: unset;">
                                                <?= form_error('startdate') ? form_error('startdate') : form_error('enddate') ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">İzin Türü</label>
                                        <select class="form-control" id="leavetype" name="leavetype" autocomplete="off" onchange="changeLeaveType(this)" required>
                                            <option value="0">Lütfen seçiniz</option>
                                            <?php foreach($leavetypes as $leavetype): ?>
                                                <option value="<?= $leavetype['id'] ?>" <?= set_value('leavetype') == $leavetype['id'] ? 'selected' : '' ?> ><?= $leavetype['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="invalid-feedback" style="display: unset;">
                                            <?= form_error('leavetype') ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" id="sumbitbtn" disabled>Kaydet</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Select2 -->
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <?php $this->load->view('include/bodyfooter'); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.7.0/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/js/plugins/jquery/jquery.slim.min.js') ?>"></script>

    <script>
        function changeStaff(data) {
            //var staffcount = document.getElementById("staffcount");
            //staffcount.innerHTML = "<span class='badge badge-info'>Kalan Yıllık İzin: " +  data.value +"</span>";
        }

        function changeLeaveType(data) {
            var sumbitbtn = document.getElementById("sumbitbtn");
            if(data.value == '0'){
                sumbitbtn.disabled = true;
            }else{
                sumbitbtn.disabled = false;
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