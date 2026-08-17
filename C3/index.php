<?php

header('Content-Type: application/json');

$pdo = new PDO(
    'mysql:host=localhost;dbname=competition',
    'root',
    'root123'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $playerName = $_POST['player_name'] ?? '';
    $score = $_POST['score'] ?? 0;

    $stmt = $pdo->prepare(
        "INSERT INTO C3_scores (player_name, score)
         VALUES (?, ?)"
    );

    $stmt->execute([$playerName, $score]);

    echo json_encode([
        'success' => true
    ]);

    exit;
}


/* GET leaderboard */

$stmt = $pdo->query(
    "SELECT player_name, score
     FROM C3_scores
     ORDER BY score DESC, id ASC"
);

$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

$leaderboard = [];

$rank = 1;

foreach ($players as $player) {

    $leaderboard[] = [
        'rank' => $rank,
        'player_name' => $player['player_name'],
        'score' => (int) $player['score']
    ];

    $rank++;
}

echo json_encode($leaderboard);