<?php
require_once __DIR__ . '/../../controllers/HospitalController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new HospitalController();
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <!-- <li><a href="create.php" class="nav-link">Add New Hospital</a></li> -->
        <li><a href="index.php" class="nav-link">View Hospitals List</a></li>
      

    </ul>
</nav>
<div>
    <h2>Add Hospital</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Address:</label>
        <input type="text" name="address" required><br>

        <label>Ward:</label>
        <input type="text" name="ward" required><br>

        <button type="submit">Save</button>
    </form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
