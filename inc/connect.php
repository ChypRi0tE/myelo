<?php
 /* $server	=	'localhost';
  $user	=	'root';
  $password	=	'toor';
  $base	=	'myelo';*/
  $server	=	'mysql-3';
  $user	=	'chypriot_eloadm';
  $password	=	'#o6}5Dd%(CE(';
  $base	=	'chypriot_myelo';

  try {
    $bdd = new PDO('mysql:host='.$server.';dbname='.$base, $user, $password);
  } catch (Exception $e) {
    die('{"error" :"' . $e->getMessage().'"');
  }