<?php 
    encabezado();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Historial de Registros (Gráficas)</h1>
            <div class="d-sm-inline-block">
                <a href="<?= base_url(); ?>Cultivos/Monitoreo?id=<?= $_GET['id']; ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</a>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <hr>
                        Styling for the area chart can be found in the
                        <code>/js/demo/chart-area-demo.js</code> file.
                    </div>
                </div>
                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                        Styling for the bar chart can be found in the
                        <code>/js/demo/chart-bar-demo.js</code> file.
                    </div>
                </div>
            </div>
            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        Styling for the donut chart can be found in the
                        <code>/js/demo/chart-pie-demo.js</code> file.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php 
    pie();
?>