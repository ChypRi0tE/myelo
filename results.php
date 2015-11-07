<?php include("inc/header.php"); ?>
<body>
<?php include("inc/nav.php"); ?>
<div class="container" id="content">
    <div class="col-sm-3">
        <div class="glickotile" id="tile-results-search">
            <div class="glickotile-content">
                <h4>Recherche</h4>
                <form action="#" method="get">
                    <div class="input-group">
                        <input class="form-control" id="system-search" name="q" placeholder="Recherche" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-9 glickotile" id="tile-results-table">
        <div class="glickotile-content">
            <table class="table table-list-search">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th class="blue-side">Blue side</th>
                        <th>Points</th>
                        <th class="purple-side">Purple side</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
<script src="assets/js/plugins/filter.min.js"></script>
</body>
</html>