<?php
require_once __DIR__ . "/../../Controllers/childController.php";

if (isset($_GET['id'])) {
    $controller = new ChildController();
    $controller->delete($_GET['id']);
}
?>
