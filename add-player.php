<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<?php
    if (isset($_POST['search-name'])) {
        $api = new RiotApi('euw');
        $tmp = $api->getSummonerByName($_POST['inputNameSearch']);
        if ($id = reset($tmp)['id']) {
            $sum = new Summoner($id);
        } else {
          $error = "Summoner ".$_POST['inputNameSearch']." not found.";
          $errorType = "search";
        }
    }
    if (isset($_POST['search-id'])) {
        $api = new RiotApi('euw');
        $tmp = $api->getSummoner($_POST['inputSearch']);
        if ($id = $tmp['id']) {
            $sum = new Summoner($id);
        } else {
          $error = "Summoner ".$_POST['inputSearch']." not found.";
          $errorType = "search";
        }
    }
    if (isset($_POST['add-player'])) {
        $data = [];
        $data['idTeam'] = $_POST['inputTeam'];
        $data['idSummoner'] = $_POST['inputId'];
        $data['name'] = $_POST['inputName'];
        $data['league'] = $_POST['inputLeague'];
        $data['division'] = $_POST['inputDivision'];
        $data['avatar'] = $_POST['inputAvatar'];

        $PlayerManager = new PlayerManager($bdd);
        $player = new Player($data);
        $PlayerManager->add($player);
    }
?>
<div class="container" id="content">
    <div class="col-md-9">
        <div class="glickotile">
            <div class="glickotile-content glickotile-well">
                <h3>Ajouter un joueur</h3><br />
                <div class="alert alert-danger col-sm-10 hidden" id="error-message">
                    <strong>Error :</strong>
                </div>
                <div class="row">
                    <form id="formPlayerSearch" action="" method="post" class="form-inline">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4">
                                <label for="inputSearch">Recherche par nom</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control notActive" id="inputNameSearch" name="inputNameSearch"
                                        <?php if (isset($_POST['search-name'])) {echo "value=\"".$_POST['inputNameSearch']."\"";} ?>
                                        />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" name="search-name"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div> <br />
                <div class="row">
                    <form id="formIdSearch" action="" method="post" class="form-inline">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4">
                                <label for="inputSearch">Recherche par id</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control notActive" id="inputSearch" name="inputSearch"
                                        <?php if (isset($_POST['search-id'])) {echo "value=\"".$_POST['inputSearch']."\"";} ?>
                                        />
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default" name="search-id"><i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div> <br />
                </div>
            </div>
        </div>
        <div class="glickotile">
            <div class="glickotile-content">
                <h3>Summoner informations</h3><br />
                <form id="formAddPlayer" class="form" role="form" method="post" action="">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputName" class="col-sm-3">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control notActive" name="inputName" type="text" placeholder="Summoner name" required
                                    <?php if ($sum) {echo "value=\"".$sum->getName()."\"";} ?>
                                    />
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputId" class="col-sm-3">Id</label>
                            <div class="col-sm-9">
                                <input class="form-control notActive" name="inputId" type="text" placeholder="Summoner id" required
                                    <?php if ($sum) {echo "value=\"".$sum->getId()."\"";} ?>
                                    />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputLeague" class="col-sm-3 control-label">League</label>
                            <div class="col-sm-9">
                                <input class="form-control notActive" name="inputLeague" type="text" placeholder="League" required
                                    <?php if ($sum) {echo "value=\"".$sum->getLeague()."\"";} ?>
                                    />
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputDivision" class="col-sm-3 control-label">Division</label>
                            <div class="col-sm-9">
                                <input class="form-control notActive" name="inputDivision" type="text" placeholder="Division" required
                                    <?php if ($sum) {echo "value=\"".$sum->getDivision()."\"";} ?>
                                    />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputAvatar" class="col-sm-3 control-label">Avatar</label>
                            <div class="col-sm-9">
                                <input class="form-control notActive" name="inputAvatar" type="text" placeholder="Avatar" required
                                    <?php if ($sum) {echo "value=\"".$sum->getAvatar()."\"";} ?>
                                    />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputTeam" class="col-sm-3 control-label">Equipe</label>
                            <div class="col-sm-9">
                                <select name="inputTeam" class="form-control notActive" id="inputTeam"></select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <button class="btn btn-primary btn-default" name="add-player" >Add player <i class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-3 glickotile">
        <div class="glickotile-content glickotile-well" id="tile-add-player-last">
            <h4>Derniers ajouts</h4>
            <div class="col-sm-offset-1">

            </div>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>