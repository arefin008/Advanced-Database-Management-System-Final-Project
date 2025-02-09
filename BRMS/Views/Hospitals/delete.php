<?php
require_once __DIR__ . '/../../models/Hospital.php';

if (isset($_GET['id'])) {
    $hospitalModel = new Hospital();
    $hospitalModel->deleteHospital($_GET['id']);
}

header("Location: index.php");
exit();
?>
