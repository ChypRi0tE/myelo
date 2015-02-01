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
    <div class="row">
      <div class="col-sm-2" id="col-left">
        <br />
      </div>
      <div class="col-sm-6" id="col-center">
  			<h3>Ajouter une team</h3>
  			<br />
  			<form id="teamForm" class="form" role="form" method="post">
  				<div class="form-group">
  					<label for="inputName" class="col-md-3 control-label">Nom</label>
  					<div class="col-md-9">
  						<input type="text" class="form-control" name="inputName" placeholder="Nom">
  					</div>
  				</div>
  			<br /><br /><br />
  				<div class="form-group">
  					<label for="inputRanking" class="col-md-3 control-label">Classement</label>
  					<div class="col-md-9">
  						<select name="inputRanking" class="form-control" placeholder="Classement">
  							<option value="0">Challenger</option>
  							<option value="1">Master</option>
  							<option value="2">Diamant 1</option>
  							<option value="3">Diamant 2</option>
  							<option value="4">Diamant 3</option>
  							<option value="5">Diamant 4</option>
  							<option value="6">Diamant 5</option>
  						</select>
  					</div>
  				</div>
  				<div class="pull-right">
  					<div class="form-group">
  						<br />
  						<button class="btn btn-primary btn-default" name="submit" >Add this team <i class="fa fa-arrow-circle-o-right"></i></button>
  					</div>
  				</div>
  			</form>
      </div>
      <div class="col-sm-3 col-sm-offset-1" id="col-right">
        <h4>Dernières teams</h4>
        <div class="col-sm-offset-2">
            <?php
            $teams = $manager->getLast(5);
            if (!empty($teams)) { 
              foreach($teams as $team) { ?>
                  <?php echo $team->getName(); ?><br />
            <?php  }} ?>
        </div>
        <br /><hr />
      </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>