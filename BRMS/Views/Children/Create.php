<?php
require_once __DIR__ . "/../../Controllers/childController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ChildController();
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
        <li><a href="index.php" class="nav-link">View List</a></li>
    </ul>
</nav>
<div>
    <h2>Add Child</h2>
    <form method="POST">
        <label>Full Name:</label>
        <input type="text" name="full_name" required><br>

        <label>Gender:</label>
        <select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <label>Birth Time:</label>
        <input type="text" name="birth_time" required><br>

        <label>Parent ID:</label>
        <input type="number" name="parent_id" required><br>

        <button type="submit">Save</button>
    </form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
