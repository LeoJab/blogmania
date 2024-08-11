<?php
require_once(__dir__ . '/config.php');

try {
    $mysqlClient = new \PDO($dns, $user, $password);
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur :' . $e->getMessage());
}