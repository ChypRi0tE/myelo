<?php include_once("inc/header.php");
include_once("inc/riot.utils.php"); ?>
<body>
<?php include("inc/nav.php");
$_DEBUG_ = false;
$id = '20002219';
$summoner = "chypriote";
?>
<?php if (isset($_POST['submit'])) {recordLastGames($_POST['selectSummoner']);} ?>
<div class="container" id="content">
    <div class="row">
        <div class="col-sm-2">
            <br />
            <form action="#" method="get">
                <div class="input-group">
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                  <span class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </form><br />
            <form action="" method="post">
                <div class="form-group">
                    <label for="selector">Update a summoner</label>
                    <select name="selectSummoner">
                        <option value="20002219">Chypriote</option>
                        <option value="21183314">d0ts</option>
                        <option value="20007473">Chokichoc</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-default" name="submit">Update</button>
            </form>
        </div>
        <div class="col-sm-10">
            <table class="table table-list-search">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Player</th>
                    <th>Type</th>
                    <th>Champion</th>
                    <th>Team</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mmgr = new MatchManager($bdd);
                $summonersList = [];
                $data = $mmgr->getAll();
                foreach ($data as $m) { ?>
                    <tr class="<?php echo $m->getVictory() ? "game game-win" : "game game-lose"; ?>">
                        <td><?php echo $m->getMatchId(); ?></td>
                        <td><?php $sid = $m->getSummonerId();
                            if (empty($summonersList[$sid])) {$summonersList[$sid] = new Summoner($sid);}
                            echo $summonersList[$sid]->getName();
                            ?>
                        </td>
                        <td><?php echo $m->getMatchType(); ?></td>
                        <td><?php $champ = new Champion($m->getChampionId());echo $champ->getName(); ?></td>
                        <td><?php echo getSide($m->getTeamId()); ?></td>
                        <td><a href="<?php echo $m->getLink(); ?>">Detail</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
<script src="js/table.js"></script>
</body>
</html>