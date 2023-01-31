<?php
/**
 * DEV
 * 
 * @DEV by YD
 * constants:    define all env constants
 */





/**#    env const */
define('WEBSITE_NAME', 'DEV AFRIKA');

define('NOREPLY_MAIL', 'sercom.dev@devafrika.com');
define('WURI', 'http://localhost:8000');

define('WEBSITE_PHONE', '27-22-527-988');
define('WEBSITE_CEL', '07-08-145-830');

define('CDN', WURI . '/resources/public/localcdn/');

define('WEBSITE_COPYRIGHT', '&nbsp;©' . date('Y') . '&nbsp;' . WEBSITE_NAME . ' - 01 BP 1470 ABIDJAN, Cocody Angré 7ème Tranche - Imm. de la Pharmacie Des Nations');



/**#    database core const */

 define("DB_HOST", "localhost");
 
 define("DB_NAME", "db_DEV");
 
 define("DB_USERNAME", "root");
 
 define("DB_PASSWORD", "");


 



/**#    folder core const */
define('ROOT', dirname(dirname(dirname(__FILE__))));

define('DS', DIRECTORY_SEPARATOR);


define('EXCORE', ROOT . DS . 'core');

    define('EXAPP', EXCORE . DS . 'app');

    define('EXBOOT', EXCORE . DS . 'bootstrap');

    define('EXCONF', EXCORE . DS . 'database');

    define('EXINC', EXCORE . DS . 'includes');


define('APP', ROOT . DS . 'app');
    
    define('AUTH', APP . DS . 'auth');
    
    define('ACCOUNT', APP . DS . 'account');

    define('MANAGER', APP . DS . 'manager');

    define('ERR_RS', APP . DS . 'errors');

    define('CNC', APP . DS . 'main');

    define('WEB', APP . DS . 'web');


define('RESOURCES', ROOT . DS . 'resources');

    define('PUBLIQUE', RESOURCES . DS . 'public');

        define('CSS', PUBLIQUE . DS . 'css');

        define('JS', PUBLIQUE . DS . 'js');

        define('MEDIA', PUBLIQUE . DS . 'media');

            define('UPLOAD', MEDIA . DS . 'uploads');

    define('VIEWS', RESOURCES . DS . 'views');

        define('LAYOUTS', VIEWS . DS . 'layouts');

            define('PARTIALS', LAYOUTS . DS . 'partials');
            
            define('ASSETS', LAYOUTS . DS . 'assets');

        define('PAGES', VIEWS . DS . 'pages');

    define('EXMAILS', RESOURCES . DS . 'mails-templates');


define('VEND', ROOT . DS . 'vendor');



/**#    file core const */
$RESOURCES = WURI . '/resources';

$NEEDLES = $RESOURCES . '/public';

    $CSS     = $NEEDLES . '/css';

    $JS        = $NEEDLES .  '/js';

    $MEDIA    = $NEEDLES . '/media';
    
    define('MEDIAS', WURI . '/resources/public/media');

        $UPLOAD = $MEDIA . '/uploads';

        $USES = $MEDIA . '/uses';
