<?php 
    encabezado();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-2 text-gray-800">Historial de Registros (Tablas)</h1>
          <div class="d-sm-inline-block">
              <a href="<?= base_url(); ?>Cultivos/Monitoreo?id=<?= $_GET['id']; ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</a>
          </div>
      </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registros Ambientales</h6>
            </div>
            <div class="card-body">
                <p><strong>Abreviaciones: </strong>Temp. = Temperatura. | Hum. = Humedad.</p>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Temp. Ambiente</th>
                                <th>Hum. Ambiente</th>
                                <th>Temp. Suelo</th>
                                <th>Hum. Suelo</th>
                                <th>Altura</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XX °C</td>
                                <td>XX %</td>
                                <td>XX °C</td>
                                <td>XX %</td>
                                <td>XX CM</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Historial de Acciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Table2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php 
    pie();
?>