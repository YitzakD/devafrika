<?php
/**
 * DEV
 * 
 * @DEV by YD
 * serviceController:        service controller for services page
 */


require_once APP . '/globalsController.php';

$SUBPAGE = VIEWS . '/Services/';



ob_start();

$__service = ob_get_clean();

/**#    Template */
if(!in_array($match['name'], $VAR_authappentriesname)) {
    include PARTIALS . '/__header.part.php';
    include_once $SUBPAGE . 'p/h.php';
    	include $SUBPAGE . 'index.php' ;
    include PARTIALS . '/__footer.part.php';
}