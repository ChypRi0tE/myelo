<?php include_once("inc/header.php");
include_once("inc/riot.utils.php"); ?>
<link rel="stylesheet" href="assets/css/plugins/select.min.css">
<body>
<?php include("inc/nav.php");
$_DEBUG_ = false; ?>
<?php if (isset($_POST['submit'])) {recordLastGames($_POST['selectSummoner']);} ?>
<?php if (isset($_GET['delete']) && !empty($_SESSION['user'])) {deleter($_GET['delete']);} ?>
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
            </form><br />
            <form action="" method="post">
                    <label for="selector">Mettre à jour</label>
                    <div class="input-group">
                    <select name="selectSummoner" class="selectpicker" data-width="auto">
                        <option value="20002219">Chypriote</option>
                        <option value="21183314">d0ts</option>
                        <option value="20007473">Chokichoc</option>
                        <option value="40662980">Yaaheeeeee</option>
                        <option value="22992327">Pyoup</option>
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-chevron-right"></i></button>
                    </span>
                </div>
            </form>
            <br /><hr />
            <?php //include("inc/teamspeak.php"); ?>
            <br /><hr />
        </div>
        <div class="col-sm-10" id="col-center">
            <table id="soloQ" class="table table-list-search" data-toggle="table"
                   data-query-params="queryParams"
                   data-pagination="true"
                   data-page-list="[15,25,50,100]"
                   data-page-size="15"
                   data-search="true"
                >
                <thead>
                <tr>
                    <th data-field="ID">ID</th>
                    <th data-field="player">Player</th>
                    <th data-field="type">Type</th>
                    <th data-field="champion">Champion</th>
                    <th data-field="team">Team</th>
                    <th data-field="link">Link</th>
                    <?php if (isset($_SESSION['user'])){?><th data-field="admin" style="text-align:center">Admin</th><?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $mmgr = new MatchManager($bdd);
                $summonersList = [];
                $data = $mmgr->getAll();
                foreach ($data as $m) {
                    ?>
                    <tr class="<?php echo $m->getVictory() ? "game game-win" : "game game-lose"; ?>">
                        <td><?php echo $m->getMatchId(); ?></td>
                        <td><?php $sid = $m->getSummonerId();
                            if (empty($summonersList[$sid])) {$summonersList[$sid] = new Summoner($sid);}
                            echo $summonersList[$sid]->getName();
                            ?>
                        </td>
                        <td><?php echo $m->getMatchType(); ?></td>
                        <td><?php $champ = new Champion($m->getChampionId());
                            //echo $champ->getName();
                            echo '<img src="' .$champ->getPic().'" title="'. $champ->getName() . '" style="width:30px" />';
                            ?></td>
                        <td><?php echo getSide($m->getTeamId()); ?></td>
                        <td><a href="<?php echo $m->getLink(); ?>">Detail</a></td>
                        <?php if (isset($_SESSION['user'])){?><td style="text-align:center"><a href="soloq.php?delete=<?php echo $m->getMatchId(); ?>">X</a></td><?php } ?>
                    </tr>
                <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
<script src="assets/js/plugins/filter.min.js"></script>
<script src="assets/js/plugins/select.min.js"></script>
<script src="assets/js/plugins/table.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
    function queryParams() {
        return {
            type: 'owner',
            sort: 'updated',
            direction: 'desc',
            page: 1
        };
    }
    $(document).ready(function() {
        //$(".search").hide();
        $("#system-search").replaceWith($(".search").children());
        $(".fixed-table-loading").hide();
    });
    $(function () {
        $("#soloQ").on("search.bs.table", function() {
            $("#soloQ").bootstrapTable('togglePagination');
        });
    });
</script>
</body>
</html>