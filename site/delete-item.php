<?php
require_once 'lib/utils.php';

$itemId =   $_GET['id'] ?? " ";

$db = connectToDB();


$query =  'DELETE from items where id =?';


try{
    $stmt = $db->prepare($query);
    $stmt->execute([$itemId]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Delete Fetch', ERROR);
  die('There was an error getting data from the database');
}

//echo '<a href=”delete-task.php?id=’ .$id . ’';
//echo "onclick="; return confirm('Are you sure?');">Delete</a>";

?>