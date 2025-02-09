<?php
require_once __DIR__ . '/../../models/DoctorModel.php';

$doctorModel = new DoctorModel();
$doctor = [];

if (isset($_GET['id'])) {
    $doctor = $doctorModel->getDoctorById($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'DOCTOR_ID'          => $_POST['DOCTOR_ID'],
        'DOCTOR_FULLNAME'    => $_POST['DOCTOR_FULLNAME'],
        'DOCTOR_QUALIFICATION' => $_POST['DOCTOR_QUALIFICATION'],
        'DOCTOR_SPECIFICATION' => $_POST['DOCTOR_SPECIFICATION'],
        'DOCTOR_CONTACT'     => $_POST['DOCTOR_CONTACT'],
        'DOCTOR_DEPARTMENT'  => $_POST['DOCTOR_DEPARTMENT'],
        'HOSPITAL_ID'        => $_POST['HOSPITAL_ID']
    ];

    $doctorModel->updateDoctor($data);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <!-- <li><a href="create.php" class="nav-link">Add New Doctor</a></li> -->
        <li><a href="index.php" class="nav-link">View Doctors List</a></li>
      

    </ul>
</nav>
<div>
<h2>Edit Doctor</h2>
<form method="POST">
    <input type="hidden" name="DOCTOR_ID" value="<?= htmlspecialchars($doctor['DOCTOR_ID'] ?? '') ?>">

    <label>Name:</label>
    <input type="text" name="DOCTOR_FULLNAME" value="<?= htmlspecialchars($doctor['DOCTOR_FULLNAME'] ?? '') ?>" required><br>

    <label>Qualification:</label>
    <input type="text" name="DOCTOR_QUALIFICATION" value="<?= htmlspecialchars($doctor['DOCTOR_QUALIFICATION'] ?? '') ?>" required><br>

    <label>Specification:</label>
    <input type="text" name="DOCTOR_SPECIFICATION" value="<?= htmlspecialchars($doctor['DOCTOR_SPECIFICATION'] ?? '') ?>" required><br>

    <label>Contact:</label>
    <input type="text" name="DOCTOR_CONTACT" value="<?= htmlspecialchars($doctor['DOCTOR_CONTACT'] ?? '') ?>" required><br>

    <label>Department:</label>
    <input type="text" name="DOCTOR_DEPARTMENT" value="<?= htmlspecialchars($doctor['DOCTOR_DEPARTMENT'] ?? '') ?>" required><br>

    <label>Hospital ID:</label>
    <input type="text" name="HOSPITAL_ID" value="<?= htmlspecialchars($doctor['HOSPITAL_ID'] ?? '') ?>" required><br>

    <button type="submit">Update</button>
</form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
