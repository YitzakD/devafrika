<?php
/**
 * DEV
*	index:	index page
*/

require 'core/core.php';

$match = $router->match();

if($match !== null) {

	include_once ASSETS . '/_header.php';

	if(is_callable($match['target'])) {

		call_user_func_array($match['target'], $match['params']);

	} else { eaRedirect(WURI . '/404'); }

	include_once ASSETS . '/_footer.php';

}