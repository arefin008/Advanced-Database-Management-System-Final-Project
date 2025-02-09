<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hospitalId = $_POST['Hospital_Id'];
    $controller = new BirthRecordController();
    $records = $controller->searchByHospital($hospitalId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search by Hospital</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">

</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="list.php" class="nav-link">View All Records</a></li>

    </ul>
</nav>
<div>
<h2>Search by Hospital</h2>

<form method="POST">
    <label for="Hospital_Id">Enter Hospital ID:</label><br>
    <input type="text" id="Hospital_Id" name="Hospital_Id" required><br><br>
    <input type="submit" value="Search">
</form>

<?php if (isset($records)): ?>
    <h3>Search Results</h3>
    <?php if (isset($records['error'])): ?>
        <p style="color: red;"><?php echo $records['error']; ?></p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Record ID</th>
                <th>Date of Birth</th>
                <th>Time of Birth</th>
                <th>Child ID</th>
                <th>Doctor ID</th>
                <th>Hospital ID</th>
                <th>Staff ID</th>
            </tr>
            <?php foreach ($records as $record): ?>
            <tr>
                <td><?php echo $record['BIRTH_RECORD_ID']; ?></td>
                <td><?php echo $record['DATEOFBIRTH']; ?></td>
                <td><?php echo $record['TIMEOFBIRTH']; ?></td>
                <td><?php echo $record['CHILD_ID']; ?></td>
                <td><?php echo $record['DOCTOR_ID']; ?></td>
                <td><?php echo $record['HOSPITAL_ID']; ?></td>
                <td><?php echo $record['STAFF_ID']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<?php endif; ?>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
