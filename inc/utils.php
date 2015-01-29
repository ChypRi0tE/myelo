<?php
/*
 * Simpler way to load classes
 */
function load($class) {
	require_once 'class/' . $class . '.php';
}
spl_autoload_register('load');
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
	function getResult($game, $teamname, $teamnb) {
		$teamlt = $teamnb == 1 ? 'a' : 'b';
		$ret = ($game->getResult() == $teamnb) ? bold($teamname) : $teamname;
		$ret .= " (". getEvolution($game, $teamlt) .")";
		return $ret;
	}
/*
 * Calculates new ratings for teams
 */
	function calculateRating($data) {
		$elo = new Elo();
		if ($data['result'] == 1) {
			$data['newA'] = $elo->compute(Elo::STATUS_WIN, $data['ratingA'], $data['ratingB']);
			$data['newB'] = $elo->compute(Elo::STATUS_LOST, $data['ratingB'], $data['ratingA']);
		} else {
			$data['newA'] = $elo->compute(Elo::STATUS_LOST, $data['ratingA'], $data['ratingB']);
			$data['newB'] = $elo->compute(Elo::STATUS_WIN, $data['ratingB'], $data['ratingA']);
		}
		return $data;
	}
?>