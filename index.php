<?php

$projects = [
    ['A1', 'Traffic Light', 'A1/index.html'],
    ['A2', 'Loading Animation', 'A2/index.html'],
    ['A3', 'Moon Orbit', 'A3/index.html'],
    ['A4', 'Text Slide Animation', 'A4/index.html'],
    ['A5', '3D Chart', 'A5/index.html'],

    ['B1', 'POS Quantity & Price Calculator', 'B1/index.html'],
    ['B2', 'Client-side Validation', 'B2/index.html'],
    ['B3', 'Sortable To Do / Done', 'B3/index.html'],
    ['B4', 'Mini Calendar', 'B4/index.html'],
    ['B5', 'Floor Plan Pathfinder', 'B5/index.html'],

    ['C1', 'Coupon Code Validation', 'C1/index.php'],
    ['C2', 'Stock Deduction', 'C2/index.php'],
    ['C3', 'Leaderboard', 'C3/index.php'],
    ['C4', 'Color Channel Filter', 'C4/index.php?channel=red'],
    ['C5', 'Library SQL Queries', 'C5/index.php?query=1']
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Speed Test Projects</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Mini Speed Test Projects</h1>

    <div class="projects">

        <?php foreach ($projects as $project): ?>

            <a href="<?= $project[2] ?>" class="card">

                <div class="thumbnail">
                    <?= $project[0] ?>
                </div>

                <h2><?= $project[1] ?></h2>

            </a>

        <?php endforeach; ?>

    </div>

</body>
</html>