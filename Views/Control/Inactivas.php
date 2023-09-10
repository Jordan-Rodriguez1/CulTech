<?php 
    encabezado();
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Placas Inactivas</h1>
            <div class="d-sm-inline-block">
                <a href="<?= base_url(); ?>Control/Placas" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Regresar</a>
            </div>
        </div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body text-center">
                        <a class="d-sm-inline-block float-right" href=""><span aria-hidden="true">×</span></a>
                        <a href="">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Tomates</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SKU: 102030</div>
                                </div>
                                <div class="col-auto">
                                    <img src="<?= base_url(); ?>Assets/img/ESP8266.png" height="120px">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php 
    pie();
?>