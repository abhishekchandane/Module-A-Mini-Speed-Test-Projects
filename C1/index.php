<?php

header('Content-Type: application/json');

$code = $_GET['code'] ?? '';

$valid = preg_match('/^[A-Z]{4}[0-9]{4}$/', $code);

echo json_encode([
    'valid' => $valid === 1
]);