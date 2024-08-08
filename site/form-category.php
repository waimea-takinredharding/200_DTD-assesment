<?php 
require 'lib/utils.php';
include 'partials/top.php';

$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM categories ORDER BY name ASC';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
?>


<h1>New Item</h1>


<form method="post" action="add-category.php">



   <label>Name</label> 
   <input name="name" type="text" required>

   <label>Description</label>
   <input name="desc" type="text" required>


<input type="submit">
<?php
include 'partials/bottom.php';
?>