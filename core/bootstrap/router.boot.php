<?php
/**
 * DEV
 * 
 * @DEV by YD
 * constants:    define all env constants
 */

require VEND . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$router = new AltoRouter();


/**
 * WEB PART
 */

$router->map(
    'GET|POST', '/', function () {

        include WEB . '/homeController.php';

    }, 'accueil'
);

$router->map(
    'GET|POST', '/a-propos', function () {

        include WEB . '/aboutController.php';

    }, 'à propos'
);

$router->map(
    'GET|POST', '/nos-services', function () {

        include WEB . '/servicesController.php';

    }, 'nos services'
);

$router->map(
    'GET|POST', '/contact', function () {

        include WEB . '/helpsController.php';

    }, 'contact'
);





/*
 * OTHER PART 
 */

$router->map(
    'GET', '/404', function () {

        include ERR_RS . '/404Controller.php';

    }, 'page non disponible'
);





/**
 *    VAR_authappentriesname
 *    tableau contenant les nom des pages sans menu
 */
$VAR_authappentriesname = array(
    'manageur', 
    'deconnexion',
    'page non disponible'
);
