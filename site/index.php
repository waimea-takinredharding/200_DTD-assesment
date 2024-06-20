<?php 
require 'lib/utils.php';
include 'partials/top.php';


echo '<h1>Inventory Manager</h1>';



$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM items';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $items = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

include 'partials/bottom.php' ?>