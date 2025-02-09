<?php
require_once __DIR__ . '/../../Controllers/StaffController.php';

$staffController = new StaffController();

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = $_GET['id'];
$staff = $staffController->show($id);

if (!$staff) {
    die("Staff not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffController->update($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Staff</title>
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
    <h2>Edit Staff</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($staff['STAFF_NAME']); ?>" required><br>

        <label>Role:</label>
        <input type="text" name="role" value="<?php echo htmlspecialchars($staff['STAFF_ROLE']); ?>" required><br>

        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($staff['STAFF_CONTACT']); ?>" required><br>

        <button type="submit">Update</button>
    </form>
</div>
<footer ><strong>CopyWrite© 2025</strong> Nasimul Arafin Rounok</footer>

</body>
</html>
