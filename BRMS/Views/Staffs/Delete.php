<?php
require_once __DIR__ . '/../../Controllers/StaffController.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = $_GET['id'];

$staffController = new StaffController();
$staffController->delete($id);
?>
