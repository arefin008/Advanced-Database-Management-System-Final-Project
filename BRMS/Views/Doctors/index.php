<?php
require_once __DIR__ . '/../../models/DoctorModel.php';

$doctorModel = new DoctorModel();
$doctors = $doctorModel->getAllDoctors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
   
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="create.php" class="nav-link">Add New Doctor</a></li>
        <!-- <li><a href="index.php" class="nav-link">View Doctors List</a></li> -->
      

    </ul>
</nav>
<div>
<h2>Doctor List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qualification</th>
            <th>Specification</th>
            <th>Contact</th>
            <th>Department</th>
            <th>Hospital</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($doctors as $doctor): ?>
            <tr>
                <td><?= htmlspecialchars($doctor['DOCTOR_ID'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['DOCTOR_FULLNAME'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['DOCTOR_QUALIFICATION'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['DOCTOR_SPECIFICATION'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['DOCTOR_CONTACT'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['DOCTOR_DEPARTMENT'] ?? '') ?></td>
                <td><?= htmlspecialchars($doctor['HOSPITAL_ID'] ?? '') ?></td>
                <td>
                    <a href="edit.php?id=<?= $doctor['DOCTOR_ID'] ?>" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?= $doctor['DOCTOR_ID'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
