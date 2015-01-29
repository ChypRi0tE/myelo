<?php include("inc/header.php"); ?>
<link rel="stylesheet" href="css/datepicker.css">
<style>
    .notActive{
        color: #3276b1;
        background-color: #fff;
    }</style>
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
}?>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Ajouter un match</h2>
            <br />
            <?php
            $teams = $tmmanager->getAll();
            if (!empty($teams)) { ?>
                <form id="gameForm" class="form" role="form" method="post">
                    <div class="row">
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
                    </div>
                    <br />
                    <div class="row">
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
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group">
                            <label for="result" class="col-sm-2 col-md-2 control-label">Vainqueur</label>
                            <div class="col-sm-8 col-md-8">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="inputResult" data-title="1" id="labelTeamA">Equipe A</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="inputResult" data-title="2" id="labelTeamB">Equipe B</a>
                                    </div>
                                    <input type="hidden" name="inputResult" id="inputResult" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group" id="datepick">
                            <label for="inputTeamB" class="col-md-2 control-label">Joué le</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control notActive" name="inputDate" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="pull-right col-md-6">
                            <div class="form-group">
                                <br />
                                <button class="btn btn-primary btn-default" name="submit" >
                                    <i class="icon-hand-right">
                                    </i> Add this game</button>
                            </div>
                        </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<?php include("inc/footer.php"); ?>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/form.js"></script>
</body>
</html>