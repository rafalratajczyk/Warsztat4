<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 21.06.17
 * Time: 16:45
 */
try {
    $conn = new PDO('mysql:host=localhost;dbname=shop', 'pawel', 'test');
} catch (PDOException $e) {
    die("Can't connect to database".$e->getMessage());
}