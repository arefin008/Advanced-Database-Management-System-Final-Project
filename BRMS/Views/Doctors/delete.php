<?php
require_once __DIR__ . '/../../models/DoctorModel.php';

if (isset($_GET['id'])) {
    $doctorModel = new DoctorModel();
    $doctorModel->deleteDoctor($_GET['id']);
}

header("Location: index.php");
exit();
?>
