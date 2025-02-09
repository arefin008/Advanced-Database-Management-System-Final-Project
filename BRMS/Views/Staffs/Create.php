<?php
require_once __DIR__ . '/../../Controllers/StaffController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffController = new StaffController();
    $staffController->create();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="index.php" class="nav-link">View Staffs List</a></li>
      
    </ul>
</nav>
<div>
    <h2>Add New Staff</h2>
    <form action="create.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Role:</label>
        <input type="text" name="role" required><br>

        <label>Contact:</label>
        <input type="text" name="contact" required><br>

        <button type="submit">Save</button>
    </form>
    <footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
