<?php
require_once __DIR__ . "/../../Controllers/ChildController.php";

$controller = new ChildController();
$children = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children List</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="create.php" class="nav-link">Add New Child</a></li>
        <!-- <li><a href="index.php" class="nav-link">View List</a></li> -->
      

    </ul>
</nav>
<div>
    <h2>Children List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Birth Time</th>
            <th>Parent ID</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($children as $child): ?>
        <tr>
            <td><?= $child['CHILD_ID']; ?></td>
            <td><?= $child['CHILD_FULL_NAME']; ?></td>
            <td><?= $child['CHILD_GENDER']; ?></td>
            <td><?= $child['CHILD_DOB']; ?></td>
            <td><?= $child['CHILD_BIRTHTIME']; ?></td>
            <td><?= $child['PARENT_ID']; ?></td>
            <td>
                <a href="edit.php?id=<?= $child['CHILD_ID']; ?>">Edit</a> | 
                <a href="delete.php?id=<?= $child['CHILD_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
