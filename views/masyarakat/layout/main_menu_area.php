<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Bagian menu -->
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li><a href="<?= base_url('petugas') ?>"><i class="notika-icon notika-house"></i> Dashboard</a>
                    </li>
                    <li><a data-toggle="tab" href="#verifikasi"><i class="notika-icon notika-edit"></i> Verifikasi dan Validasi</a>
                    </li>
                    <li><a data-toggle="tab" href="#tanggapan"><i class="notika-icon notika-edit"></i> Tanggapan</a>
                    </li>
                    <li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
                </ul>

                <!-- Bagian tab content -->
                <div class="tab-content custom-menu-content">
                    <div id="verifikasi" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="#">Verifikasi Laporan</a>
                            </li>
                        </ul>
                    </div>
                    <div id="tanggapan" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="flot-charts.html">Form Tanggapan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>