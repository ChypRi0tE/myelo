<?php include("inc/header.php"); ?>
<link rel="stylesheet" href="css/plugins/datepicker.min.css">
<style>
  .notActive{
      color: #3276b1;
      background-color: #fff;
  }
</style>
<body>
<?php include("inc/nav.php"); ?>
<?php
$tmmanager = new TeamManager($bdd);
$gmmanager = new GameManager($bdd);
if (isset($_POST['submit'])) {
    $data['idA'] = clean($_POST['inputTeamA']);
    $data['idB'] = clean($_POST['inputTeamB']);
    $data['ratingA'] = $tmmanager->get($_POST['inputTeamA'])->getRating();
    $data['ratingB'] = $tmmanager->get($_POST['inputTeamB'])->getRating();
    $data['result'] = $_POST['inputResult'];
    $data['date'] = $_POST['inputDate'];
    $data = calculateRating($data);
    $gm = new Game($data);
    $gmmanager->add($gm);
    $tmmanager->updateGame($gm);
}
?>
<div class="container" id="content">
    <div class="row">
      <div class="col-sm-2" id="col-left">
        <br />
      </div>
      <div class="col-sm-6" id="col-center">
  			<h3>Ajouter un match</h3>
  			<br />
            <?php
            $teams = $tmmanager->getAllByName();
            if (!empty($teams)) { ?>
                <form id="gameForm" class="form" role="form" method="post">
          				<div class="form-group">
          					<label for="inputTeamA" class="col-md-2 control-label">Equipe A</label>
                      <div class="col-md-4">
                          <select name="inputTeamA" class="form-control notActive" id="selectTeamA">
                              <?php foreach($teams as $team) { ?>
                                  <option value="<?php echo $team->getId(); ?>">
                                      <?php echo $team->getName(); ?>
                                  </option>
                              <?php } ?>
                          </select>
          					  </div>
          				</div>
          			<br /><br /><br />
          				<div class="form-group">
          					<label for="inputTeamB" class="col-md-2 control-label">Equipe B</label>
                      <div class="col-md-4">
                          <select name="inputTeamB" class="form-control notActive" id="selectTeamB">
                              <?php foreach($teams as $team) { ?>
                                  <option value="<?php echo $team->getId(); ?>">
                                      <?php echo $team->getName(); ?>
                                  </option>
                              <?php } ?>
                          </select>
          					  </div>
          				</div>
          			<br /><br />
                        <div class="form-group">
                            <label for="result" class="col-sm-2 col-md-2 control-label">Vainqueur</label>
                            <div class="col-sm-6 col-md-6">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="inputResult" data-title="1" id="labelTeamA">Equipe A</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="inputResult" data-title="2" id="labelTeamB">Equipe B</a>
                                    </div>
                                    <input type="hidden" name="inputResult" id="inputResult" value="1">
                                </div>
                            </div>
                        </div>
          			<br /><br />
                        <div class="form-group" id="datepick">
                            <label for="inputTeamB" class="col-md-2 control-label">Joué le</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control notActive" name="inputDate" />
                            </div>
                        </div>
                    <br />
                    <div class="row">
                        <div class="pull-right col-md-6">
                            <div class="form-group">
                                <br />
                                <button class="btn btn-primary btn-default" name="submit" >Add this game <i class="fa fa-arrow-circle-o-right"></i></button>
                            </div>
                        </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <div class="col-sm-3 col-sm-offset-1" id="col-right">
      <h4>Derniers resultats</h4><br />
      <div >
          <?php
          $games = $gmmanager->getLast(5);
          if (!empty($games)) { 
            foreach($games as $game) { ?>
                <?php echo $tmmanager->get($game->getIda())->getName() . " vs " . $tmmanager->get($game->getIdb())->getName(); ?><br />
          <?php  }} ?>
      </div>
      <br /><hr />
    </div>
</div>
</div>
<?php include("inc/footer.php"); ?>
<script src="js/plugins/datepicker.min.js"></script>
<script src="js/plugins/form.js"></script>
</body>
</html>