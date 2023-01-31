<?php
/**
 * DEV
 * 
 * @DEV by YD
 * homeController:        home controller for home page
 */


require_once APP . '/globalsController.php';

$SUBPAGE = VIEWS . '/Home/';



ob_start();

$__home = ob_get_clean();

/**#    Template */
if(!in_array($match['name'], $VAR_authappentriesname)) {
    include PARTIALS . '/__header.part.php';
    include_once PARTIALS . '/slides/__slide.php';
    	include $SUBPAGE . 'index.php' ;
    include PARTIALS . '/__footer.part.php';
}