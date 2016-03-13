<?php
  $server	=	'';
  $user	=	'';
  $password	=	'';
  $base	=	'';

  try {
    $bdd = new PDO('mysql:host='.$server.';dbname='.$base, $user, $password);
  } catch (Exception $e) {
    die('{"error" :"' . $e->getMessage().'"');
  }
