<?php
// ----------------------------------------------------------------------------------------
/* Pokédex
 * 
*/
// ----------------------------------------------------------------------------------------

/**
 * paramètres de configuration de l'application
 */

// gestion d'erreur 
ini_set('error_reporting', E_ALL);      // en phase de développement
//ini_set('error_reporting', 0);        // en phase de production 

// constantes pour l'accès à la base de données

// Serveur MySql
define('DB_SERVER', 'localhost');
// Nom de la base de données
define('DB_DATABASE', 'db652418676');
// Nom d'utilisateur pour se connecter à la base de données
define('DB_USER', 'root');
// Mot de passe pour se connecter à la base de données
define('DB_PWD', '');

// La dsn en entier
define('DSN', 'mysql:dbname='.DB_DATABASE.';host='.DB_SERVER);

// PDO
define ('PDO_EXCEPTION_VALUE',-99);

// constantes utilisées par l'application
define ('ERROR', 0);
define ('WARNING', 1);
define ('INFO', 2);
define ('SUCCESS', 2);

define ('DEFAULT_IMG', '0.jpg');             // image par défaut
define ('NOT_FOUND_IMAGE', 'img/0.jpg');     // chemin d'accès vers l'image par défaut