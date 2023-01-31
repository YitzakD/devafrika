<?php
/**
 * DEV
 * 
 * @DEV by YD
 * db.config:    Database - database connect
 */

date_default_timezone_set('Africa/Abidjan');

try {

    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Erreur : " . $e->getMessage());

}