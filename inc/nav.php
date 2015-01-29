<header>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-header">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand"><i class="fa fa-trophy"></i> Classement LoL</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-header">
        <ul class="nav navbar-nav">
          <li class="divider-vertical"></li>
          <li><a href="index.php"><i class="fa fa-home"></i> Accueil</a></li>
          <li class="divider-vertical"></li>
          <li><a href="team.php"><i class="fa fa-users"></i> Team Page</a></li>
          <li class="divider-vertical"></li>
          <li><a href="results.php"><i class="fa fa-line-chart"></i> Results page</a></li>
          <li class="divider-vertical"></li>
        <?php if (!empty($_SESSION['user'])) { ?>
          <li><a href="soloq.php"><i class="fa fa-child"></i> MySoloQ</a></li>
          <?php } ?>
        </ul>
        <?php if (!empty($_SESSION['user'])) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="addteam.php"><i class="fa fa-user"></i> Add a team</a></li>
              <li><a href="addgame.php"><i class="fa fa-plus"></i> Add a game</a></li>
              <li class="divider"></li>
              <li><a href="index.php?disconnect=true"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>