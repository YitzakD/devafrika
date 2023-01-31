<?php
/**
 * DEV
 * 
 * @DEV by YD
 * app.inc:        app variable for app needles db informations
 */


if(eaAuth_getsession('userid')) {
    
    /**#    VAR_ucr: User Credentials    => récupératon des informations privées de l'utilisateur en session */
    $VAR_ucr = eaFindone('users', 'ID', eaAuth_getsession('userid'));
    


    /**#    VAR_ful & VAR_lful: Uploaded Files Limits */
    $VAR_ful = 10000000;
    $VAR_lful = 25000000;


    /**#    VAR_ift & VAR_amft: Uploaded Meida Files Types */
    $VAR_ift = ['image/jpeg', 'image/png', 'image/gif'];
    $VAR_amft = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/webm', 'video/ogg'];


    /**#    VAR_ppfldr, VAR_tfldr, VAR_tkfldr & VAR_afldr: authorized Cloud User Folders */
    $VAR_ppfldr = eaAuth_getsession('userid') . '/pp/';
    $VAR_tfldr = eaAuth_getsession('userid') . '/t/';
    $VAR_afldr = eaAuth_getsession('userid') . '/aw/';
    $VAR_tkfldr = eaAuth_getsession('userid') . '/tk/';









    /**#    VAR_mhtf:   Tableau des pages qui utilisent les fonction nécéssaires aux thèmes */
    $VAR_mhtf = [
        "thèmes de catégories",
        "studio à thème",
        "thème",
        "profil"
    ];


    /**#    VAR_mhacf:  Tableau des pages qui utilisent les fonction nécéssaires à la modification de profil */
    $VAR_mhacf = [
        "compte utilisateur",
        "profil"
    ];


    /**#    VAR_mhawf:  Tableau des pages qui utilisent les fonction nécéssaires aux artworks */
    $VAR_mhawf = [
        "artwork",
        "studio d'artwork",
        "accueil",
        "profil",
        "thème"
    ];

}
