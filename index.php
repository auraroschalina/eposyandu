<?php
// Set header agar response berupa JSON
header('Content-Type: application/json');

// Cek metode request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'message' => 'Hello, World!'
    ]);
} else {
    // Jika metode selain GET
    http_response_code(405);
    echo json_encode([
        'error' => 'Method Not Allowed'
    ]);
}
