<?php 
require 'lib/utils.php';
include 'partials/top.php';


echo '<h1>Inventory Manager</h1>';


$db = connectToDB();
consoleLog($db);

//$query = 'SELECT * FROM items';
$query = 'SELECT items.name        as iname,
                 items.id          as iid,
                 items.description as idesc,
                 categories.id     as ccode,
                 categories.name   as cname

                 
             FROM items
             Join categories on items.category = categories.id
             
             ORDER BY categories.id ASC';


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
    echo '<h4>';
    echo  $item['iname'];
    echo '<p>
    
    </p>';
    echo  $item['cname'];
    echo  '<a class="name" href="category.php?code=' . $item['ccode'] . '">see category</a>';
    echo '</h4>';





    echo '<p>';
    echo  $item ['idesc'];
    echo '</p>';

    echo  '<a class="name" href="delete-item.php?id=' . $item['iid'] . '">Delete item🗑</a>';

    echo '</li>';
}

echo'</ul>';

echo '<div id="add-button-item"><a href="form-item.php">
     Add item
     </a>
    </div>';

echo '<div id="add-button-category"><a href="form-category.php">
    Add category
    </a>
   </div>';

   echo '<div id="delete-button"><a href="delete-category.php">
   Delete category
   </a>
  </div>';

include 'partials/bottom.php' ?>