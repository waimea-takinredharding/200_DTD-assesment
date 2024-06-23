<?php 
require 'lib/utils.php';
include 'partials/top.php';


echo '<p>Inventory Manager</p>';



$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM categories';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
