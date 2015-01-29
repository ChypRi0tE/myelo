<?php include_once("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
  <div class="container" id="content">
      <?php if (!empty($error)) { ?>
      <div class="alert alert-danger alert-dismissable col-xs-12 col-md-6 col-md-offset-3">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $error; ?>
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-xs-12 col-md-7">
            <?php include('ladder.php'); ?>
        </div>
        <div class="col-xs-12 col-md-5">
            <?php include('recent.php'); ?>
        </div>
      </div>
  </div>
<?php include_once("inc/footer.php"); ?>
</body>
</html>