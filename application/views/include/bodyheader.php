        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <span class="font-w600 text-dual">
                    <i class="fa fa-circle-notch text-primary"></i>
                    <span class="smini-hide">
                        <span class="font-w700 font-size-h5">ALKÜ PİTS</span>
                        <span class="font-w300 small">Pre-alpha</span>
                    </span>
                </span>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->

            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link <?= $this->uri->uri_string() == '' ? 'active' : '' ?>" href="<?= base_url() ?>">
                            <i class="nav-main-link-icon si si-grid"></i>
                            <span class="nav-main-link-name">Kontrol Paneli</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">PERSONEL İŞLEMLERİ</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link <?= $this->uri->uri_string() == 'staff/add' ? 'active' : '' ?>"" href="<?= base_url('staff/add') ?>">
                            <i class="nav-main-link-icon fa fa-plus"></i>
                            <span class="nav-main-link-name">Personel Ekle</span>
                        </a>
                        <a class="nav-main-link <?= $this->uri->uri_string() == 'staff/list' ? 'active' : '' ?>"" href="<?= base_url('staff/list') ?>">
                            <i class="nav-main-link-icon fa fa-list"></i>
                            <span class="nav-main-link-name">Personel Listele</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded" src="<?= base_url() ?>assets/images/avatars/default.png" alt="Avatar" style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1"><?= $this->session->userdata('user_name') ?> <?= $this->session->userdata('user_surname')[0] ?>.</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url() ?>assets/images/avatars/default.png" alt="">
                            </div>
                            <div class="p-2">
                                <!--
                                <h5 class="dropdown-header text-uppercase">SEÇENEKLER</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Gelen Kutusu</span>
                                    <span>
                                        <span class="badge badge-pill badge-primary">3</span>
                                        <i class="si si-envelope-open ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Profil</span>
                                    <span>
                                        <span class="badge badge-pill badge-success">1</span>
                                        <i class="si si-user ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Ayarlar</span>
                                    <i class="si si-settings"></i>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>-->
                                <h5 class="dropdown-header text-uppercase">HAREKETLER</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Hesabi Kilitle</span>
                                    <i class="si si-lock ml-1"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= base_url('users/logout') ?>">
                                    <span>Çıkış Yap</span>
                                    <i class="si si-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->