<?php header('Location: ladder'); ?>
<?php include_once("inc/header.php"); ?>
<body style="background-image:url(assets/img/bg.jpg);background-size:cover">
  <div class="container" id="content">
      <div class="row destacados">
          <div class="col-sm-4 destacados-tile" id="blog">
              <div class="destacados-content">
                  <img src="assets/img/2.jpg" alt="Blog" class="img-circle img-thumbnail">
                  <h2>Blog</h2>
                  <p>Les dernières infos du site et de la line-up Imagine Barons.</p>
              </div>
          </div>

          <div class="col-sm-4 destacados-tile" id="ladder">
              <div class="destacados-content">
                  <img src="assets/img/3.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
                  <h2>Ladder Français</h2>
                  <p>Le classement ELO des meilleures teams françaises, mises à jour quotidiennes.</p>
              </div>
          </div>

          <div class="col-sm-4 destacados-tile" id="results">
              <div class="destacados-content">
                  <img src="assets/img/1.jpg" alt="Resultats" class="img-circle img-thumbnail">
                  <h2>Résultats</h2>
                  <p>L'historique des affrontements entre les meilleures équipes françaises.</p>
              </div>
          </div>
      </div>
  </div>
  <?php include("inc/modal/pmModal.php"); ?>
    <div class="col-sm-12" id="index-footer">
        <div class="pull-left" style="padding-top: 15px">Copyright © ChypRiotE 2015</div>
        <div class="pull-right">
            <a href="https://www.facebook.com/ChypRiotE"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
            <a href="https://twitter.com/ChypRiotE"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
            <a href="https://plus.google.com/ChypRiotE"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
            <a data-toggle="modal" data-target="#pmModal" href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>