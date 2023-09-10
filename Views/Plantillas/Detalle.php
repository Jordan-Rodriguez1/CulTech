<?php 
    encabezado();
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-1 text-gray-800">Detalle Plantillas</h1>
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
                    <img style="margin: 0 0 10px 0;" src="<?= base_url(); ?>Assets/img/cultivos/tomates.png" height="120px">
                    <h5 style="color: black;"><strong>Tomate</strong></h5>
                  </div>
              </div>
              <div class="my-2"></div>
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
                    <img style="margin: 0 0 10px 0;" src="<?= base_url(); ?>Assets/img/cultivos/tomates.png" height="120px">
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Editar</span>
                    </a>
                  </div>
              </div>
              <div class="my-2"></div>
              <!-- Actualizar Datos -->
              <div class="card position-relative">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Actulizar Datos</h6>
                  </div>
                  <div class="card-body">
                    <form action="">

                                        <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </a>
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