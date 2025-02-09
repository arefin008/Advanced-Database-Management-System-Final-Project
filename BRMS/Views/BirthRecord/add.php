<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new BirthRecordController();
    $response = $controller->addRecord($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Birth Record</title>
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
<h2>Add Birth Record</h2>

<?php if (isset($response['error'])): ?>
    <p style="color: red;"><?php echo $response['error']; ?></p>
<?php elseif (isset($response['success'])): ?>
    <p style="color: green;"><?php echo $response['success']; ?></p>
<?php endif; ?>

<form method="POST">
    <label for="Birth_Record_Id">Record ID:</label><br>
    <input type="text" id="Birth_Record_Id" name="Birth_Record_Id" required><br><br>

    <label for="DateOfBirth">Date of Birth:</label><br>
    <input type="Date" id="DateOfBirth" name="DateOfBirth" required><br><br>

    <label for="TimeOfBirth">Time of Birth:</label><br>
    <input type="time" id="TimeOfBirth" name="TimeOfBirth" required><br><br>

    <label for="Child_Id">Child ID:</label><br>
    <input type="text" id="Child_Id" name="Child_Id" required><br><br>

    <label for="Doctor_Id">Doctor ID:</label><br>
    <input type="text" id="Doctor_Id" name="Doctor_Id" required><br><br>

    <label for="Hospital_Id">Hospital ID:</label><br>
    <input type="text" id="Hospital_Id" name="Hospital_Id" required><br><br>

    <label for="Staff_Id">Staff ID:</label><br>
    <input type="text" id="Staff_Id" name="Staff_Id" required><br><br>

    <input type="submit" value="Add Record">
</form>
</div>

<script defer src="../../assets/js/navbar.js"></script>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>
</body>
</html>
