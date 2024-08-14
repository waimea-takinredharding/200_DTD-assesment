<?php
require_once 'lib/utils.php';

$db = connectToDB();

$itemId =   $_GET['id'] ?? " ";


$query =  'DELETE from categories where id =?';


try{
    $stmt = $db->prepare($query);
    $stmt->execute([$itemId]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
  die('There was an error getting data from the database');
}

//echo '<a href=”delete-task.php?id=’ .$id . ’';
//echo "onclick="; return confirm(`Are you sure?`);">Delete</a>";

header('location: index.php')
?>