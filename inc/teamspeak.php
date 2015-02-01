<div id="widget-ts">
  <label>Serveur TS</label>
  <!--<div class="embed-responsive embed-responsive-16by9" id="widget-ts">
    <iframe src="https://www.mtxserv.fr/viewer/teamspeak/43234"  class="embed-responsive-item"></iframe>
  </div>-->
  <?php
    require_once("/home/vol13_6/5gb.co/5gbc_15477651/htdocs/myelo/tsstatus/tsstatus.php");
    $tsstatus = new TSStatus("teamspeak1.mtxserv.fr", 10011);
    $tsstatus->useServerPort(10192);
    $tsstatus->imagePath = "/myelo/tsstatus/img/";
    $tsstatus->timeout = 2;
    $tsstatus->hideEmptyChannels = false;
    $tsstatus->hideParentChannels = false;
    $tsstatus->showNicknameBox = false;
    $tsstatus->showPasswordBox = false;
    echo $tsstatus->render();
  ?>
</div>
<link rel="stylesheet" type="text/css" href="/myelo/tsstatus/tsstatus.css" />
<script type="text/javascript" src="/myelo/tsstatus/tsstatus.js"></script>