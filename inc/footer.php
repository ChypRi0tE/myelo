<?php include("inc/modal/pmModal.php"); ?>
<?php include("inc/modal/loginModal.php"); ?>
<footer>
    <div class="container glickotile">
        <div class="glickotile-content">
            <div class="col-xs-8 col-sm-6 footer-links">
                Copyright © ChypRiotE 2015 |
                <?php if (!isset($_SESSION['user'])) { ?>
                    <a data-toggle="modal"  href="#" data-target="#loginbox">Login</a>
                <?php } else { ?>
                    <a href="disconnect">Disconnect</a>
                <?php } ?>
            </div>
            <div class="col-xs-4 col-sm-4 col-sm-offset-2 col-md-2 col-md-offset-4 footer-social">
                <a href="https://www.facebook.com/ChypRiotE"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
                <a href="https://twitter.com/ChypRiotE"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
                <a href="https://plus.google.com/ChypRiotE"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
                <a data-toggle="modal" data-target="#pmModal" href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="assets/js/less.min.js"></script>
<script src="assets/js/scripts.js"></script>
