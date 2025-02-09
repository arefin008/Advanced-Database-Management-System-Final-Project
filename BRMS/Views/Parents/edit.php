<?php
require_once __DIR__ . "/../../Controllers/ParentController.php";

$parentController = new ParentController();
$parent = $parentController->show($_GET['id']);

if (!$parent) {
    die("Parent not found!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parentController->update($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parent</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">BRMS</a>
    <span class="menu-toggle">&#9776;</span>
    <ul>
    <li><a href="../home.php" class="nav-link">Home</a></li>
    <li><a href="index.php" class="nav-link">View Parents List</a></li>
    </ul>
</nav>
<div>
    <h2>Edit Parent</h2>
    <form action="" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="<?= $parent['PARENT_FULL_NAME']; ?>" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?= $parent['PARENT_ADDRESS']; ?>" required>

        <label for="house_no">House No:</label>
        <input type="text" name="house_no" id="house_no" value="<?= $parent['HOUSE_NO']; ?>" required>

        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="<?= $parent['CITY']; ?>" required>

        <label for="postal_code">Postal Code:</label>
        <input type="text" name="postal_code" id="postal_code" value="<?= $parent['POSTAL_CODE']; ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" value="<?= $parent['PARENT_CONTACT']; ?>" required>

        <button type="submit">Update Parent</button>
    </form>

    <br>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
