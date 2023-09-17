<?php 
    encabezado();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Últimas Mediciones</h1>
          <div class="d-sm-inline-block">
              <a href="<?= base_url(); ?>Cultivos/Lista" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</a>
          </div>
      </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cultivo</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                          <div class="col-6">
                              <div class="h5 mb-0 font-weight-bold" style="color: black;"><?= $data1['nombre']; ?></div>
                          </div>
                          <div class="col-auto">
                              <img src="<?= base_url(); ?>Assets/img/cultivos/monitoreo/<?= $data1['foto']; ?>" height="120px">
                          </div>
                      </div>
                    </div>
                    <div class="card-footer text-center">
                      <a href="<?= base_url(); ?>Cultivos/Configuracion?id=<?= $_GET['id']; ?>" class="btn btn-info btn-circle btn-sm">
                          <i class="fas fa-cog"></i>
                      </a>
                      <a href="<?= base_url(); ?>Cultivos/Detalle?id=<?= $_GET['id']; ?>" class="btn btn-info btn-circle btn-sm">
                          <i class="fas fa-table"></i>
                      </a>
                      <a href="<?= base_url(); ?>Cultivos/Graficas?id=<?= $_GET['id']; ?>" class="btn btn-info btn-circle btn-sm">
                          <i class="fas fa-chart-area"></i>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Aire</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                        <!-- /.AQUÍ VA EL GRÁFICO -->
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php 
    pie();
?>