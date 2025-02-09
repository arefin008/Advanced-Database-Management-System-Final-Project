<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

$controller = new BirthRecordController();
$records = $controller->listAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birth Records List</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="add.php" class="nav-link">Add Birth Record</a></li>
        <li><a href="View_recordById.php" class="nav-link">ViewById</a></li>
        <li><a href="searchByDate.php" class="nav-link">SearchByDate</a></li>
        <li><a href="searchByHospital.php" class="nav-link">SearchByHospital</a></li>
        <!-- <li><a href="list.php" class="nav-link">View All Records</a></li> -->

    </ul>
</nav>
<div>
<h2>Birth Records List</h2>

<?php if (isset($records['error'])): ?>
    <p style="color: red;"><?php echo $records['error']; ?></p>
<?php else: ?>
    <!-- <a href ="add.php">Add Birth Record</a> -->
    <table border="1">
        <tr>
            <th>Record ID</th>
            <th>Date of Birth</th>
            <th>Time of Birth</th>
            <th>Child ID</th>
            <th>Doctor ID</th>
            <th>Hospital ID</th>
            <th>Staff ID</th>
            <th>Actions</th>
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
            <td>
                <a href="edit.php?id=<?php echo $record['BIRTH_RECORD_ID']; ?>">Edit</a> |
                <a href="delete_birth_record.php?id=<?php echo $record['BIRTH_RECORD_ID']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<a href ="report.php">Download Report</a>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>
</body>
</html>

