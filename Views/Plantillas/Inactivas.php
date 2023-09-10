<?php 
    encabezado();
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Plantillas Inactivas</h1>
            <div class="d-sm-inline-block">
                <a href="<?= base_url(); ?>Plantillas/Lista" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Regresar</a>
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
                                </div>
                                <div class="col-auto">
                                    <img src="<?= base_url(); ?>Assets/img/cultivos/tomates.png" height="120px">
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