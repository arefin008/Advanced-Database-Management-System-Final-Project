<?php
require_once __DIR__ . '/../../controllers/HospitalController.php';

$controller = new HospitalController();
$hospitals = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals List</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="create.php" class="nav-link">Add New Hospital</a></li>
        <!-- <li><a href="index.php" class="nav-link">View Doctors List</a></li> -->
    </ul>
</nav>
<div>
    <h2>Hospitals List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Ward</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($hospitals as $hospital): ?>
        <tr>
            <td><?= $hospital['HOSPITAL_ID']; ?></td>
            <td><?= $hospital['HOSPITAL_NAME']; ?></td>
            <td><?= $hospital['HOSPITAL_ADDRESS']; ?></td>
            <td><?= $hospital['HOSPITAL_WARD']; ?></td>
            <td>
                <a href="edit.php?id=<?= $hospital['HOSPITAL_ID']; ?>">Edit</a> | 
                <a href="delete.php?id=<?= $hospital['HOSPITAL_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
