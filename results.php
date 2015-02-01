<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<div class="container" id="content">
    <div class="row">
      <div class="col-sm-2" id="col-left">
        <br />
        <form action="#" method="get">
          <div class="input-group">
            <input class="form-control" id="system-search" name="q" placeholder="Recherche" required>
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <br /><hr />
        <?php include("inc/teamspeak.php"); ?>
        <br /><hr />
      </div>
      <div class="col-sm-10" id="col-center">
          <table class="table table-list-search">
              <thead>
              <tr>
                  <th>Date</th>
                  <th>Vainqueur</th>
                  <th>Elo</th>
                  <th>Progression</th>
                  <th>Perdant</th>
                  <th>Elo</th>
                  <th>Progression</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $gmanager = new GameManager($bdd);
              $tmanager = new TeamManager($bdd);
              $games = $gmanager->getAll();
              if (!empty($games)) {
              foreach($games as $game) { ?>
              <tr>
                  <td><?php echo showTime($game->getDate()); ?></td>
             <?php if ($game->getResult() == 1) {
                  echo "<td>" . $tmanager->get($game->getIda())->getName() . "</td>";
                  echo "<td>" . $game->getRatinga() . "</td>";
                  echo "<td>" . getEvolution($game, 'a') . "</td>";
                  echo "<td>" . $tmanager->get($game->getIdb())->getName() . "</td>";
                  echo "<td>" . $game->getRatingb() . "</td>";
                  echo "<td>" . getEvolution($game, 'b') . "</td>";
                  } else {
                  echo "<td>" . $tmanager->get($game->getIdb())->getName() . "</td>";
                  echo "<td>" . $game->getRatingb() . "</td>";
                  echo "<td>" . getEvolution($game, 'b') . "</td>";
                  echo "<td>" . $tmanager->get($game->getIda())->getName() . "</td>";
                  echo "<td>" . $game->getRatinga() . "</td>";
                  echo "<td>" . getEvolution($game, 'a') . "</td>";
                  } ?>
              </tr>
              <?php }} ?>
              </tbody>
          </table>
      </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
<script src="js/plugins/tablefilter.js"></script>
</body>
</html>