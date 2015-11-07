<?php
/*
 * Simpler way to load classes
 */
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/myelo/");
include_once("inc/connect.php");
include_once("Model/Beans/Team.php");
include_once("Model/Beans/Player.php");
include_once("Model/Beans/Game.php");
include_once("Model/Managers/TeamManager.php");
include_once("Model/Managers/PlayerManager.php");
include_once("Model/Managers/GameManager.php");
include_once("Model/Riot/RiotApi.php");
include_once("Model/Riot/Champion.php");
include_once("Model/Riot/Summoner.php");
include_once("Model/Rating/Elo.php");
/*
 * Used to sanitize html inputs
 */
	function clean($text) {
		return $text;
	}
/*
 * Display debug text, debug variable changed in header
 */
  function debug($text) {
	global $_DEBUG_;
    if ($_DEBUG_) {
      echo '<strong>[DEBUG]</strong><span style="color:grey"> ' . $text."</span><br />";
    }
  }
/*
 * Returns the text in bold
 */
	function bold($text) {
		return "<strong>" . $text . "</strong>";
	}

/*
 * Used to display the date in a different format. Input format: yyyy-mm-dd, return format: dd/mm/yyyy
 */
	function showTime($date) {
		$date = explode("-", $date);
		return $date[2] . "/" . $date[1] . "/" . $date[0];
	}
/*
 * Displays the difference in rating with the corresponding sign
 */
	function getEvolution($game, $team) {
		$old = "getRating" . $team;
		$new = "getNew".$team;
		$evol = $game->$new() - $game->$old();
		return ($evol < 0) ? $evol : "+" . $evol;
	}
/*
 * Calculates new ratings for teams
 */
	function calculateRating($data) {
		$elo = new Elo();
		if ($data['result'] == $data['idA']) {
			$data['newA'] = $elo->compute(Elo::STATUS_WIN, $data['ratingA'], $data['ratingB']);
			$data['newB'] = $elo->compute(Elo::STATUS_LOST, $data['ratingB'], $data['ratingA']);
		} else {
			$data['newA'] = $elo->compute(Elo::STATUS_LOST, $data['ratingA'], $data['ratingB']);
			$data['newB'] = $elo->compute(Elo::STATUS_WIN, $data['ratingB'], $data['ratingA']);
		}
		return $data;
	}
setlocale (LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set('Europe/Paris');