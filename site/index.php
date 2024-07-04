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

//see what we got back
consoleLog($items);

echo '<ul id="item-list">';

foreach($items as $item) {
    echo '<li>';
    echo '<p> </p>';



    echo '<a href = "company.php?code=' . $item['name'] . '">';
    echo   $item['name'];
    echo '</a>';


    echo '<a href="$' . $item['description'] . '">';
    echo  $item ['description'];
    echo  '</a>';

    echo '</li>';
}

echo'</ul>';

echo '<div id="add-button"><a href="form-item.php">
     Add item
     </a>
    </div>';

include 'partials/bottom.php' ?>