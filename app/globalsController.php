<?php
/**
 * DEV
 * 
 * @DEV by YD
 * globalsController:    global controller for vars porty
 */

/**#    global vars */
global $router;

global $match;

global $db;

global $MEDIA;

global $UPLOAD;

global $USES;




/**#    url shortcut vars */
$m = eaApp_getparm($_SERVER['REQUEST_URI']);

$MOD = $m[1];

if(count($m) > 2) {

    $CON = $m[2];

    if(isset($m[3])) { $VUE = $m[3]; }

    if(isset($m[4])) { $RVUE = $m[4]; }

    if(isset($m[5])) { $SVUE = $m[5]; }

    if(isset($m[7])) { $TVUE = $m[7]; }

    $ID = end($m);

}




/**#    global app vars */
global $VAR_authappentriesname;

global $VAR_manageappentriesname;

global $VAR_exceptappentriesname;


/**#    user app vars [see app.inc.php file] */
global $VAR_ucr;

global $VAR_ui;

    global $VAR_uiXm;

global $VAR_uft;

    global $VAR_cuft;

    global $VAR_uwaw;

    global $VAR__uwaw;


/**# account app vars [see account.inc.php file] */
global $VAR_uftBu;

global $VAR_uftXmBu;

global $VAR_uawBu;

global $VAR_ulawBu;

    global $VAR_ucBu;

        global $VAR_uiBu;
    
        global $VAR_uXmBu;

    global $VAR_iFu;

    global $VAR_iFui;

    global $VAR_cuFBu;

    global $VAR_cuAwBu;


/**#    app vars [see app.inc.php file] */
global $VAR_ac;

global $VAR_adt;

global $VAR_act;


/**#    topic app vars [see topic.inc.php file] */
global $VAR_ti;

    global $VAR_tf;

global $VAR_auc;

global $VAR_aut;

global $VAR_twaw;

global $VAR_tawc;


/**#    artwork app vars [see artwork.inc.php file] */
global $VAR_awi;


/**#    talky app vars [see app.inc.php file] */
global $VAR_actu;

global $VAR_ctu;    //  Common topics users



/**#    global others vars [see app.inc.php file] */
$i = 1;
    
$current = 1;

$limit = 100;

$wlimit = 4;

$vlimit = 10;

global $notifscount;

global $VAR_ful;

global $VAR_lful;

global $VAR_ift;

global $VAR_amft;

global $VAR_ppfldr;

global $VAR_tfldr;

global $VAR_afldr;



/**#    global must have vars [see app.inc.php file] */
global $VAR_mhtf;

global $VAR_mhacf;

global $VAR_mhawf;
