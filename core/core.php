<?php
/**
 * DEV
 * 
 * @DEV by YD
 * core:    load all needed files
 */

session_start();

require 'core/bootstrap/const.boot.php';

require EXBOOT . '/router.boot.php';

require EXCONF . '/db.conf.php';

require EXAPP . '/global.func.php';

require EXAPP . '/auth.func.php';

require EXAPP . '/app.func.php';

require EXINC . '/app.inc.php';
