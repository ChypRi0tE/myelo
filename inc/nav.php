<header>
  <nav class="navbar" role="navigation">
    <div class="container glickotile">
        <div class="glickotile-content">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-header">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php // <a href="." class="navbar-brand"><i class="fa fa-trophy"></i> Imagine Barons</a> ?>
      </div>
      <div class="collapse navbar-collapse" id="navbar-header">
        <ul class="nav navbar-nav">
            <li><a href="ladder"><i class="fa fa-bar-chart"></i> Classement</a></li>
            <li><a href="team"><i class="fa fa-users"></i> Teams</a></li>
          <li><a href="results"><i class="fa fa-list"></i> Resultats</a></li>
            <?php if (!empty($_SESSION['user'])) { ?>
          <li><a href="soloq"><i class="fa fa-child"></i> MySoloQ</a></li>
            <?php } ?>
        </ul>
        <?php if (!empty($_SESSION['user'])) { ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> Administration <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="add-team"><i class="fa fa-users fa-stack"></i> Ajouter une team</a></li>
                    <li><a href="add-game"><i class="fa fa-plus fa-stack"></i> Ajouter une game</a></li>
                    <li><a href="add-player"><i class="fa fa-user-plus fa-stack"></i> Ajouter un joueur</a></li>
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-power-off"></i> Deconnexion</a></li>
                </ul>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div></div>
  </nav>
</header>