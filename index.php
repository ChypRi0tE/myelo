<?php include_once("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
  <div class="container" id="content">
  <?php include("inc/error.php"); ?>
    <div class="row">
      <div class="col-xs-12 col-md-7" id="col-center">
        <h1>Classement</h1>
        <table class="table table-striped">
          <thead>
          <tr>
              <th>#</th>
              <th>Team</th>
              <th>Played</th>
              <th>Win</th>
              <th>Lose</th>
              <th>Rating</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $n = 1;
          $manager = new TeamManager($bdd);
          $teams = $manager->getAllByRating();
          if (!empty($teams)) {
              foreach($teams as $team) { ?>
              <tr>
                  <td><?php echo $n; ?></td>
                  <td><?php echo $team->getName(); ?></td>
                  <td><?php echo $team->getPlayed(); ?></td>
                  <td><?php echo $team->getWins(); ?></td>
                  <td><?php echo $team->getLosses(); ?></td>
                  <td><?php echo $team->getRating(); ?></td>
              </tr>
          <?php $n++; }} ?>
          </tbody>
      </table>
      </div>
      <div class="col-xs-12 col-md-5" id="col-right">
          <br />
        <div class="well" id="whatisthis">
        	<p class="lead">What is this ?</p>
            </div>
            <div class="well" id="recent_games">
                <p class="lead">Derniers résultats</p>
                <?php
                    $n = 1;
                    $gmanager = new GameManager($bdd);
                    $games = $gmanager->getLast(15);
                    if (!empty($games)) {
                        foreach($games as $game) { ?>
                    <div class="row">
                        <div class="col-xs-3">
                        <?php echo showTime($game->getDate()); ?>
                        </div>
                        <div class="col-xs-9">
                        <?php
                            echo getResult($game, $manager->get($game->getIda())->getName(), '1');
                            echo " vs ";
                            echo getResult($game, $manager->get($game->getIdb())->getName(), '2');
                        ?>
                        </div>
                    </div>
                <?php }} ?>
            </div>
      </div>
    </div>
  </div>
<?php include_once("inc/footer.php"); ?>
</body>
</html>