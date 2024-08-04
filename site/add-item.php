<?php
require 'lib/utils.php';
include 'partials/top.php';
 
 
echo '<h1>Adding item to Database...</h1>';
 
consoleLog($_POST, 'POST Data');
 
$name        = $_POST['name'];
$description = $_POST['description'];
$category    = $_POST['category']


echo '<p>Name: '          . $name;
echo '<p>Description: '   . $description;
echo '<p>Category: '      . $category;
 

$db = connectToDB();
 
$query = 'INSERT INTO items
          (name, description, category)
          VALUES (?,?,?)';
 
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id, $name, $description]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Item Add', ERROR);
    die('There was an error adding data to the database');
}
 
echo '<p>Success</p>';
 
include 'partials/bottom.php';
 
?>