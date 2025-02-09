<?php
require_once __DIR__ . '/../../Controllers/StaffController.php';

$staffController = new StaffController();
$staffList = $staffController->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
        <li><a href="../home.php" class="nav-link">Home</a></li>
        <li><a href="create.php" class="nav-link">Add New Staff</a></li>
      

    </ul>
</nav>
<div>
    <h2>Staff List</h2>

    <?php if (isset($_GET['success'])): ?>
        <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php endif; ?>

    <!-- <a href="create.php" class="btn">Add New Staff</a> -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($staffList as $staff): ?>
            <tr>
                <td><?php echo htmlspecialchars($staff['STAFF_ID']); ?></td>
                <td><?php echo htmlspecialchars($staff['STAFF_NAME']); ?></td>
                <td><?php echo htmlspecialchars($staff['STAFF_ROLE']); ?></td>
                <td><?php echo htmlspecialchars($staff['STAFF_CONTACT']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $staff['STAFF_ID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $staff['STAFF_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
