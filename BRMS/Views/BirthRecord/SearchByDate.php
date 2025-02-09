<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['DateOfBirth'];
    $controller = new BirthRecordController();
    $records = $controller->searchByDate($date);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search by Date</title>
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
<h2>Search by Date</h2>

<form method="POST">
    <label for="DateOfBirth">Enter Date</label><br>
    <input type="date" id="DateOfBirth" name="DateOfBirth" required><br><br>
    <input type="submit" value="Search">
</form>

<?php if (isset($records) && is_array($records) && !isset($records['error'])): ?>
    <h3>Search Results</h3>
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
            <td><?php echo htmlspecialchars($record['BIRTH_RECORD_ID']); ?></td>
            <td><?php echo htmlspecialchars($record['DATEOFBIRTH']); ?></td>
            <td><?php echo htmlspecialchars($record['TIMEOFBIRTH']); ?></td>
            <td><?php echo htmlspecialchars($record['CHILD_ID']); ?></td>
            <td><?php echo htmlspecialchars($record['DOCTOR_ID']); ?></td>
            <td><?php echo htmlspecialchars($record['HOSPITAL_ID']); ?></td>
            <td><?php echo htmlspecialchars($record['STAFF_ID']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php elseif (isset($records['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($records['error']); ?></p>
<?php endif; ?>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
