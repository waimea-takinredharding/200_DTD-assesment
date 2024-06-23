<?php require_once '_config.php'; ?>

<?php

$page = basename($_SERVER['SCRIPT_NAME']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= SITE_NAME ?></title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1><?= SITE_NAME ?></h1>

        <nav>
            <a href="menu.php"      class="<?= $page=='menu.php'      ? 'active' : '' ?>">Menu Button</a>
            <a href="add-item.php"  class="<?= $page=='add-item.php'     ? 'active' : '' ?>">Add item</a>
            <a href="employees.php" class="<?= $page=='employees.php' ? 'active' : '' ?>">Delete item</a>
        </nav>
    </header>

    <main>

