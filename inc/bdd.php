<?php
require_once 'bdd.php';

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=*****', '*****', '*****', $pdo_options);
    $bdd->exec("set names utf8");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
