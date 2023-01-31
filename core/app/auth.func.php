<?php
/**
 * DEV
 * 
 * @DEV by YD
 * auth.func:   load all auth used fonctions
 */




/**
 *    eaAuth_paswordhashing($value, $options)
 *    $value =>string; $options => array()
 *    permet de hasher le mot de passe grâce à bcrypt
 *    retourne $hash (mot de passe hashé)
 */
if(!function_exists('eaAuth_paswordhashing')) {

    function eaAuth_paswordhashing($value, $options = array())
    {

        $cost = isset($options['rounds']) ? $options['rounds'] : 10;

        $hash = password_hash($value, PASSWORD_BCRYPT, array('cost' => $cost));

        if($hash === false) {
            throw new Exception("Bcrypt hashing n'est pas supporté."); 
        }

        return $hash;

    }

}




/**
 *    eaAuth_paswordverifying($value, $hashedvalue)
 *    $value =>string; $hashedvalue => hashed DBB password
 *    permet de hashé la valeur entrée et de vérifier sa similitude avec le mot de passe en BDD
 *    retourne password_verify($value, $hashedvalue)
 */
if(!function_exists('eaAuth_paswordverifying')) {

    function eaAuth_paswordverifying($value, $hashedvalue)
    {

        return password_verify($value, $hashedvalue);

    }

}




/**
 *    eaAuth_islogged()
 *    verifie si un utilisateur est connecté et que sa session est bien créer
 *    retourne $_SESSION['userid'] ou $_SESSION['username']
 */
if(!function_exists('eaAuth_islogged')) {

    function eaAuth_islogged()
    {

        return isset($_SESSION['userid']) || isset($_SESSION['username']);

    }

}




/**
 *    eaAuth_autologin()
 *    verifie les coockies afin de permettre une connexion automatique de l'utilisateur
 *    retourne 'true' si le coockie existe, et 'false' si celui-ci n'existe pas
 */
if(!function_exists('eaAuth_autologin')) {
    
    function eaAuth_autologin()
    {

        global $db;

        if(!empty($_COOKIE['auth'])) {

            $split = explode(':', $_COOKIE['auth']);

            if(count($split) !==  2) {
                return false; 
            }

            $selector = $split[0];
            
            $token = $split[1];

            $q = $db->prepare("SELECT ex_authtokens.token, ex_authtokens.uID, ex_users.username, ex_users.usermail, ex_users.uTYPE, ex_users.hashedID, ex_users.ID FROM ex_authtokens LEFT JOIN ex_users ON ex_authtokens.uID = ex_users.ID WHERE ex_authtokens.selector = ? AND ex_authtokens.expires >= CURDATE()");

            $q->execute([$selector]);

            $data = $q->fetch(PDO::FETCH_OBJ);

            if($data) {

                if($data->token === $token) {

                    session_regenerate_id(true);

                    $_SESSION['userid'] = $data->ID;

                    $_SESSION['username'] = $data->username;

                    $_SESSION['usertype'] = $data->uTYPE;

                    $_SESSION['usermail'] = $data->usermail;

                    $_SESSION['userhash'] = $data->hashedID;

                    return true;
                    
                }

            }

        }

        return false;

    }

}




/**
 *    eaAuth_getsession($key)
 *    $key => int | string
 *    permet de recuperer les clés sauvegarder dans la session
 *    retourne $_SESSION[$key] (echappe celui-ci)
 */
if(!function_exists('eaAuth_getsession')) {

    function eaAuth_getsession($key)
    {

        if($key) {
            return !empty($_SESSION[$key]) ? e($_SESSION[$key]) : null; 
        }

    }

}




/**
 *    eaAuth_rememberme($userid)
 *    $userid => int
 *    permet d'enregistrer en BDD le tokens et le selector de sécurité pour faciliter la connexion automatique
 */
if(!function_exists('eaAuth_rememberme')) {
    
    function eaAuth_rememberme($userid)
    {

        global $db;

        $token = openssl_random_pseudo_bytes(24);

        do {
            
            $selector = openssl_random_pseudo_bytes(9);

        } while(cell_count('ex_authtokens', 'selector', $selector) > 0);

        
        $q = $db->prepare("INSERT INTO ex_authtokens(uID, expires, selector, token) VALUES(:uID, DATE_ADD(NOW(), INTERVAL 365 DAY), :selector, :token)");

        $q->execute(
            [
            'uID' => $userid,
            'selector' => $selector,
            'token' => $token
            ]
        );

        // Contenu => base64_encode(selector).':'.base64_encode(token)
        setcookie(
            'auth',
            base64_encode($selector).':'.base64_encode($token),
            time()+31536000,
            null,
            null,
            false,
            true
        );

    }

}




/**
 *    eaAuth_encodeit($value)
 *    $value => string
 *    encode la valeur passer en paramètres
 *    Big Fucking and Ennoying Hacking Crypt => BFEHC
 */
if(!function_exists('eaAuth_encodit')) {

    function eaAuth_encodit($value) { return base64_encode($value); }
    function eaAuth_Yascrypt($msg, $cost) {

        $e = eaAuth_encodit($msg);
        for($i=1; $i<=$cost; $i++) {
            $e = eaAuth_encodit($e);
        }
        return $e;
    }
    function eaAuth_BFEHC($value) {
        
        $hash = eaHashgenerator(2, 'N');
        $key = random_int(1, 3)*pi();
        $cost = ($hash / $key);

        $treat = e($value);
        $encode = eaAuth_Yascrypt($treat, $cost);

        $bk = explode(".", $key);
        $a = $hash . 'YAs' . $encode;
        $b = $a . ':' . $bk[0] . '(*_' . $bk[1] . ')';
        $store = $b;

        return $store;
    }





    function eaAuth_decodit($value) { return base64_decode($value); }
    function eaAuth_Yasdecrypt($e, $cost) {

        $d = eaAuth_decodit($e);
        for($i=1; $i<=$cost; $i++) {
            $d = eaAuth_decodit($d);
        }
        return $d;
    }
    function eaAuth_Reverse__BFEHC($value) {

        if($value !== "") {
            
            $w = explode("YAs", $value);
            $x = explode(":", $w[1]);
            $y = explode("(*_", $x[1]);
            $z = explode(")", $y[1]);

            $rHash = $w[0];
            $rKey = $y[0] . '.' . $z[0];
            $rCost = ($rHash / $rKey);
            $rMsg = $x[0];

            $decoded = eaAuth_Yasdecrypt($rMsg, $rCost);

            return $decoded;

        }


    }

}
