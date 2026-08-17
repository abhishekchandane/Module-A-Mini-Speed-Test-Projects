<?php

header('Content-Type: application/json');

$pdo = new PDO(
    'mysql:host=localhost;dbname=competition',
    'root',
    'root123'
);

$query = $_GET['query'] ?? '';

if ($query == '1') {

    $sql = "
        SELECT m.name, COUNT(l.id) AS loan_count
        FROM C5_members m
        LEFT JOIN C5_loans l ON m.id = l.member_id
        GROUP BY m.id, m.name
        ORDER BY loan_count DESC
    ";

} elseif ($query == '2') {

    $sql = "
        SELECT b.title, m.name AS member_name
        FROM C5_loans l
        JOIN C5_books b ON l.book_id = b.id
        JOIN C5_members m ON l.member_id = m.id
        WHERE l.returned = 0
    ";

} elseif ($query == '3') {

    $sql = "
        SELECT category, COUNT(*) AS book_count
        FROM C5_books
        GROUP BY category
    ";

} else {

    echo json_encode([
        'error' => 'Invalid query'
    ]);

    exit;
}

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
