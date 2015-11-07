<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 22/02/2015
 * Time: 16:23
 */
    echo date('Y-m-d H:i:s') . "<br />";

setlocale (LC_TIME, 'fr_FR.utf8','fra');
echo strftime('%Y-%A-%d %H:%M:%S') . "<br />";
echo date('Y-m-d H:i:s', time() + 21600);