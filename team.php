<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<div class="container" id="content">
    <div class="row">
      <div class="col-sm-2" id="col-left">
          <h4>Liste des équipes</h4>
          <div class="" id="list-team">
              <ul class="nav nav-tabs" role="tablist">
                  <?php
                  $manager = new TeamManager($bdd);
                  $teams = $manager->getAllByName();
                  if (!empty($teams)) {
                  foreach($teams as $team) { ?>
                  <li class="list-group-item"><a href="#<?php echo $team->getId(); ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $team->getName(); ?></a></li>
                  <?php  }} ?>
              </ul>
          </div>
      </div>
      <div class="col-sm-10" id="col-center">
          <div class="tab-content">
              <?php if (!empty($teams)) {
              foreach($teams as $team) { ?>
              <div role="tabpanel" class="tab-pane" id="<?php echo $team->getId(); ?>"><?php echo $team->getName(); ?></div>
              <?php  }} ?>
          </div>
      </div>
<?php if (isset($_GET['team'])) { ?>

<?php } ?>
    </div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>