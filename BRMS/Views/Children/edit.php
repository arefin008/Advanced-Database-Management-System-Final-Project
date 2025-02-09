<?php
require_once __DIR__ . '"/../../Controllers/ChildController.php"';

$controller = new ChildController();
$child = null;

if (isset($_GET['id'])) {
    $child = $controller->show($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->update();
}

if (!$child) {
    die("Child not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Child</title>
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
    <h2>Edit Child</h2>
    <form method="POST">
        <input type="hidden" name="child_id" value="<?= $child['CHILD_ID']; ?>">

        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?= $child['CHILD_FULL_NAME']; ?>" required><br>

        <label>Gender:</label>
        <select name="gender">
            <option value="M" <?= $child['CHILD_GENDER'] == 'M' ? 'selected' : ''; ?>>Male</option>
            <option value="F" <?= $child['CHILD_GENDER'] == 'F' ? 'selected' : ''; ?>>Female</option>
        </select><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?= date('Y-m-d', strtotime($child['CHILD_DOB'])); ?>" required><br>

        <label>Birth Time:</label>
        <input type="text" name="birth_time" value="<?= $child['CHILD_BIRTHTIME']; ?>" required><br>

        <label>Parent ID:</label>
        <input type="number" name="parent_id" value="<?= $child['PARENT_ID']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
