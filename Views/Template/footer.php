            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Jordalis Solutions V 1.0.0</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Quires cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?= base_url(); ?>Usuarios/salir">Salir</a>
                </div>
            </div>
        </div>
    </div>
</body>

<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Usuarios/cambiar" method="post" id="cambiarContra">
                    <div id="errorPass"></div>
                    <div class="form-group">
                        <label for="actual">Contraseña Actual</label>
                        <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña Actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva">Contraseña Nueva</label>
                        <input id="nueva" class="form-control" type="password" name="nueva" minlength="8" placeholder="Contraseña Nueva" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar">Confirmar Contraseña Nueva</label>
                        <input id="confirmar" class="form-control" type="password" name="confirmar" minlength="8" placeholder="Confirmar Contraseña Nueva" required>
                    </div>
                    <button class="btn btn-success" type="submit" id="cambiar">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="cambiarPic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Cambiar Perfil</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Usuarios/cambiarpic" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="archivo">
                      <label class="custom-file-label" for="customFile"></label>
                      <label><br><strong>Nota:</strong> Se recomienda poner una imagen cuadrada para que se pueda apreciar. Solo se admiten en formato PNG, JPG O JPEG con un tamaño máximo de 20 MB</label>
                    </div>
                    </div>
                    <button class="btn btn-success" type="submit" id="subirarchivo">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<div id="cambiarPassA" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Alumnos/cambiarpic" method="post" id="cambiarContra">
                    <div id="errorPass"></div>
                    <div class="form-group">
                        <label for="actual">Contraseña Actual</label>
                        <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña Actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva">Contraseña Nueva</label>
                        <input id="nueva" class="form-control" type="password" name="nueva" minlength="8" placeholder="Contraseña Nueva" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar">Confirmar Contraseña Nueva</label>
                        <input id="confirmar" class="form-control" type="password" name="confirmar" minlength="8" placeholder="Confirmar Contraseña Nueva" required>
                    </div>
                    <button class="btn btn-success" type="submit" id="cambiar">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="cambiarPicA" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Cambiar Perfil</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Alumnos/cambiarpic" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="archivo">
                      <label class="custom-file-label" for="customFile"></label>
                      <label><br><strong>Nota:</strong> Se recomienda poner una imagen cuadrada para que se pueda apreciar. Solo se admiten en formato PNG, JPG O JPEG con un tamaño máximo de 20 MB</label>
                    </div>
                    </div>
                    <button class="btn btn-success" type="submit" id="subirarchivo">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>Assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>Assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>Assets/js/sb-admin-2.min.js"></script>
<!-- JavaScript files-->
<script src="<?= base_url(); ?>Assets/js/Funciones.js"></script>
<script src="<?= base_url(); ?>Assets/js/chartjs.min.js"></script>
<script src="<?= base_url(); ?>Assets/js/sweetalert2@9.js"></script>
<script src="<?= base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>Assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#Table').DataTable({
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			}
		});
    });
    $(document).ready(function() {
        $('#Table2').DataTable({
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			}
		});
    });
    $(document).ready(function() {
        $('#Table3').DataTable({
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			}
		});
    });
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>