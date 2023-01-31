<?php
/**
 * DEV
 * 
 * @DEV by YD
 * aboutController:        about controller for about page
 */


require_once APP . '/globalsController.php';

$SUBPAGE = VIEWS . '/About/';



ob_start();

$__about = ob_get_clean();

/**#    Template */
if(!in_array($match['name'], $VAR_authappentriesname)) {
    include PARTIALS . '/__header.part.php';
    include_once $SUBPAGE . 'p/h.php';
    	include $SUBPAGE . 'index.php' ;
    include PARTIALS . '/__footer.part.php';
}