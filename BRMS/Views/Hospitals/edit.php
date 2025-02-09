<?php
require_once __DIR__ . '/../../models/Hospital.php';

$hospitalModel = new Hospital();
$hospital = [];

if (isset($_GET['id'])) {
    $hospital = $hospitalModel->getHospitalById($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospitalModel->updateHospital(
        $_POST['HOSPITAL_ID'],
        $_POST['HOSPITAL_NAME'],
        $_POST['HOSPITAL_ADDRESS'],
        $_POST['HOSPITAL_WARD']
    );
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Hospital</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
        <li><a href="../home.php" class="nav-link">Home</a></li>
        <li><a href="index.php" class="nav-link">View Hospitals List</a></li>
    </ul>
</nav>

<div>
    <h2>Edit Hospital</h2>
    <form method="POST">
        <input type="hidden" name="HOSPITAL_ID" value="<?= htmlspecialchars($hospital['HOSPITAL_ID'] ?? '') ?>">

        <label>Hospital Name:</label>
        <input type="text" name="HOSPITAL_NAME" value="<?= htmlspecialchars($hospital['HOSPITAL_NAME'] ?? '') ?>" required><br>

        <label>Hospital Address:</label>
        <input type="text" name="HOSPITAL_ADDRESS" value="<?= htmlspecialchars($hospital['HOSPITAL_ADDRESS'] ?? '') ?>" required><br>

        <label>Hospital Ward:</label>
        <input type="text" name="HOSPITAL_WARD" value="<?= htmlspecialchars($hospital['HOSPITAL_WARD'] ?? '') ?>" required><br>

        <button type="submit">Update</button>
    </form>
</div>

<footer>
    <strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok
</footer>

</body>
</html>
