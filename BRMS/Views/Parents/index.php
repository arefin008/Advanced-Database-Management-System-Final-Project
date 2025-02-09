<?php
require_once __DIR__ . "/../../Controllers/ParentController.php";

$parentController = new ParentController();
$parents = $parentController->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Parents</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="add.php" class="nav-link">Add New Parent</a></li>
    </ul>
</nav>
<div>
    <h2>All Parents</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>House No</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($parents as $parent) { ?>
            <tr>
                <td><?= $parent['PARENT_ID']; ?></td>
                <td><?= $parent['PARENT_FULL_NAME']; ?></td>
                <td><?= $parent['PARENT_ADDRESS']; ?></td>
                <td><?= $parent['HOUSE_NO']; ?></td>
                <td><?= $parent['CITY']; ?></td>
                <td><?= $parent['POSTAL_CODE']; ?></td>
                <td><?= $parent['PARENT_CONTACT']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $parent['PARENT_ID']; ?>">Edit</a> | 
                    <a href="delete.php?id=<?= $parent['PARENT_ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
