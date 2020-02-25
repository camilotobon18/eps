<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("incluidos/head.php");?>
    <?php 
      foreach($crud["css_files"] as $file){ ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php } ?>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("incluidos/nav.php");?>
      <div class="container-fluid page-body-wrapper">
        <?php include("incluidos/menu.php");?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
                <?php include("incluidos/heading.php");?>
                <?php
                  echo ($crud["output"]);
                ?>
            </div>
          </div>
          <?php include("incluidos/footer.php");?>
        </div>
      </div>
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
    <?php foreach($crud["js_files"] as $file){ ?>
        <script src="<?php echo $file; ?>"></script>
    <?php } ?>
  </body>
</html>