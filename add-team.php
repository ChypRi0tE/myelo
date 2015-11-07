<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<?php
		$manager = new TeamManager($bdd);
		if (isset($_POST['submit'])) {
  		$data['name'] = clean($_POST['inputName']);
  		$data['rating'] = 1300; //1500 - $_POST['inputRanking'] * 50;
  		$tm = new Team($data);
  		$manager->add($tm);
  	}
?>
<div class="container" id="content">
    <div class="col-sm-9">
        <div class="glickotile">
            <div class="glickotile-content" id="tile-add-team">
                <h3>Ajouter une team</h3><br />
                <div class="alert alert-danger col-sm-10 hidden" id="error-message">
                    <strong>Error :</strong>
                </div>
                <form id="formAddTeam" class="form" role="form" method="post">
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">Nom</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="inputName" placeholder="Nom">
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="form-group">
                            <br />
                            <button class="btn btn-primary btn-default" name="submit" >Add this team <i class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="glickotile">
            <div class="glickotile-content" id="tile-add-team-last">
                <h4>Dernières teams</h4>
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