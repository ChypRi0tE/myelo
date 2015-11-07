<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<?php
  function debug2($text) {
      echo '<strong>[DEBUG]</strong><span style="color:grey"> ' . $text."</span><br />";
  }

    $TeamManager = new TeamManager($bdd);
    $GameManager = new GameManager($bdd);
    $PlayerManager = new PlayerManager($bdd);
    $api = new RiotApi('euw');
    
    $listTeam = $TeamManager->getAll();
?>
<div class="container" id="content">
    <div class="hidden-xs hidden-sm col-md-2" id="col-left">
        <br />
    </div>
    <div class="col-md-8" id="col-center">
        <?php foreach($listTeam as $team) {
            debug2("Updating ".$team->getName());
            $listTeamGames = $GameManager->getForTeam($team->getId());
            $team->setPlayed(count($listTeamGames));
            $wins = 0;
            $losses = 0;
            foreach($listTeamGames as $game)
                $game->getResult() == $team->getId() ? $wins++ : $losses++;
            $team->setWins($wins);
            $team->setLosses($losses);
            $TeamManager->update($team);
        } ?>
    </div>
</div>
<?php include("inc/footer.php"); ?>
</body>
</html>
  
