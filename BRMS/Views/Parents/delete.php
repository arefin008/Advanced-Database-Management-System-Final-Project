<?php
require_once __DIR__ . "/../../Controllers/ParentController.php";

$parentController = new ParentController();

if (isset($_GET['id'])) {
    $parentController->delete($_GET['id']);
    header("Location: index.php?success=Parent deleted successfully!");
    exit();
} else {
    echo "Error: Parent ID is missing.";
}
?>
