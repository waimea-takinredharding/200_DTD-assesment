<?php
require '_functions.php';
include 'partials/top.php';

$companyCode = $_GET['code'] ?? ' ';

//SQl we need to get the comapny info
// SELECT * FROM companies WHERE code = XXX

$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM companies WHERE code = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$companyCode]);
    $company = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Category Fetch', ERROR);
    die('There was an error getting category data from the database');
}

if ($company == false) die('unknown company : ' . $companyCode);

echo $company['name'];





$query = 'SELECT * FROM games WHERE company = ?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$companyCode]);
    $games = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Game Fetch', ERROR);
    die('There was an error getting game data from the database');
}

//------------------------------------
echo '<div id="games">';
echo '<h3>Games</h3>';

if ($company == false) {
   // No records found
   echo 'None';
}
else {
    //list game records
    echo '<ul id="game- list">';
  foreach($games as $game) {
    echo '<li>';
    echo   $game['name'];
    echo '</li>';
  }
}

//see what we got back
consoleLog($games);

//----------------------------------

$query = 'SELECT * FROM employees where company = ?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$companyCode]);
    $employees = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Game Fetch', ERROR);
    die('There was an error getting game data from the database');
}



include 'partials/bottom.php';