<?php
require_once __DIR__ . '/../../controllers/BirthRecordController.php';

$controller = new BirthRecordController();
$records = $controller->listAll();

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="birth_records.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Date of Birth', 'Time of Birth', 'Child ID', 'Doctor ID', 'Hospital ID', 'Staff ID']);

foreach ($records as $record) {
    fputcsv($output, $record);
}

fclose($output);
exit;
?>
