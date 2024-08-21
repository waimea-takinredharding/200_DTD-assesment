<?php
require 'lib/utils.php';
include 'partials/top.php';

$ccode = $_GET['code'] ?? ' ';

//SQl we need to get the category info
// SELECT * FROM companies WHERE code = XXX

$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM categories WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$ccode]);
    $category = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Category Fetch', ERROR);
    die('There was an error getting category data from the database');
}

if ($category == false) die('unknown category: ' . $ccode);

echo $category['name'];





$query = 'SELECT * FROM items WHERE category = ?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$ccode]);
    $items = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Item Fetch', ERROR);
    die('There was an error getting item data from the database');
}

//------------------------------------
echo '<div id="items">';
echo '<h3>items</h3>';

if ($category == false) {
   // No records found
   echo 'None';
}
else {
    //list item records
    echo '<ul id="item- list">';
  foreach($items as $item) {
    echo '<li>';
    echo   $item['name'];
    echo '</li>';
  }
}

//see what we got back
consoleLog($items);

include 'partials/bottom.php';