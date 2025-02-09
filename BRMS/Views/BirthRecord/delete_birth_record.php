<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if (isset($_GET['id'])) {
    $controller = new BirthRecordController();
    $response = $controller->deleteRecord($_GET['id']);
    if (isset($response['error'])) {
        echo "<p style='color: red;'>" . $response['error'] . "</p>";
    } else {
        echo "<p style='color: green;'>" . $response['success'] . "</p>";
    }
} else {
    echo "Invalid ID.";
}
?>
