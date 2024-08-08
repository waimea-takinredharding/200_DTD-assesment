<?php
require 'lib/utils.php';
include 'partials/top.php';
 
 
echo '<h1>Adding Category to Database...</h1>';
 
consoleLog($_POST, 'POST Data');
 
$name    = $_POST['name'];
$description = $_POST['description'];
 
echo '<p>Name: '           . $name;
echo '<p>Description: '    . $description;
 
$db = connectToDB();
 
$query = 'INSERT INTO companies
          (name, description)
          VALUES (?,?,?)';
 
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $description]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Category Add', ERROR);
    die('There was an error adding data to the database');
}
 
echo '<p>Success!!!</p>';
 
include 'partials/bottom.php';
 
?>