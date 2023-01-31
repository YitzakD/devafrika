<?php
/**
 * DEV
 * 
 * @DEV by YD
 * helpsController:        helps controller for helps & contacts page
 */


require_once APP . '/globalsController.php';

$SUBPAGE = VIEWS . '/Contacts/';



ob_start();

$__helps = ob_get_clean();

/**#    Template */
if(!in_array($match['name'], $VAR_authappentriesname)) {
    include PARTIALS . '/__header.part.php';
    include_once $SUBPAGE . 'p/h.php';
    	include $SUBPAGE . 'index.php' ;
    include PARTIALS . '/__footer.part.php';
}