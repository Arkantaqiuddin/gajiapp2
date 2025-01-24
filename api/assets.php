if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    echo require __DIR__ . '/../public/css/' . basename($_GET['file']);
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    echo require __DIR__ . '/../public/js/' . basename($_GET['file']);
} else if ($_GET['type'] === 'image') {
    $filePath = __DIR__ . '/../public/assets/' . basename($_GET['file']);
    $fileInfo = pathinfo($filePath);
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
    ];

    if (file_exists($filePath) && isset($mimeTypes[$fileInfo['extension']])) {
        header('Content-Type: ' . $mimeTypes[$fileInfo['extension']]);
        readfile($filePath);
    } else {
        http_response_code(404);
        echo "File not found.";
    }
}
