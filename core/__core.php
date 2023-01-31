<?php
/**
 * DEV
 * 
 * @DEV by YD
 * core:    load all needed files
 */

session_start();

require 'bootstrap/const.boot.php';

require EXCONF . '/db.conf.php';

require VEND . '/autoload.php';

require EXAPP . '/global.func.php';

require EXAPP . '/auth.func.php';

require EXAPP . '/app.func.php';

require EXINC . '/app.inc.php';