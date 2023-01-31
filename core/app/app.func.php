<?php
/**
 * DEV
 * 
 * @DEV by YD
 * app.func:        app functions for rout and other
 */





/**
 *  eaApp_checklog()
 *  permet de vérifier si il y a session
 */

if(!function_exists('eaApp_checklog')) {

    function eaApp_checklog()
    {

        if(!eaAuth_islogged()) {
            $fwURI = $_SERVER['REQUEST_URI'];
            $_SESSION['forwardingURI'] = $fwURI;
            eaRedirect(WURI . '/login');
        }

    }
    
}




/**
 *  eaApp_getparm($key)
 *  $key => obj
 *  permet de récupérer à la volée les paramêtres de l'url
 */
if(!function_exists('eaApp_getparm')) {

    function eaApp_getparm($key)
    {
        
        $param = explode('/', $key);

        return $param;

    }

}




/**
 *    eaApp_sendmail($name, $to, $pass, $type)
 *    $nomm => string (username); $to => string (email); $pass => string (hashed password); $type => int (type of mail)
 *    permet l'envoie de mail
 *    retourne $array (tableau contenant les informations à envoyer par mail)
 */
if(!function_exists('eaApp_sendmail')) {

    function eaApp_sendmail($name, $to, $pass, $type)
    {

        /**
         *  1   =>  Confirmation de mail
         *  2   =>  Modification du mail
         *  3   =>  Modification de mot de passe
         *  4   =>  Désactivation de compte
         *  5   =>  Récupération de compte
         *  6   =>  Restauration de compte
         */

        if($type === 1) { $subject = "Activation de votre compte " . ucfirst(WEBSITE_NAME); } 
        elseif($type === 2) { $subject = "Modification de votre adresse e-mail principale"; } 
        elseif($type === 3) { $subject = "Modification de votre mot de passe"; } 
        elseif($type === 4) { $subject = "Désactivation de votre compte"; }
        elseif($type === 5) { $subject = "Récupération de votre compte"; }
        elseif($type === 6) { $subject = "Restauration de votre compte"; }

        $token = sha1($name.$to.$pass);

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . WEBSITE_NAME . ' <' . NOREPLY_MAIL . '>' . "\r\n" .
            'Reply-To: ' . '<' . NOREPLY_MAIL . '>' . "\r\n" . 
            'X-Mailer: PHP/' . phpversion();

        $array = compact("to", "subject", "headers", "token");

        return $array;

    }

}




/**
 *  eaApp_findURLusercredits()
 *  permet de récupérer à la volée les informations de l'utilisateur en paramètre url
 *  retourne $data
 */ 
if(!function_exists('eaApp_findURLusercredits')) {

    function eaApp_findURLusercredits()
    {

        global $db;

        $path = $_SERVER['REQUEST_URI'];
        $x = explode('/', $path);
        $uname = $x[2];

        if(eaIsalreadyuse('users', 'username', $uname) > 0) {

            $uinfo = eaFindone('users', 'username', $uname);

            $data = $uinfo;            
            return $data;

        }    

    }

}

