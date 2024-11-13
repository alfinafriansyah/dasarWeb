<?php 
header("Content-Type: application/json");

// mengirimkan token keamanan
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$headers = apache_request_headers();
// echo '<pre>';var_dump($headers, $headers['csrf_token'], $_SESSION['csrf_token']);
// die;
if (isset($headers['csrf_token'])) {
    if ($headers['csrf_token'] !== $_SESSION['csrf_token']) {
        exit(json_encode(['error' => 'Wrong CSRF Token.']));
    }
} else {
    exit(json_encode(['error'=> 'No CSRF Token.']));
}
?>