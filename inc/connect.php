<?php
if ($_LOCAL) {
    $server = 'localhost';
    $user = 'root';
    $password = 'toor';
    $base = 'myelo';
}else {
  $server	=	'sql203.5gb.co';
  $user	=	'5gbc_15477651';
  $password	=	'U8r5bhEe95';
  $base	=	'5gbc_15477651_lolc';
}

  try {
    $bdd = new PDO('mysql:host='.$server.';dbname='.$base, $user, $password);
  } catch (Exception $e) {
    die('<strong>Erreur :</strong> ' . $e->getMessage());
  }
?>