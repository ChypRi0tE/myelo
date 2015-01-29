<?php include("inc/modal/pmModal.php"); ?>
<?php include("inc/modal/loginModal.php"); ?>
<footer>
	<div class="col-sm-12">
		<div class="container">
			<br />
			<div class="col-sm-6">
				Copyright © ChypRiotE 2015 | <a href="">Privacy Policy</a> | <?php if (!isset($_SESSION['user'])) { ?><a data-toggle="modal"  href="#" data-target="#loginbox">Login</a><?php } else { ?><a href="index.php?disconnect=true">Disconnect</a><?php } ?>
			</div>
			<div class="pull-right">
				<a href="https://www.facebook.com/ChypRiotE"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
				<a href="https://twitter.com/ChypRiotE"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
				<a href="https://plus.google.com/ChypRiotE"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
				<a data-toggle="modal" data-target="#pmModal" href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>
			</div>
			<br />
		</div>
	</div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>