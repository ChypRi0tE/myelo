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
    print_r($_POST);
}
?>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Ajouter des joueurs</h2>
            <br />
            <?php
            $teams = $tmmanager->getAll();
            if (!empty($teams)) { ?>
                <form id="playerForm" class="form" role="form" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="inputTeam" class="col-md-3 control-label">Equipe</label>
                            <div class="col-md-4">
                                <select name="inputTeam" class="form-control notActive" id="selectTeamA">
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
                        <div class="form-group" id="formFields">
                            <label for="inputPlayers" class="col-md-3 control-label">Joueurs</label>
                            <div class="entry col-md-4">
                                <div class="input-group">
                                    <input class="form-control notActive" name="inputPlayers[]" type="text" placeholder="Summoner name" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-add" type="button">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
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
</div>
</div>
<?php include("inc/footer.php"); ?>
<script src="js/plugins/datepicker.min.js"></script>
<script src="js/plugins/form.js"></script>
</body>
</html>