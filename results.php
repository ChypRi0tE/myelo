<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-9">
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
<script src="js/table.js"></script>
</body>
</html>