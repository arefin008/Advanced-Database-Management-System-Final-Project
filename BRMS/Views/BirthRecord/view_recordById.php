<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

if (isset($_GET['id'])) {
    $controller = new BirthRecordController();
    $record = $controller->getById($_GET['id']);
} else {
    echo "Invalid ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Birth Record</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<h2>View Birth Record</h2>

<?php if (isset($record['error'])): ?>
    <p style="color: red;"><?php echo $record['error']; ?></p>
<?php else: ?>
    <table border="1">
        <tr><th>Record ID</th><td><?php echo $record['BIRTH_RECORD_ID']; ?></td></tr>
        <tr><th>Date of Birth</th><td><?php echo $record['DATEOFBIRTH']; ?></td></tr>
        <tr><th>Time of Birth</th><td><?php echo $record['TIMEOFBIRTH']; ?></td></tr>
        <tr><th>Child ID</th><td><?php echo $record['CHILD_ID']; ?></td></tr>
        <tr><th>Doctor ID</th><td><?php echo $record['DOCTOR_ID']; ?></td></tr>
        <tr><th>Hospital ID</th><td><?php echo $record['HOSPITAL_ID']; ?></td></tr>
        <tr><th>Staff ID</th><td><?php echo $record['STAFF_ID']; ?></td></tr>
    </table>
<?php endif; ?>
<a href = "list.php">back to List</a>

</body>
</html>
