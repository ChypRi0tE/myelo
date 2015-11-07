<?php include("inc/header.php"); ?>
<link rel="stylesheet" href="assets/css/plugins/datepicker.min.css">
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
    $data['result'] = ($_POST['inputResult'] == 1) ? $data['idA'] : $data['idB'];
    $data['date'] = $_POST['inputDate'];
    $data = calculateRating($data);
    $gm = new Game($data);
    $gmmanager->add($gm);
    $tmmanager->updateGame($gm);
}
?>
<div class="container" id="content">
    <div class="col-sm-9 col-sm-offset-1">
        <div class="glickotile">
            <div class="glickotile-content" id="tile-add-game">
                <h3>Ajouter un match</h3><br />
                <form id="formAddGame" class="form" role="form" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="inputTeamA" class="col-md-2 control-label">Equipe A</label>
                            <div class="col-md-4">
                                <select name="inputTeamA" class="form-control notActive" id="selectTeamA"></select>
                            </div>
                            <label for="inputTeamB" class="col-md-2 control-label">Equipe B</label>
                            <div class="col-md-4">
                                <select name="inputTeamB" class="form-control notActive" id="selectTeamB"></select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><br />
                    <div class="row">
                        <div class="form-group">
                            <label for="result" class="col-sm-2 control-label">Vainqueur</label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="inputResult" data-title="1" id="labelTeamA">Equipe A</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="inputResult" data-title="2" id="labelTeamB">Equipe B</a>
                                    </div>
                                    <input type="hidden" name="inputResult" id="inputResult" value="1">
                                </div>
                            </div>
                            <div id="datepick">
                                <label for="inputDate" class="col-sm-2 control-label" style="margin-left:-10px">Joué le</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control notActive" name="inputDate" required />
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><br />
                    <div class="row">
                        <div class="pull-right col-sm-3">
                            <div class="form-group">
                                <button class="btn btn-primary btn-default" name="submit" >Add this game <i class="fa fa-arrow-circle-o-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-sm-offset-1">
        <div class="glickotile">
            <div class="glickotile-content" id="tile-add-game-last">
                <h4>Derniers ajouts</h4>
                <div class="col-sm-offset-1">
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>