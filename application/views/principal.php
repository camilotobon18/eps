<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("incluidos/head.php");?>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <!--Aqui va el nav-->
      <?php include("incluidos/nav.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <!--Aqui va el menu -->
        <?php include("incluidos/menu.php");?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
                
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row income-expense-summary-chart-text">
                      <div class="col-xl-4">
                        <h5>Total Medicos y Pacientes</h5>
                        <p class="small text-muted">Dar click en cualquiera de las dos opciones para ir a cada uno de los modulos.</p>
                      </div>
                      <div class=" col-md-3 col-xl-2">
                        <a href="medico">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> Total Medicos </p>
                        <h3><?php echo $totalmedicos; ?></h3>
                      </div>
                      <div class="col-md-3 col-xl-2">
                        <a href="paciente">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> Total Pacientes </p>
                        <h3><?php echo $totalpacientes; ?></h3>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
           
                    <!-- Aqui van los graficos -->
                    <!-- <?php //include("incluidos/graficos.php");?>-->
                    <!--Aqui va la tabla -->
                    <!--<?php //include("incluidos/table.php"); ?>-->
                    
                    <!--Aqui va el paginador -->
                </div>
          </div>
            
                

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!--Aqui va el footer -->
          <?php include("incluidos/footer.php");?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url();?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>/assets/js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url();?>/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>