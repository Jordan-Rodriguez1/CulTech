<?php 
    encabezado();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Notificaciones</h1>
        <!-- Content Row -->

        <!-- AQUI HABRA UN SWICHT -->
        <div class="card mb-2 py-3 border-left-primary">
            <div class="card-body">
                <form action="<?= base_url(); ?>Plantillas/InactivarPlantilla?id=<?= $activas['id'];?>" method="post" class="inactpla">
                    <button class="d-sm-inline-block float-right btn btn-light" type="submit"><i class="fas fa-times fa-sm"></i></button>
                </form>
                <div class="row">
                    <div class="col-auto">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2 py-3 border-left-warning">
            <div class="card-body">
                <form action="<?= base_url(); ?>Plantillas/InactivarPlantilla?id=<?= $activas['id'];?>" method="post" class="inactpla">
                    <button class="d-sm-inline-block float-right btn btn-light" type="submit"><i class="fas fa-times fa-sm"></i></button>
                </form>
                <div class="row">
                    <div class="col-auto">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2 py-3 border-left-danger">
            <div class="card-body">
                <form action="<?= base_url(); ?>Plantillas/InactivarPlantilla?id=<?= $activas['id'];?>" method="post" class="inactpla">
                    <button class="d-sm-inline-block float-right btn btn-light" type="submit"><i class="fas fa-times fa-sm"></i></button>
                </form>
                <div class="row">
                    <div class="col-auto">
                        <div class="mr-3">
                            <div class="icon-circle bg-danger">
                                <i class="fas fa-skull-crossbones text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
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