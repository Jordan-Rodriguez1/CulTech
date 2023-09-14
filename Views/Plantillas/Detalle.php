<?php 
    encabezado();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detalle Plantillas</h1>
          <div class="d-sm-inline-block">
              <a href="<?= base_url(); ?>Plantillas/Lista" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</a>
          </div>
      </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-4">
                <!-- Información del perfil -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Vista Previa Plantilla</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="row no-gutters align-items-center">
                          <div class="col-6">
                              <div class="h5 mb-0 font-weight-bold" style="color: black;"><?= $data1['nombre']; ?></div>
                          </div>
                          <div class="col-auto">
                              <img src="<?= base_url(); ?>Assets/img/cultivos/<?= $data1['foto']; ?>" height="120px">
                          </div>
                      </div>
                    </div>
                </div>
                <div class="my-2"></div>
                <!-- Alertas -->
                <?php if (isset($_GET['msg'])) {
                    echo "<div class='d-sm-inline-block'>";
                    $alert = $_GET['msg'];
                    if ($alert == "registrado") { ?>
                        <div class="alert alert-success" role="alert">
    	                      <h5 class="section-title">REALIZADO</h5>
    	                      <div class="section-intro">Se regitró la plantilla con éxito.</div>
                        </div>
                    <?php } elseif ($alert == "inactivo") { ?>
                        <div class="alert alert-success" role="alert">
    	                      <h5 class="section-title">REALIZADO</h5>
    	                      <div class="section-intro">Se inactivó la plantilla con éxito.</div>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
    	                      <h5 class="section-title">ERROR</h5>
    	                      <div class="section-intro">Hubo un error, intente de nuevo.</div>
                        </div>
                    <?php }
                    echo "</div>";
                } ?>
                <!-- Alertas -->
                <div class="alert alert-warning" role="alert">
    	              <h5 class="section-title">ATENCIÓN</h5>
    	              <div class="section-intro">Las contraseñas no son iguales.</div>
                </div>
                <div class="alert alert-warning" role="alert">
    	              <h5 class="section-title">ATENCIÓN</h5>
    	              <div class="section-intro">La contraseña actual es erronea.</div>
                </div>
                <div class="alert alert-success" role="alert">
    	              <h5 class="section-title">REALIZADO</h5>
    	              <div class="section-intro">Se actualizó la información correctamente. Cierra sesión e ingresa de nuevo para ver los cambios reflejados.</div>
                </div>
                <div class="alert alert-danger" role="alert">
    	              <h5 class="section-title">ERROR</h5>
    	              <div class="section-intro">No se pudo actualizar la información correctamente.</div>
                </div>
            </div>
            <!-- Actualizar Foto -->
            <div class="col-lg-8">
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Actulizar Imagen</h6>
                    </div>
                    <div class="card-body text-center">
                      <img style="margin: 0 0 10px 0;" src="<?= base_url(); ?>Assets/img/cultivos/<?= $data1['foto']; ?>" height="120px">
                      <div class="my-2"></div>
                      <form id="formulario2" method="post" action="<?php echo base_url(); ?>Plantillas/ImagenPlantilla" autocomplete="off" enctype="multipart/form-data">
                          <div class="form-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="archivo" name="archivo">
                              <label class="custom-file-label" for="archivo">Selecciona el archivos</label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                  <i class="fas fa-pen"></i>
                              </span>
                              <span class="text">Editar</span>
                          </button>
                      </form>
                    </div>
                </div>
                <div class="my-2"></div>
                <!-- Actualizar Datos -->
                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Actulizar Datos</h6>
                    </div>
                    <div class="card-body">
                      <form id="formulario1" method="post" action="<?php echo base_url(); ?>Plantillas/Registroplantilla" autocomplete="off" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="nombre">Nombre de la Plantilla</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data1['tem_max']; ?>">
                          </div>
                          <div class="row">
                              <div class="form-group col-6">
                                <label for="tem_max">Temperatura Máxima (ºC)</label>
                                <input type="tem_max" step="0.01" class="form-control" id="tem_max" name="tem_max" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="tem_min">Temperatura Mínima (ºC)</label>
                                <input type="number" step="0.01" class="form-control" id="tem_min" name="tem_min" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="humedad_max">Humedad Máxima (%)</label>
                                <input type="number" step="0.01" class="form-control" id="humedad_max" name="humedad_max" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="humedad_min">Humedad Mínima (%)</label>
                                <input type="number" step="0.01" class="form-control" id="humedad_min" name="humedad_min" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="stem_max">Temp. Máxima Suelo (ºC)</label>
                                <input type="number" step="0.01" class="form-control" id="stem_max" name="stem_max" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="stem_min">Temp. Mínima Suelo (ºC)</label>
                                <input type="number" step="0.01" class="form-control" id="stem_min" name="stem_min" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="shumedad_max">Hum. Máxima Suelo (%)</label>
                                <input type="number" step="0.01" class="form-control" id="shumedad_max" name="shumedad_max" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="shumedad_min">Hum. Mínima Suelo (%)</label>
                                <input type="number" step="0.01" class="form-control" id="shumedad_min" name="shumedad_min" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="altura">Altura de Transplante (cm)</label>
                                <input type="number" step="0.01" class="form-control" id="altura" name="altura" value="<?= $data1['tem_max']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="dias">Días de Transplante</label>
                                <input type="number" class="form-control" id="dias" name="dias" value="<?= $data1['tem_max']; ?>">
                              </div>
                          </div>
                          <button type="submit" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                  <i class="fas fa-check"></i>
                              </span>
                              <span class="text">Guardar</span>
                          </button>
                      </form>
                    </div>
                </div>
                <div class="my-2"></div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php 
    pie();
?>