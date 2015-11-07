<?php include_once("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<?php
    $GameManager = new GameManager($bdd);
    $TeamManager = new TeamManager($bdd);
?>
<div class="container" id="content">
    <div class="col-md-7 glickotile">
        <div class="glickotile-content" id="tile-ladder">
        <h1>Classement
            <small><span class="pull-right" title="Masquer les teams inactives"><i class="fa fa-eye-slash hider"></i></span></small>
        </h1>
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
            <tbody></tbody>
        </table>
    </div>
    </div>
    <div class="col-md-5">
        <div class="glickotile">
            <div class="glickotile-content">
            <p class="lead">Comment ça marche ?</p>
            <p>Les matchs sont entrés à la main de façon régulière (tous les un ou deux jours). Le calcul du rating (elo) se fait automatiquement au moment où le match est enregistré.</p>
            <p>Ne sont ajoutées que les teams jouant ensemble depuis un certain moment (~2 semaines minimum), et possédant un certain niveau (diamant 5 en team classsée). Contactez moi IG ou envoyez moi un mp pour demander à ajouter votre équipe.</p>
            <p>Les équipes ayant disband ou inactives apparaissent grisées afin de conserver un historique.</p>
        </div></div>
        <div class="glickotile">
            <div class="glickotile-content" id="tile-ladder-results">
            <p><span class="h3">Derniers résultats</span> <a href="results" class="pull-right">Tous les résultats</a></p>
            </div>
        </div>
    </div>
</div>
<?php include_once("inc/footer.php"); ?>
</body>
</html>