<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<?php if (isset($_POST['submit'])) {

		$data['name'] = clean($_POST['inputName']);
		$data['rating'] = 1300; //1500 - $_POST['inputRanking'] * 50;
		$tm = new Team($data);

		$manager = new TeamManager($bdd);
		$manager->add($tm);
	}
?>
<div class="container" id="content">
    <div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Ajouter une team</h2>
			<br />
			<form id="teamForm" class="form" role="form" method="post">
			<div class="row">
				<div class="form-group">
					<label for="inputName" class="col-md-3 control-label">Nom</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="inputName" placeholder="Nom">
					</div>
				</div>
			</div>
			<br />
			<div class="row">
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
				</div>
				<div class="pull-right">
					<div class="form-group">
						<br />
						<button class="btn btn-primary btn-default" name="submit" ><i class="icon-hand-right"></i> Add this team</button>
					</div>
				</div>
			</form>
		</div>
  	</div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>