<?php
/**
 * DEV
 * 
 * @DEV by YD
 * global.func:  load all global used functions
 */

use Carbon\Carbon;




/**
 *     eaDump
 *    permet de faire un var dump à l'intérieur d'une balise <PRE> pour mieux identifier le résultat
 */
if(!function_exists('eaDump')) {

    function eaDump($val)
    {

        echo "<code>";

            echo "<pre>";

                var_dump($val);

            echo "</pre>";
        
        echo "</code>";

    }
    
}




/**
 *     eaTitle($key)
 *    $key => url param
 *    permet d'assigner le titre de la page chargée automatiquement
 *    retourne $key (la première lettre en majuscule)
 */
if(!function_exists('eaTitle')) {

    function eaTitle($key)
    {
        
        return ucfirst($key);    

    }

}




/**
 *     eaRandomcolor
 *    permet de créer une couleur aléatoire à la volée
 *    retourne une couleur en mode rgba() 
 */
if(!function_exists('eaRandomcolor')) {

    function eaRandomcolor()
    {
     
        return sprintf("%02X%02X%02X", mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
     
    }

    function eaGetavatarurl($email) {

        $address = strtolower(trim($email));

        $hash = md5($address);

        return 'https://www.gravatar.com/avatar/' . $hash;
    
    }

}




/**
 *     eaSetflashtoast($message, $type)
 *    $message => string; $type[ifo, success, danger, warning, light, dark, priary, secondary]
 *    permet de créer et de gérer le système de notification flash
 */
if(!function_exists('eaSetflashtoast')) {

    function eaSetflashtoast($message, $type = 'info')
    {
     
        $_SESSION['toast']['msg'] = $message;

        $_SESSION['toast']['type'] = $type;
     
    }

}




/**
 *  eaSaveactivity($id, $type, details)
 *  $message => string; $type[ifo, success, danger, warning, light, dark, priary, secondary]
 *  permet de créer et de gérer le système de notification flash
 */
if(!function_exists('eaSaveactivity')) {

    function eaSaveactivity($id, $type, $details = '')
    {
     
        global $db;

        $q = $db->prepare("INSERT INTO useractivities(uID,activitytype,activitydetails,created) VALUES(:uID, :activitytype, :activitydetails, :created)");

        $q->execute(
            [
            'uID' => $id,
            'activitytype' => $type,
            'activitydetails' => $details,
            'created' => date('Y-m-d H:i:s')
            ]
        );

        if($q) {

            $q->closeCursor();
            return true;
            
        } else {

            return false;

        }
     
    }

    function eaPushnotification($nfrom, $nto, $ntype, $ntitle, $nbody, $nlink)
    {
     
        global $db;

        $q = $db->prepare("INSERT INTO notifications(nfrom,nto,ntype,ntitle,nbody,nlink,nstate,created) VALUES(:nfrom, :nto, :ntype, :ntitle, :nbody, :nlink, :nstate, :created)");

        $q->execute(
            [
            'nfrom' => $nfrom,
            'nto' => $nto,
            'ntype' => $ntype,
            'ntitle' => $ntitle,
            'nbody' => $nbody,
            'nlink' => $nlink,
            'nstate' => 0,
            'created' => date('Y-m-d H:i:s')
            ]
        );

        if($q) {

            $q->closeCursor();
            return true;
            
        } else {

            return false;

        }
     
    }

}




/**
 *     eaHashgenerator($qte, $type)
 *    $qte => int; $type [ANSC, AN-0, AN-1, A-0, A-1, A-2, N, NSC]
 *    permet de créer un hash former de x entité
 *    retourne $hash
 */
if(!function_exists('eaHashgenerator')) {

    function eaHashgenerator($qte, $type)
    {

        if($type === "ANSC") {

            $caracteres = "ABCDEFGHIJKLMOPQRSTUVXWYZabcdefghijklmnopqrstuvwxyz0123456789!&~-_%";
        
        } elseif($type === "AN-0") {

            $caracteres = "ABCDEFGHIJKLMOPQRSTUVXWYZabcdefghijklmnopqrstuvwxyz0123456789";

        } elseif($type === "AN-1") {

            $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";

        } elseif($type === "AN-2") {

            $caracteres = "ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789";

        } elseif($type === "A-0") {

            $caracteres = "ABCDEFGHIJKLMOPQRSTUVXWYZabcdefghijklmnopqrstuvwxyz";

        } elseif($type ==="A-1") {

            $caracteres = "ABCDEFGHIJKLMOPQRSTUVXWYZ";

        } elseif($type ==="A-2") {

            $caracteres = "abcdefghijklmnopqrstuvwxyz";

        } elseif($type === "N") {

            $caracteres = "0123456789";

        } else {

            $caracteres = "0123456789!&~-_%";

        }

        $quantidadeCaracteres = strlen($caracteres);

        $quantidadeCaracteres--;


        $hash = null;

        for ($x = 1; $x <= $qte; $x++) {

            $posicao = rand(0, $quantidadeCaracteres);

            $hash .= substr($caracteres, $posicao, 1);

        }

        return $hash;

    }

}




/**
 *    e($string)
 *    $string => string
 *    échape les valeurs entrées par les utilisateurs afin d'eviter certaines attaques basiques
 *    retourne $string
 */
if(!function_exists('e')) {

    function e($string)
    {

        if($string) {

            return htmlspecialchars(strip_tags($string));

        }

    }

    function eaE($string) {

        $hp = array('à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý');
        
        $nd = array('a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','yý','y','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y');
       
        return str_replace($hp, $nd, $string);

    }

    //  eaReadmore function -> Permet de moceler un text en affichant un liens lre la suite
    function eaReadmore($long_text, $limit = 6){

        $words = explode(" ",$long_text);

        if(count($words) > $limit) {
            
            $readmore = implode(" ", array_splice($words, 0, $limit));
            if($limit >= 6) {
                $readmore .= "...";
            }

        } else { $readmore = implode(" ", $words); }

        return $readmore;

    }

}




/**
 *  eaFileUpload($target, $file)
 *  $target => string; $file
 *  permet d'upload automatique ment un fichier
 *  retourn fext => file extension
 *  retourn filename => nom du fichier
 *  retourn filehash => nom hash du fichier
 *  retourn filedir => dossier de sauvegarde
 */
if(!function_exists('eaFileUpload')) {

    function eaFileUpload($target, $file, $file_tmp, $limit = '', $file_size = '')
    {

        $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        $unicFilename = eaHashgenerator(14, 'N');
        $file = $unicFilename . '.' . $fileExt;
        $targetfile = $target . $file;

        if($fileExt === "jpeg") {

            $fext = "1";

        } 
        elseif($fileExt === "png") {

            $fext = "2";

        }
        elseif($fileExt === "gif") {

            $fext = "3";

        }
        elseif($fileExt === "jpg") {

            $fext = "4";

        }

        $uploaded = 1;
        $checked = getimagesize($file_tmp);
                        
        if($checked == false) {

            $uploaded = 0;

        }

        if(file_exists($targetfile)) {

            $uploaded = 0;

        }

        if(($file_size !== '' && $limit !== '') && ($file_size > $limit)) {

            $uploaded = 0;

        }

        if($uploaded = 1) {

            if($fileExt === "jpg" || $fileExt === "png" || $fileExt === "jpeg" || $fileExt === "gif") {
                
                return ['fext' => $fext, 'filename' => $file, 'filehash' => $unicFilename, 'filedir' => $targetfile];

            }

        } else {

            return false;

        }
     
    }

}




/**
 *     eaRedirect($page)
 *    $page => url
 *    permet de faire une redirection simple
 *    redirige vers $page
 */
if(!function_exists('eaRedirect')) {

    function eaRedirect($page)
    {
        
        header('Location: ' . $page);exit();

    }



    function eaForceredirect($page)
    {

        echo '<SCRIPT>document.location.href="' . $page . '"</SCRIPT>';

    }

}




/**
 *  eaTranscodeit($string)
 *  $string => text
 *  permet de transformer toutes les urls détecté dans le texte ne lien cliquable
 */
if(!function_exists('eaTranscodeit')) {

    function eaTranscodeit($string)
    {

        $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

        
        if(preg_match_all($reg_exUrl, $string, $url)) {

            foreach($url[0] as $newLinks) {

                if(strstr($newLinks, ":") === false){ $link = 'http://'.$newLinks; } else{ $link = $newLinks; }

                $search  = $newLinks;
                $replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$link.'</a>';
                $string = str_replace($search, $replace, $string);

            }

        }

        return $string;

    }

}




/**
 *    eaSetTimeAgo($date)
 *    $date => all date format
 *    gère les formats date pour les hommes
 */
if(!function_exists('eaSetTimeAgo')) {

    function eaSetTimeAgo($date)
    {

        $new_date = Carbon::parse($date)->locale('fr_FR');  
        
        return $new_date->diffForHumans();
     
    }

}




/**
 *  eaGetinput($key)
 *  $key => string
 *  permet de retourner la valeur de la clé sauver dans en SESSION en cas d'erreurs
 *  retourne $key (sauvé e session), sinon retourne 'null'
 */
if(!function_exists('eaGetinput')) {

    function eaGetinput($key)
    {

        if(!empty($_SESSION['input'][$key])) {

            return e($_SESSION['input'][$key]);

        } else {

            return null;

        }

    }

}




/**
 *  eaNotempty($field)
 *  $fields => array
 *  permet de vérifier si un tableau de variable n'est pas vide
 *  retourne 'True' si le tableau de valeur n'est pas vide, et 'false' si ce le tableau de valeur  est vide
 */
if(!function_exists('eaNotempty')) {

    // Version globale
    function eaNotempty($fields = [])
    {

        if(count($fields) != 0) {

            foreach($fields as $field) {

                if(empty($_POST[$field]) || trim($_POST[$field]) == "") {

                    return false;

                }

            }

            return true;

        }

    }

    // Version adaptée aux checkbox   
    function eaNnotempty__($fields = [])
    {

        if(count($fields) != 0) {

            foreach($fields as $field) {

                if(empty($_POST[$field])) {

                    return false;

                }

            }

            return true;

        }

    }

}




/**
 *    eaObjectconverter($date)
 *    $data => array in objects format
 *    gère la conversion d'un tableau objet en tableau multidimenionnel
 */
if(!function_exists('eaObjectconverter')) {

    function eaObjectconverter($data) 
    {

        if(is_object($data)) { $data = get_object_vars($data); }

        if(is_array($data)) {

            return array_map(__FUNCTION__, $data);

        } else {

            return $data;

        }

    }

    function eaConvertintosimplearray($data) {

        $data = array_map('implode', $data, array_fill(0, count($data), '|'));

        $data = array_unique($data);

        $data = array_map('explode', array_fill(0, count($data), '|'), $data);

        $data = array_map('current', $data);

        $data = implode(',', array_map('intval', $data));

        return $data;

    }

}




/**
 *  eaIsalreadyuse($table, $field, $key, $additional = "")
 *  $table => string (nom de la table); $field => string (la colone de rechercher); $key => string (la valeur à rechercher); $additional => string (Autre)
 *  permet de vérifier l'unicité | l'existence d'une variable dans la BDD
 *  retourne $count (Compte du nombre de fois que la fonction est vérifiée)
 */
if(!function_exists('eaIsalreadyuse')) {

    function eaIsalreadyuse($table, $field, $key, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ? $additional");

        $q->execute([$key]);

        $count = $q->rowCount();

        $q->closeCursor();

        return $count;

    }

}




/**
 *  eaSaveinputs()
 *  permet de sauver en SESSION les varibles saisies par les utilisateurs en cas d'erreurs
 */
if(!function_exists('eaSaveinputs')) {

    function eaSaveinputs()
    {

        foreach($_POST as $key => $value) {

            if(strpos($key, 'password') === false) {

                $_SESSION['input'][$key] = $value;

            }

        }

    }

}




/**
 *  eaClearinputs()
 *  permet d'éffacer les variables sauvées en SESSION par la fonction ex_saveinputs()
 */
if(!function_exists('eaClearinputs')) {

    function eaClearinputs()
    {

        if(isset($_SESSION['input'])) {

            $_SESSION['input'] = [];

        }

    }

}




/**
 *  eaFindall($table, $additional = "")
 *  $table => string (nom de la table); $additional => string (Autre)
 *  permet de recuperer toutes les lignes enregistrées en fonction d'un paramètre donné
 *  retourn $data (tableau associatif)
 */
if(!function_exists('eaFindall')) {
    
    function eaFindall($table, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT * FROM $table $additional");

        $q->execute();

        $data = $q->fetchAll(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

    // Version adaptée à la selection distincte
    function eaFindallDistinct($table, $field, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT DISTINCT $field FROM $table $additional");

        $q->execute();

        $data = $q->fetchAll(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

}




/**
 *  eaFindone($table, $field, $key, $additional = "")
 *  $table => string (nom de la table); $field => string (la colone de rechercher); $key => string (la valeur à rechercher); $additional => string (Autre)
 *  permet de recuperer toutes les lignes enregistrées en fonction d'un paramètre donné
 *  retourn $data (tableau associatif)
 */
if(!function_exists('eaFindone')) {

    function eaFindone($table, $field, $key, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT * FROM $table WHERE $field = ? $additional");

        $q->execute([$key]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

    // récupère le dernier enregistrement
    if(!function_exists('eaFindlast')) {

        function eaFindlast($table, $additional = "ORDER BY ID DESC LIMIT 1")
        {

            global $db;

            $q = $db->prepare("SELECT * FROM $table $additional");

            $q->execute();

            $data = $q->fetch(PDO::FETCH_OBJ);

            $q->closeCursor();

            return $data;

        }

    }

    // récupère le dernier enregistrement d'un 
    if(!function_exists('eaFindlastofthings')) {

        function eaFindlastofthings($table, $field, $key, $LIMIT)
        {

            global $db;

            $q = $db->prepare("SELECT * FROM $table WHERE $field = ? $LIMIT");

            $q->execute([$key]);

            $data = $q->fetch(PDO::FETCH_OBJ);

            $q->closeCursor();

            return $data;

        }

    }

}




/**
 *  eaCountall($table, $additional = "")
 *  $table => string (nom de la table); $additional => string (Autre)
 *  permet de recuperer le nombre d'enregistrements trouvés d'un paramètre donné
 */
if(!function_exists('eaCountall')) {

    function eaCountall($table, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT * FROM $table $additional");

        $q->execute();

        return $q->rowCount();

    }
}




/**
 *  eaCellcount($table, $field, $key, $additional = "")
 *  $table => string (nom de la table); $field => string (la colone de rechercher); $key => string (la valeur à rechercher); $additional => string (Autre)
 *  permet de recuperer le nombre d'enregistrements trouvés en fonction d'un paramètre donné
 *  retourn $data (tableau associatif)
 */
if(!function_exists('eaCellcount')) {

    function eaCellcount($table, $field, $key, $additional = "")
    {

        global $db;

        $q = $db->prepare("SELECT * FROM $table WHERE $field = ? $additional");

        $q->execute([$key]);

        return $q->rowCount();

    }

}




/**
 *  eaUpdateone($table, $field, $value, $key)
 *  $table => string (nom de la table); $field => string (la colone de rechercher); $value => string (la valeur à rechercher); $key => int
 *  permet de mettre à jour une ligne
 */
if(!function_exists('eaUpdateone')) {

    // Version relatif à l'ID
    function eaUpdateone($table, $field, $value, $key)
    {

        global $db;

        $q = $db->prepare("UPDATE $table SET $field=? WHERE ID = ? ");

        $q->execute([$value, $key]);

        $q->closeCursor();

    }

    // Version globale et evasif
    function eaUpdateall($table, $field, $value, $additional = "")
    {

        global $db;

        $q = $db->prepare("UPDATE $table SET $field = ? $additional");

        $q->execute([$value]);

        $q->closeCursor();

    }

}




/**
 *  eaDeleteone($table, $field, $key)
 *  $table => string (nom de la table); $field => string (la colone de rechercher); $key => int
 *  permet d'effacer un enregistrement donné
 */
if(!function_exists('eaDeleteone')) {

    // Version relatif à l'ID
    function eaDeleteone($table, $field, $key)
    {

        global $db;

        $q = $db->prepare("DELETE FROM $table WHERE $field = ? ");

        $q->execute([$key]);

        $q->closeCursor();

    }

    // Version globale et evasif
    function eaDeleteall($table, $field, $key)
    {

        global $db;

        $q = $db->prepare("DELETE FROM $table WHERE $field = ? ");

        $q->execute([$key]);

        $q->closeCursor();

    }

}




/**
 *  eaSlug($value)
 *  permet de créer un slug
 */
if(!function_exists('eaSlug')) {
    function eaSlug($value)
    {

        $value = trim($value);
        $a = preg_replace('%([\']+)%', '-', $value);
        $b = str_replace('à', 'a', $a);
        $c = str_replace('â', 'a', $b);
        $d = str_replace('ô', 'o', $c);
        $e = str_replace('ï', 'i', $d);
        $f = str_replace('î', 'i', $e);
        $g = str_replace('ü', 'u', $f);
        $h = str_replace('û', 'u', $g);
        $i = str_replace('è%', 'e', $h);
        $j = str_replace('é', 'e', $i);
        $k = str_replace('ç', 'c', $j);
        $l = str_replace('ù', 'u', $k);
        $m = str_replace('&', 'et', $l);
        $n = str_replace('œ', 'oe', $m);
        $o = preg_replace('%([(,\;!\?\.\:)]+)%', '', $n);
        $p = trim($o);
        $q = str_replace(' ', '-', $p);

        return strtolower($q);

    }

}




/**
 *  eaInarray($needle, $needle_field, $haystack, $strict = false)
 *  $needle => string (valeur à comparer); $needle_field => string (nom de la valeur); $haystack => var
 *  recherche l'existence dans un tableaux pluridimensionnel
 */
if(!function_exists('eaInarray')) {

    function eaInarray($needle, $needle_field, $haystack, $strict = false)
    {

        if($strict) {
            
            foreach($haystack as $item) {

                if(isset($item->$needle_field) && $item->$needle_field === $needle) {

                    return true;

                }

            }

        } else {

            foreach($haystack as $item) {

                if(isset($item->$needle_field) && $item->$needle_field == $needle) {

                    return true;

                }

            }

        }

        return false;

    }

}




/**
 *  eaNextElement($array, $currentKey)
 *  $array => array; $currentKey => string
 *  permet d'avancer ou de réculer en fonction d'un résultat
 */
if(!function_exists('eaNextElement')) {

    function eaNextElement(array $array, $currentKey)
    {

        if (!isset($array[$currentKey])) { return false; 
        }

        $nextElement = false;

        foreach ($array as $key => $item) {

            $nextElement = next($array);

            if ($key == $currentKey) {
                
                break;

            }

        }

        return $nextElement;

    }

    function eaPrevElement(array $array, $currentKey)
    {

        if (!isset($array[$currentKey])) { return false; 
        }
        
        end($array);
        
        do {
            
            $key = array_search(current($array), $array);
            
            $prevElement = prev($array);
        
        }
        
        while($key != $currentKey);

        return $prevElement;

    }

}




/**
 *  eaGetTimeago($time)
 *  $time => datetime (heure ou date convertie en heure)
 *  permet ad'fficher le temps écoulé
 */
if(!function_exists('eaGetTimeago')) {

    function eaGetTimeago($time)
    {

        $time_difference = time() - $time;
     
        if($time_difference < 1 ) {

            return 'il y a un instant';

        }

        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'an',
                    30 * 24 * 60 * 60       =>  'mois',
                    24 * 60 * 60            =>  'jour',
                    60 * 60                 =>  'heure',
                    60                      =>  'minute',
                    1                       =>  'seconde'
        );
     
        foreach($condition as $secs => $str) {
        
            $d = $time_difference / $secs;
     
            if($d >= 1 ) {

                $t = round($d);
                
                return 'il y a ' . $t . ' ' . ($str != 'mois' ? $str  . ($t > 1 ? 's' : '') : $str);
            
            }

        }

    }


    function date_to_fr($date) {

        #*  Passage des jours de la semaine de l'anglais au français  #
        
        $date = str_replace ("Monday", "Lundi", $date);
        $date = str_replace ("Tuesday", "Mardi", $date);
        $date = str_replace ("Wednesday", "Mercredi", $date);
        $date = str_replace ("Thursday", "Jeudi", $date);
        $date = str_replace ("Friday", "Vendredi", $date);
        $date = str_replace ("Saturday", "Samedi", $date);
        $date = str_replace ("Sunday", "Dimache", $date);

        $date = str_replace ("Mon", "Lun", $date);
        $date = str_replace ("Tue", "Mar", $date);
        $date = str_replace ("Wed", "Mer", $date);
        $date = str_replace ("Thur", "Jeu", $date);
        $date = str_replace ("Fri", "Ven", $date);
        $date = str_replace ("Sat", "Sam", $date);
        $date = str_replace ("Sun", "Dim", $date);



        #*  Passage des mois de l'année de l'anglais au français  #
        
        $date = str_replace ("January", "Janvier", $date);
        $date = str_replace ("February", "Février", $date);
        $date = str_replace ("March", "Mars", $date);
        $date = str_replace ("April", "Avril", $date);
        $date = str_replace ("May", "Mai", $date);
        $date = str_replace ("June", "Juin", $date);
        $date = str_replace ("July", "Juillet", $date);
        $date = str_replace ("August", "Août", $date);
        $date = str_replace ("September", "Septembre", $date);
        $date = str_replace ("October", "Octobre", $date);
        $date = str_replace ("November","Novembre" , $date);
        $date = str_replace ("December", "Décembre", $date);

        $date = str_replace ("Jan", "Jan", $date);
        $date = str_replace ("Feb", "Fév", $date);
        $date = str_replace ("Mar", "Mars", $date);
        $date = str_replace ("Apr", "Avr", $date);
        $date = str_replace ("May", "Mai", $date);
        $date = str_replace ("Jun", "Juin", $date);
        $date = str_replace ("Jul", "Juil", $date);
        $date = str_replace ("Aug", "Août", $date);
        $date = str_replace ("Sep", "Sep", $date);
        $date = str_replace ("Oct", "Oct", $date);
        $date = str_replace ("Nov","Nov" , $date);
        $date = str_replace ("Dec", "Déc", $date);

        return ($date);
    }

    function eaDatevalidator($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
   
}




/**
 *  eaGetrealnumber($num)
 *  $num => int (un compteur, un nombre)
 *  permet d'afficher les nombre de façon élégantes
 */
if(!function_exists('eaGetrealnumber')) {

    function eaGetrealnumber($num)
    {

        $ber = number_format($num, 0, '', '.');
        $n = explode(".", $ber);
        $r = $n[0];
        

        if(count($n) > 1 && count($n) < 3) {

            if($n[1][0] > "0") {

                $d = $n[1][0];
                
                return $r . "," . $d . "k"; 

            } else {

                return $r . "k";

            }

        } elseif(count($n) > 2 && count($n) < 4) {

            if($n[1][0] > "0") {

                $d = $n[1][0];
                
                return $r . "," . $d . "m"; 

            } else {

                return $r . "m";

            }

        } elseif(count($n) > 3 && count($n) < 5) {

            if($n[1][0] > "0") {

                $d = $n[1][0];
                
                return $r . "," . $d . "t"; 

            } else {

                return $r . "t";

            }

        } else {

            return $r;

        }

    }
   
}




/**
 *  eaWeblinkvalide($webinnk)
 *  $weblink => var (un lien)
 *  permet de vérifier qu'un lien entrer est valide
 */
if(!function_exists('eaWeblinkvalide')) {

    function eaWeblinkvalide($weblink)
    {

        /*$param = explode("/", $weblink);

        if(!preg_match('%https?:%', $param[0])) {
            
            return true;
            
        } else {

            if(preg_match('%localhost%', $param[2])) {

                if(preg_match('%\.([a-zA-Z0-9-_\.\/\?=&]+)%', $param[3], $matches)) {

                    return false;

                }
            
            } elseif(preg_match('%\.([a-zA-Z0-9-_\.\/\?=&]+)%', $param[2], $matches)) {
                
                return false;

            } else {

                return true;
                
            }

        }*/

        //  if(filter_var($weblink, FILTER_VALIDATE_URL)) { return true; } else { return false;}

        return preg_match('%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu', $weblink);
        
    }

}




/**
 *  eaPaginate($url, $link, $total, $current, $adj = 3)
 *  $url => var (un lien) ; $link char (/) ; $total var ; $curent var
 *  permet de paginer le contenu
 */
if(!function_exists('eaPaginate')) {

    function eaPaginate($url, $link, $total, $current, $adj = 3) {
            
        $prev = $current - 1;
        
        $next = $current + 1;
        
        $penultimate = $total - 1;
        
        $pagination = '';

        if($total > 1) {

            $pagination .= "<nav aria-label=\"pagination\">";

            $pagination .= "<ul class=\"pagination\">";

            if($current == 2) {

                $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}\"><i class=\"fas fa-angle-left\"></i> Prec</a>";
            
            } elseif ($current > 2) {
                
                $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$prev}\"><i class=\"fas fa-angle-left\"></i> Prec</a>";

            } else {

                $pagination .= "";

            }


            if($total < 7 + ($adj * 2)) {

                $pagination .= ($current == 1) ? "<li class=\"page-item active\"><span class=\"page-link\">1</span></li>" : "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}\">1</a></li>";

                for($i = 2; $i <= $total; $i++) {

                    if ($i == $current) {

                        $pagination .= "<li class=\"page-item active\"><span class=\"page-link\">{$i}</span></li>";

                    } else {

                        $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$i}\">{$i}</a></li>";

                    }

                }

            } else {

                if($current < 2 + ($adj * 2)) {

                    $pagination .= ($current == 1) ? "<li class=\"page-item active\"><span class=\"page-link\">1</span></li>" : "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}\">1</a></li>";

                    for($i = 2; $i < 4 + ($adj * 2); $i++) {

                        if ($i == $current) {

                            $pagination .= "<li class=\"page-item active\"><span class=\"page-link\">{$i}</span></li>";

                        } else {

                            $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$i}\">{$i}</a></li>";

                        }

                    }

                    $pagination .= "...";
                    
                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$penultimate}\">{$penultimate}</a></li>";
                    
                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$total}\">{$total}</a></li>";

                } elseif((($adj * 2) + 1 < $current) && ($current < $total - ($adj * 2))) {

                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}\">1</a></li>";
                    
                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}2\">2</a></li>";
                    
                    $pagination .= "...";

                    for($i = $current - $adj; $i <= $current + $adj; $i++) {

                        if ($i == $current) {
                            
                            $pagination .= "<li class=\"page-item active\"><span class=\"page-link\">{$i}</span></li>";

                        } else {
                            
                            $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$i}\">{$i}</a></li>";

                        }

                    }

                    $pagination .= "...";
                    
                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$penultimate}\">{$penultimate}</a></li>";
                    
                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$total}\">{$total}</a></li>";

                } else {

                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}\">1</a></li>";

                    $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}2\">2</a></li>";

                    $pagination .= "...";

                    for($i = $total - (2 + ($adj * 2)); $i <= $total; $i++) {

                        if ($i == $current) {
                            
                            $pagination .= "<li class=\"page-item active\"><span class=\"page-link\">{$i}</span></li>";

                        } else {
                            
                            $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$i}\">{$i}</a></li>";

                        }

                    }

                }

            }


            if($current == $total) {

                $pagination .= "";

            } else {

                $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}{$link}{$next}\">Suiv <i class=\"fas fa-angle-right\"></i></a></li>\n";
            
            }

            $pagination .= "</ul>";
            
            $pagination .= "</nav>";

        }

        return ($pagination);

    }

}