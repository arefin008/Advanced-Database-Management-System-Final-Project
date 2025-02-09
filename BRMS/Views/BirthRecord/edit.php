<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new BirthRecordController();
    $response = $controller->updateRecord($_POST);
}

if (isset($_GET['id'])) {
    $controller = new BirthRecordController();
    $record = $controller->getById($_GET['id']);
} else {
    echo "Invalid ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Birth Record</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <!-- <li><a href="add.php" class="nav-link">Add Birth Record</a></li>
        <li><a href="edit.php" class="nav-link">Edit Birth Record</a></li>
        <li><a href="searchByDate.php" class="nav-link">SearchByDate</a></li>
        <li><a href="searchByHospital.php" class="nav-link">SearchByHospital</a></li> -->
        <li><a href="list.php" class="nav-link">View All Records</a></li>

    </ul>
</nav>
<div>
<h2>Edit Birth Record</h2>

<?php if (isset($response['error'])): ?>
    <p style="color: red;"><?php echo $response['error']; ?></p>
<?php elseif (isset($response['success'])): ?>
    <p style="color: green;"><?php echo $response['success']; ?></p>
<?php endif; ?>

<form method="POST">
    <input type="hidden" name="Birth_Record_Id" value="<?php echo $record['BIRTH_RECORD_ID']; ?>">

    <label for="DateOfBirth">Date of Birth (yyyy-mm-dd):</label><br>
    <input type="text" id="DateOfBirth" name="DateOfBirth" value="<?php echo $record['DATEOFBIRTH']; ?>" required><br><br>

    <label for="TimeOfBirth">Time of Birth:</label><br>
    <input type="text" id="TimeOfBirth" name="TimeOfBirth" value="<?php echo $record['TIMEOFBIRTH']; ?>" required><br><br>

    <label for="Child_Id">Child ID:</label><br>
    <input type="text" id="Child_Id" name="Child_Id" value="<?php echo $record['CHILD_ID']; ?>" required><br><br>

    <label for="Doctor_Id">Doctor ID:</label><br>
    <input type="text" id="Doctor_Id" name="Doctor_Id" value="<?php echo $record['DOCTOR_ID']; ?>" required><br><br>

    <label for="Hospital_Id">Hospital ID:</label><br>
    <input type="text" id="Hospital_Id" name="Hospital_Id" value="<?php echo $record['HOSPITAL_ID']; ?>" required><br><br>

    <label for="Staff_Id">Staff ID:</label><br>
    <input type="text" id="Staff_Id" name="Staff_Id" value="<?php echo $record['STAFF_ID']; ?>" required><br><br>

    <input type="submit" value="Update Record">
</form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>
</body>
</html>
